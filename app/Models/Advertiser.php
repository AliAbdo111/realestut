<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'national_id',
        'id_photo',
        'bank_account',
        'isAdmin'
        
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


         
        public function properity(){
            return $this->hasMany(Properity::class);
        }
}
