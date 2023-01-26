<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_type',
        'registration_number',
        'contact_number',
        'email',
        'street',
        'suburb',
        'city',
        'province',
        'code',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function payment(){
        return $this->hasOne(CompanyPayment::class);
    }
}
