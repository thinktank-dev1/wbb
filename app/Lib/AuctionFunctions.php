<?php
namespace App\Lib;

use App\Models\Bid;
use App\Models\Lot;
use App\Events\AuctionEvent;
use App\Models\User;
use App\Lib\SmsApi;

class AuctionFunctions{
    public function placeBid($lot_id, $user_id, $bid_amount, $type){
        $lot = Lot::find($lot_id);
        $high_bid = $lot->highestBid();
        $save = true;
        
        if($type == "auto"){
            if($high_bid){
                if($high_bid->bid_amount >= $bid_amount){
                    $save = false;
                    return [
                        'status' => "error",
                        'message' => "Bid amount must be greater than ".$high_bid->bid_amount
                    ];
                }
                else{
                    //$prev_auto = $lot->bids->where('bid_type', 'auto')->sortByDesc('bid_amount')->sortBy('id')->first();
                    $prev_auto = $lot->highestAutoBid();
                    
                    if($prev_auto){
                        //Check If Prev Is higher than new
                        if($prev_auto->bid_amount > $bid_amount){
                            $save = false;
                            return [
                                'status' => "error",
                                'message' => "Bid amount must be greater than ".$prev_auto->bid_amount
                            ];
                        }
                        else{
                            if($prev_auto->bid_amount == $bid_amount){
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $prev_auto->user_id,
                                    'bid_amount' => $prev_auto->bid_amount,
                                    'bid_type' => 'live'    
                                ]);
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $user_id,
                                    'bid_amount' => $prev_auto->bid_amount,
                                    'bid_type' => 'live'    
                                ]);
                                $save = false;
                                
                                $data = ['action' => 'bid_placed'];
                                broadcast(new AuctionEvent($data));
                                
                                return [
                                    'status' => 'success',
                                    'message' => 'Bid placed sucessfully'
                                ];
                            }
                            else{
                                //if($prev_auto->bid_amount >= $lot->nextBidAmount()){
                                    //Make Prev auto new highest value
                                    Bid::create([
                                        'lot_id' => $lot_id,
                                        'user_id' => $user_id,
                                        'bid_amount' => $prev_auto->bid_amount,
                                        'bid_type' => 'live'    
                                    ]);
                                //}
                                
                                //Notify Prev Bidder
                                $sms = new SmsApi();
                                $message = "Your We Buy Bakkies Auto Bid of ".$prev_auto->bid_amount." has been outbid, please login to place a new bid.";
                                $cnt_user = User::find($prev_auto->user_id);
                                $cell = $cnt_user->contact_primary;
                                $res = $sms->sendSms($cell, $message);
                                
                                //Notify bidder if logged in
                                $data = [
                                    "action" => "outbid",
                                    "user_id" => $cnt_user->id
                                ];
                                broadcast(new AuctionEvent($data));
                            }
                        }
                    }
                }
            }
            else{
                //Place your Bid
                Bid::create([
                    'lot_id' => $lot_id,
                    'user_id' => $user_id,
                    'bid_amount' => $lot->nextBidAmount(),
                    'bid_type' => 'live'    
                ]);
            }
        }
        if($save){
            //Check Auto Bids
            $high_auto = $lot->highestAutoBid();
            if($high_auto){
                if($high_auto->bid_amount >= $bid_amount && $high_auto->bid_amount >= $lot->nextBidAmount()){
                    if($high_auto){
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $high_auto->user_id,
                            'bid_amount' => $lot->nextBidAmount(),
                            'bid_type' => 'live' 
                        ]);
                    }
                }
                else{
                    //Notify Prev Bidder
                    // $sms = new SmsApi();
                    // $message = "Your We Buy Bakkies Auto Bid of ".$prev_auto->bid_amount." has been outbid, please login to place a new bid.";
                    // $cnt_user = User::find($prev_auto->user_id);
                    // $cell = $cnt_user->contact_primary;
                    // $res = $sms->sendSms($cell, $message);
                    
                    //Notify bidder if logged in
                    // $data = [
                    //     "action" => "outbid",
                    //     "user_id" => $cnt_user->id
                    // ];
                    // broadcast(new AuctionEvent($data));
                }
            }
            Bid::create([
                'lot_id' => $lot_id,
                'user_id' => $user_id,
                'bid_amount' => $bid_amount,
                'bid_type' => $type 
            ]);
            $data = ['action' => 'bid_placed'];
            broadcast(new AuctionEvent($data));
            
            return [
                'status' => 'success',
                'message' => 'Bid placed sucessfully'
            ];
        }
    }
}
?>