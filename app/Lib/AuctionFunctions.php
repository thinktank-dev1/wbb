<?php
namespace App\Lib;

use App\Models\Bid;
use App\Models\Lot;
use App\Events\AuctionEvent;

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
                    $prev_auto = $lot->bids->where('bid_type', 'auto')->sortByDesc('bid_amount')->first();
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
                            //Make Prev auto new highest value
                            Bid::create([
                                'lot_id' => $lot_id,
                                'user_id' => $user_id,
                                'bid_amount' => $prev_auto->bid_amount,
                                'bid_type' => 'live'    
                            ]);
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
            Bid::create([
                'lot_id' => $lot_id,
                'user_id' => $user_id,
                'bid_amount' => $bid_amount,
                'bid_type' => $type 
            ]);
            $data = ['action' => 'bid_placed'];
            broadcast(new AuctionEvent($data));
            
            //Check Auto Bids
            $high_auto = $lot->highestAutoBid();
            if($high_auto){
                if($high_auto->bid_amount > $bid_amount){
                    if($high_auto){
                        Bid::create([
                            'lot_id' => $lot_id,
                            'user_id' => $high_auto->user_id,
                            'bid_amount' => $lot->nextBidAmount(),
                            'bid_type' => 'live' 
                        ]);
                    }
                }
            }
            return [
                'status' => 'success',
                'message' => 'Bid placed sucessfully'
            ];
        }
    }
}
?>