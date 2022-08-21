<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Properity as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Properity extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'advertiser_id',
        'name',
        'address',
        'price',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'type',
        'number_of_beds',
        'number_of_rooms',
        'desc',
        'status',
        
    ];

    
    // public function advertiser()
    // {
    //     return $this->belongsTo(Advertiser::class);
    // }

    // public function properity()
    // {
    //     return $this->hasMany(Image::class);
    // }
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
}
