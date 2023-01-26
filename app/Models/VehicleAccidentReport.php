<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAccidentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_id',
        'previous_body_repairs',
        'previous_cosmetic_repairs',
        'mechanical_faults_warnig_lights',
        'mechanical_faults_warnig_lights_description',
        'windscreen_condition',
        'rims_condition',
        'interior_condition',
        'front_left_tire',
        'front_right_tire',
        'back_left_tire',
        'back_right_tire'
    ];
}
