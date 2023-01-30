<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarList extends Model
{
    use HasFactory;

    protected $fillable = [
        'mmcode',
        'make',
        'model',
        'variant',
        'year',
        'body_type',
        'drive',
        'transmission',
        'fuel_type',
        'cylinders',
    ];
}
