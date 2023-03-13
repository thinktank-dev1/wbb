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
        
        /****************************************************************************/
        if($type == "auto"){
            $rem = $bid_amount % $lot->increament_value;
            if($rem > 0){
                $mult = (int)($bid_amount / $lot->increament_value);
                $rec1 = $mult * $lot->increament_value;
                $rec2 = $rec1 + $lot->increament_value;
                return [
                    'status' => "error",
                    'message' => "Auto bid must be in multiples of ".$lot->increament_value.'. You can bid '.$rec1.' or '.$rec2
                ];
                
            }
            
            if($prev_auto){
                if($high_bid){
                    //dd($high_bid->bid_amount, $bid_amount);
                    if($high_bid->bid_amount >= $bid_amount){
                        //dd($high_bid->bid_amount);
                        return [
                            'status' => "error",
                            'message' => "Auto Bid is lower then currant auto bid notification"
                        ];
                    }
                }
                
                $prev_amount = $prev_auto->bid_amount;
                if($prev_amount > $bid_amount){
                    return [
                        'status' => "error",
                        'message' => "Auto Bid is lower then currant auto bid notification"
                    ];    
                }
                elseif($prev_amount == $bid_amount){
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'live'    
                    ]);
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $prev_auto->user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'live'    
                    ]);
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed sucessfully'
                    ];
                }
                elseif($lot->nextBidAmount() > $bid_amount){
                    return [
                        'status' => "error",
                        'message' => "Bid amount is too low"
                    ];
                }
                else{
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $prev_auto->user_id,
                        'bid_amount' => $prev_auto->bid_amount,
                        'bid_type' => 'live'    
                    ]);
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $lot->nextBidAmount(),
                        'bid_type' => 'live'    
                    ]);
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
                    ]);
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed sucessfully'
                    ];
                }
            }
            else{
                if($high_bid){
                    if($high_bid->bid_amount > $bid_amount){
                        return [
                            'status' => "error",
                            'message' => "Bid amount is too low"
                        ];
                    }
                }
                
                if($lot->nextBidAmount() > $bid_amount){
                    return [
                        'status' => "error",
                        'message' => "Bid amount is too low"
                    ];
                }
                else{
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $lot->nextBidAmount(),
                        'bid_type' => 'live'    
                    ]);
                    
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto',    
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
        /****************************************************************************/
        if($lot->nextBidAmount() > $bid_amount){
            return [
                'status' => "error",
                'message' => "Bid amount is too low"
            ];
        }
        if($prev_auto){
            if($prev_auto->bid_amount >= $bid_amount){
                Bid::create([
                    'lot_id' => $lot_id,
                    'user_id' => $user_id,
                    'bid_amount' => $bid_amount,
                    'bid_type' => 'live' 
                ]);
                Bid::create([
                    'lot_id' => $lot_id,
                    'user_id' => $prev_auto->user_id,
                    'bid_amount' => $lot->nextBidAmount(),
                    'bid_type' => 'live' 
                ]);
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
                    'bid_type' => 'live' 
                ]);
                $data = ['action' => 'bid_placed'];
                broadcast(new AuctionEvent($data));
                
                return [
                    'status' => 'success',
                    'message' => 'Bid placed sucessfully'
                ];
            }
        }
        else{
            Bid::create([
                'lot_id' => $lot_id,
                'user_id' => $user_id,
                'bid_amount' => $bid_amount,
                'bid_type' => 'live' 
            ]);
            $data = ['action' => 'bid_placed'];
            broadcast(new AuctionEvent($data));
            
            return [
                'status' => 'success',
                'message' => 'Bid placed sucessfully'
            ];
        }
        
        /****************************************************************************/
    }
}
?>