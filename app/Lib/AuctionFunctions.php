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
        $prev_auto = $lot->highestAutoBid();
        $start_price = $lot->start_price;
        
        /* ---- Check if entered value is a multiple of increament ---- */
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
        if($lot->nextBidAmount() > $bid_amount){
            return [
                'status' => "error",
                'message' => "Bid amount is too low"
            ];
        }
        
        /* ---- AUTO BIDS ---- */
        if($type == "auto"){
            if($prev_auto){
                if($prev_auto->bid_amount > $bid_amount){
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
                    ]);
                    $inc = $bid_amount + $lot->increament_value;
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $prev_auto->user_id,
                        'bid_amount' => $inc,
                        'bid_type' => 'live'    
                    ]);
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed successfully'
                    ];
                }
                elseif($prev_auto->bid_amount == $bid_amount){
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
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
                        'message' => 'Bid placed successfully'
                    ];
                }
                elseif($prev_auto->bid_amount < $bid_amount){
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $bid_amount,
                        'bid_type' => 'auto'    
                    ]);
                    //TODO: Icreament value or use prev bid
                    
                    if($prev_auto->bid_amount > $lot->nextBidAmount()){
                        $next_bid = $prev_auto->bid_amount + $lot->increament_value;    
                    }
                    else{
                        $next_bid = $lot->nextBidAmount(); //+ $lot->increament_value;
                    }
                    
                    
                    Bid::create([
                        'lot_id' => $lot_id,
                        'user_id' => $user_id,
                        'bid_amount' => $next_bid,
                        'bid_type' => 'live'    
                    ]);
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed successfully'
                    ];
                }
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
                    'bid_amount' => $lot->nextBidAmount(),
                    'bid_type' => 'live'    
                ]);
                
                $data = ['action' => 'bid_placed'];
                broadcast(new AuctionEvent($data));
                
                return [
                    'status' => 'success',
                    'message' => 'Bid placed successfully'
                ];
            }
        }
        
        /* ---- LIVE BIDS ---- */
        if($type == "live"){
            if($prev_auto){
                if($prev_auto->bid_amount > $bid_amount){
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
                        'message' => 'Bid placed successfully'
                    ];
                }
                elseif($prev_auto->bid_amount == $bid_amount){
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
                        'bid_type' => 'live'    
                    ]);
                    
                    $data = ['action' => 'bid_placed'];
                    broadcast(new AuctionEvent($data));
                    
                    return [
                        'status' => 'success',
                        'message' => 'Bid placed successfully'
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
                        'message' => 'Bid placed successfully'
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
                    'message' => 'Bid placed successfully'
                ];
            }
        }
    }
}
?>