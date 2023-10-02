<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $guarded = [

    ];


    public function getImagePathAttribute()
    {

            return asset('storage/'.$this->image);
    }

    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'wallet_id');
    }
   
}
