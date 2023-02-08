<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'user_id',
        'lot_id',
    ];
    
    public function lot(){
        return $this->belongsTo(Lot::class,'lot_id');
    }
}
