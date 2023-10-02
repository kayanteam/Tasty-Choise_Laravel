<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use HasFactory , HasApiTokens , Notifiable;
    protected $guarded = [];


    public function getImagePathAttribute()
    {
        return asset('storage/'.$this->image);
    }

    public function Wallet()
    {
        return $this->hasOne(Wallet::class, 'restaurant_id', 'id');
    }

    public function scopeActive()
    {
        return $this->where('status' , 1);
    }

}
