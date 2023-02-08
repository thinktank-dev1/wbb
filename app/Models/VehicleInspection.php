<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'image_url',
        'side',
        'poasition',
        'type',
        'severity',
        'estimate_damage_cost'
    ];
}
