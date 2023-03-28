<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleVideo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'vehicle_id',
        'video_url',
    ];
}
