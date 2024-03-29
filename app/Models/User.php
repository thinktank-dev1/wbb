<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'contact_primary',
        'contact_secondary',
        'id_type',
        'id_number',
        'company_id',
        'email',
        'password',
        'proxy_id',
        'proof_of_residence',
        'brm',
        'vat_registration',
        'id_document',
        'cipro',
        'company_letter_head',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function hasRole($role){
        return null !== $this->roles()->where('name', $role)->first();
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
    
    public function bids(){
        return $this->hasMany(Bid::class)->orderBy('bid_amount', 'DESC');
    }
    
    public function boughtCars(){
        $count = Lot::where('winner_id', $this->id)->count();
        
        return $count;
    }
    
    public function favourites(){
        return $this->hasMany(Favourites::class, 'user_id');
    }
}
