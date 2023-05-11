<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'lot_id',
        'user_id',
        'bid_amount',
        'bid_type'
    ];
    
    public function bidder(){
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function lot(){
        return $this->belongsTo(Lot::class);
    }
}
