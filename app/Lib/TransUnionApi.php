<?php
namespace App\Lib;

class TransUnionApi{
    protected $ApiKey;
    protected $ReportCode;
    protected $username;
    protected $password;
    protected $client;
    protected $request_person;
    protected $salt;
    protected $url;
    
    public function __construct(){
        $this->ApiKey = '96C0C1D2-1278-4C26-AC52-78B287708AC3';
        $this->ReportCode = 'A4B4AC82-2F2F-4A4B-AFF4-2BE2E35238D1';
        $this->username = '200254';
        $this->password = 'Live@2021#';
        $this->client = 'Transunion';
        $this->request_person = 'TestTransunion';
        $this->salt = 'TrUnCl!entH@sh';
    }
    
    public function getCarData($code, $year, $mileage){
    	if(strlen($code) < 8){
    		$code = str_pad($code, 8,"0",STR_PAD_LEFT);
    	}
    	$ret = $this->runTransUnion($code, $year, $mileage);
    	
    	return $ret;
    }
    
    function runTransUnion($code, $year, $mileage){
    	$reportcode = $this->ReportCode;
        $apikey = $this->ApiKey;
        $username = $this->username;
        $password = $this->password;
        $mmcode = $code;
        $year = $year;
        $mileage = $mileage;
        $clientref = $this->client;
        $reqPerson = $this->request_person;
        $guideMonth= date('n');
        $guideYear = date('Y');
        
        $xml_request_header = '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:typ="http://autoinsight.transunion.co.za/types">
    <soap:Header/>
    <soap:Body>';
    $xml_request_body = '<typ:GetConvergedDataRequest xmlns="http://autoinsight.transunion.co.za/types" xmlns:i="http://www.w3.org/2001/XMLSchema-instance">
    	<typ:ApiKey>'.$apikey.'</typ:ApiKey>
        <typ:ReportCode>'.$reportcode.'</typ:ReportCode>
        <typ:Input i:type="HPIReportRequest">   
            <typ:SubscriptionUsername>'.$username.'</typ:SubscriptionUsername>
            <typ:SubscriptionPassword>'.$password.'</typ:SubscriptionPassword>
            <typ:VehicleVinNumber/>
            <typ:VehicleColour/>
            <typ:VehicleMMCode>'.$mmcode.'</typ:VehicleMMCode>
            <typ:VehicleEngineNumber/>
            <typ:VehicleManufactureYear>'.$year.'</typ:VehicleManufactureYear>
            <typ:ClientReference>'.$clientref.'</typ:ClientReference>
            <typ:ConsumerCellularNumber/>
            <typ:RequestorPerson>'.$reqPerson.'</typ:RequestorPerson>
            <typ:VehicleRegistrationNumber/>
            <typ:GuideYear>'.$guideYear.'</typ:GuideYear>
            <typ:GuideMonth>'.$guideMonth.'</typ:GuideMonth>
            <typ:VehicleMileage>'.$mileage.'</typ:VehicleMileage>
        </typ:Input>
    </typ:GetConvergedDataRequest>';
    $xml_request_footer ='</soap:Body>
</soap:Envelope>';
        $xml_request = $xml_request_header.$xml_request_body.$xml_request_footer;
        $url ="https://autoinsight.transunion.co.za/ReportApi/soap12";
        $xmlstring = simplexml_load_string($xml_request);
        
        //Calculating the HASH value    
        $string = $clientref.$guideMonth.$guideYear.$reqPerson.$password.$username.$year.$mileage.$mmcode;
        $salt = $this->salt;
        $utfString = mb_convert_encoding($string.$salt,"ASCII");
        $hashTag = sha1($utfString,true);
        $base64Tag = base64_encode($hashTag);
        
        $encoded=$base64Tag; //calculated hash value
    	//dd($encoded);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_HTTPHEADER, array('Content-Type: application/soap+xml ; charset=utf-8', 'Content-Length: '.strlen($xml_request),'request-hash: '.$encoded.'','SOAPAction: "GetConvergedDataRequest"' ));
        curl_setopt($x, CURLOPT_POST, 1);
        curl_setopt($x, CURLOPT_POSTFIELDS,$xml_request);
        curl_setopt($x, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($x, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($x, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($x, CURLOPT_TIMEOUT, 30);
        curl_setopt($x, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($x, CURLOPT_BUFFERSIZE, 64000);
        //curl_setopt($x, CURLOPT_VERBOSE, 1);
        $response = curl_exec($x);
        //$header = print_r(curl_getinfo($x),true);
        
        $ret = array();
        if(curl_errno($x)){
            $ret = array(
                'status'=>'error',
                'message'=>curl_error($x)
            );
            $this->error("Curl Erro: ".curl_error($x));
        }
        else{
            $res_xml = simplexml_load_string($response , NULL, NULL, "http://schemas.xmlsoap.org/soap/envelope/");
            $ns = $res_xml->getNamespaces(true);
            $data = $res_xml->children($ns['s'])->Body->children('http://autoinsight.transunion.co.za/types');
            $error = $data->GetConvergedDataRequestResponse->ResponseStatus;
            
            if($error->xpath('d4p1:ErrorCode')){
                $ret = array(
                    'status'=>'error',
                    'message'=>$error->xpath('d4p1:Message')[0]
                );
            }
            else{
                $info = $data->GetConvergedDataRequestResponse->ConvergedData;
                
                if($info->xpath('d4p1:VehicleValueInfo/d4p1:VehicleValue/d4p1:EstimatedRetailPrice')){
	                $estimate_retail_value = $info->xpath('d4p1:VehicleValueInfo/d4p1:VehicleValue/d4p1:EstimatedRetailPrice')[0];
	                $estimate_trade_alue = $info->xpath('d4p1:VehicleValueInfo/d4p1:VehicleValue/d4p1:EstimatedTradePrice')[0];
	                
	                $retail_value = $info->xpath('d4p1:VehicleValueInfo/d4p1:VehicleValue/d4p1:RetailPrice')[0];
	                $trade_value = $info->xpath('d4p1:VehicleValueInfo/d4p1:VehicleValue/d4p1:TradePrice')[0];
	                
	                $ret = $estimate_retail_value;
	                if($estimate_retail_value == 0){
	                	$ret = $retail_value;
	                }
	                
	                $trade = $estimate_trade_alue;
	                if($estimate_trade_alue == 0){
	                	$trade = $trade_value;
	                }
	                
	                $ret = array(
	                    'status'=>'success',
	                    'retail_value'=>$ret,
	                    'trade_value'=>$trade
	                );
                }
                else{
                	$ret = array(
	                    'status'=>'error',
	                    'message'=>"Transunion error"
	                );
                }
            }
        }
        curl_close($x);
        return $ret;
    }
}
?>