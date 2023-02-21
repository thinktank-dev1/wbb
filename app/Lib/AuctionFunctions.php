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
        $prev_auto = $lot->highestAutoBid();
        $start_price = $lot->start_price;
        
        if($type == "auto"){
            if($high_bid){
                if($high_bid->bid_amount > $bid_amount){
                    $save = false;
                    return [
                        'status' => "error",
                        'message' => "Bid amount is too low"
                    ];
                }
            }
            if($prev_auto){
                //Check If Prev Is higher than new
                if($prev_auto->bid_amount > $bid_amount){
                    $save = false;
                    return [
                        'status' => "error",
                        'message' => "Bid amount is too low"
                    ];
                }
                elseif($prev_auto->bid_amount == $bid_amount){
                    if($prev_auto->user_id != $user_id){
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $user_id,
                            'bid_amount' => $bid_amount,
                            'bid_type' => 'live'    
                        ]);
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $prev_auto->user_id,
                            'bid_amount' => $prev_auto->bid_amount,
                            'bid_type' => 'live'    
                        ]);
                        $save = false;
                    }
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed sucessfully'
                    ];
                }
                else{
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
                    ]);
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $prev_auto->bid_amount,
                        'bid_type' => 'live'    
                    ]);
                    
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
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => "success",
                        'message' => "Bid placed successfully"
                    ];
                }
            }
            else{
                if($lot->nextBidAmount() < $bid_amount){
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
                    ]);
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => "success",
                        'message' => "Bid placed successfully"
                    ];
                }
                else{
                    return [
                        'status' => "error",
                        'message' => "Bid amount is too low"
                    ];
                }
            }
        }
        
        if($save){
            $go = true;
            if($prev_auto){
                if($high_bid){
                    if($prev_auto->bid_amount > $high_bid->bid_amount){
                        if($prev_auto->bid_amount > $bid_amount){
                            if($prev_auto->bid_amount >= $lot->nextBidAmount()){
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $user_id,
                                    'bid_amount' => $bid_amount,
                                    'bid_type' => $type 
                                ]);
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $prev_auto->user_id,
                                    'bid_amount' => $lot->nextBidAmount(),
                                    'bid_type' => 'live'    
                                ]);
                                $go = false;
                                $data = ['action' => 'bid_placed'];
                                broadcast(new AuctionEvent($data));
                                
                                return [
                                    'status' => 'success',
                                    'message' => 'Bid placed sucessfully'
                                ];
                            }
                            else{
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $prev_auto->user_id,
                                    'bid_amount' => $bid_amount,
                                    'bid_type' => 'live'    
                                ]);
                                Bid::create([
                                    'lot_id' => $lot_id,
                                    'user_id' => $user_id,
                                    'bid_amount' => $bid_amount,
                                    'bid_type' => $type 
                                ]);
                                $go = false;
                                $data = ['action' => 'bid_placed'];
                                broadcast(new AuctionEvent($data));
                                return [
                                    'status' => 'success',
                                    'message' => 'Bid placed sucessfully'
                                ];
                            }
                        }
                    }
                }
                else{
                    if($prev_auto->bid_amount >= $lot->nextBidAmount()){
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $user_id,
                            'bid_amount' => $bid_amount,
                            'bid_type' => $type 
                        ]);
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $prev_auto->user_id,
                            'bid_amount' => $lot->nextBidAmount(),
                            'bid_type' => 'live'    
                        ]);
                        $go = false;
                        $data = ['action' => 'bid_placed'];
                        broadcast(new AuctionEvent($data));
                        
                        return [
                            'status' => 'success',
                            'message' => 'Bid placed sucessfully'
                        ];
                    }
                    else{
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $prev_auto->user_id,
                            'bid_amount' => $bid_amount,
                            'bid_type' => 'live'    
                        ]);
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $user_id,
                            'bid_amount' => $bid_amount,
                            'bid_type' => $type 
                        ]);
                        $go = false;
                        $data = ['action' => 'bid_placed'];
                        broadcast(new AuctionEvent($data));
                        return [
                            'status' => 'success',
                            'message' => 'Bid placed sucessfully'
                        ];
                    }
                }
            }
            if($go){
                if($high_bid){
                    if($high_bid->bid_amount <= $bid_amount){
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
                    }elseif($high_bid->bid_amount > $bid_amount){
                        $save = false;
                        return [
                            'status' => "error",
                            'message' => "Bid amount is too low"
                        ];
                    }
                }else{
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
    }
}
?>