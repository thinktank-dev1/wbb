<?php
namespace App\Lib;

class SmsApi{
    private $apiKey, $apiSecret, $token;
	
	function __construct(){
		$this->apiKey = 'c4e521b5-52cc-4a5b-a386-c58ee8a799fa';
		$this->apiSecret = '2TYi54N6ptwIBWngHMGqvApqlD7JICWT';
		$this->connect();
	}

	function connect(){
		$accountApiCredentials = $this->apiKey . ':' .$this->apiSecret;
		$base64Credentials = base64_encode($accountApiCredentials);
		$authHeader = 'Authorization: Basic ' . $base64Credentials;

		$authEndpoint = 'https://rest.smsportal.com/Authentication';

		$authOptions = array(
		    'http' => array(
		        'header'  => $authHeader,
		        'method'  => 'GET',
		        'ignore_errors' => true
		    )
		);
		$authContext  = stream_context_create($authOptions);

		$result = file_get_contents($authEndpoint, false, $authContext);
		$authResult = json_decode($result);
		$status_line = $http_response_header[0];
		preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
		$status = $match[1];

		if ($status === '200') { 
		    $this->token = $authResult->{'token'};
		}
	}

	function sendSms($number, $message){
		if($this->token){
			$sendUrl = 'https://rest.smsportal.com/bulkmessages';
			$authHeader = 'Authorization: Bearer ' . $this->token;
			$sendData = '{ "messages" : [ { "content" : "'.$message.'", "destination" : "'.$number.'" } ] }';
			$options = array(
				'http' => array(
					'header'  => array("Content-Type: application/json", $authHeader),
					'method'  => 'POST',
					'content' => $sendData,
					'ignore_errors' => true
				)
			);
			$context  = stream_context_create($options);
			$sendResult = file_get_contents($sendUrl, false, $context);
			$status_line = $http_response_header[0];
			preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);
			$status = $match[1];
			if ($status === '200') {
				return true;
			}
		}
		return false;
	}
}
?>