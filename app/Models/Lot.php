<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
    	'auction_group_id',
    	'vehicle_id',
    	'start_price',
    	'increament_value',
    	'reserve_price',
    	'show_reseve_price',
    	'trade_price',
    	'winner_id'
    ];
    
    public function group(){
        return $this->belongsTo(AuctionGroup::class, 'auction_group_id');
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
    
    public function repairTotal(){
        return $this->vehicle->inspection->sum('estimate_damage_cost');
    }
    
    public function auction(){
        return $this->belongsTo(AuctionGroup::class,'auction_group_id');
    }
    
    public function favourites(){
        return $this->hasMany(Favourites::class);
    }
    
    public function favourite($user_id, $lot_id){
        $fav = Favourites::where('user_id', $user_id)
        ->where('lot_id', $lot_id)->first();
        
        if($fav){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    public function bids(){
        return $this->hasMany(Bid::class)->orderBy('bid_amount', 'DESC');
    }
    
    public function highestBid(){
        return $this->bids()->where('bid_type', 'live')->orderBy('bid_amount', 'DESC')->orderBy('created_at', 'ASC')->first();
    }
    
    public function highestAutoBid(){
        return $this->bids()->where('bid_type','auto')->orderBy('bid_amount', 'DESC')->orderBy('created_at', 'ASC')->first();
    }
    
    public function userHighestBid(){
        return $this->bids()->where('user_id', Auth::user()->id)->where('bid_type','live')->orderBy('bid_amount', 'DESC')->first();
    }
    
    
    public function userHighestAutoBid(){
        return $this->bids()->where('user_id', Auth::user()->id)->where('bid_type','auto')->orderBy('bid_amount', 'DESC')->orderBy('id', 'ASC')->first();
    }
    
    public function nextBidAmount(){
        $high_bid = $this->highestBid();
        if($high_bid){
            $bid_amount = $high_bid->bid_amount + $this->increament_value;
        }
        else{
            $bid_amount = $this->start_price;
        }
        return $bid_amount;
    }
    
    public function userHasBid(){
        return null !== $this->bids()->where('user_id', Auth::user()->id)->first();
    }
    
    public function status(){
        $reserve = $this->reserve_price;
        if($this->highestBid() !== null ){
            $high = $this->highestBid()->bid_amount;
            if($reserve <= $high){
                return "Sold";
            }
            else{
                return "Not Sold";
            }
        }
    }
}
