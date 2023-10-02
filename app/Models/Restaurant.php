<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable
{
    use HasFactory , HasApiTokens;
    protected $guarded = [];


    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'restaurant_id', 'id');
    }
   
}
