<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'mmcode',
        'year',
        'make',
        'model',
        'variant',
        'body_type',
        'mileage',
        'fuel_type',
        'transmission',
        'color',
        'engine_type',
        'cylinders',
        'vin_number',
        'engine_number',
        'natis',
        'service_history',
        'service_book',
        'service_plan',
        'warranty',
        'notes'
    ];

    public function extras(){
        return $this->hasMany(VehicleExtras::class);
    }

    public function hasExtra($name){
        return null !== $this->extras()->where('extra', $name)->first();
    }

    public function report(){
        return $this->hasOne(VehicleAccidentReport::class);
    }

    public function images(){
        return $this->hasMany(VehicleImages::class);
    }

    public function inspection(){
        return $this->hasMany(VehicleInspection::class);
    }

    public function inspectionBySide($side){
        return $this->inspection->where('side', $side);
    }

    public function lot(){
        return $this->hasOne(Lot::class);
    }  
}
