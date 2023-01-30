<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = [
    	'auction_group_id',
    	'vehicle_id',
    	'start_price',
    	'increament_value',
    	'reserve_price'
    ];

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class);
    } 
}
