<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'vat_number',
        'street',
        'suburb',
        'city',
        'province',
        'code',
    ];
}
