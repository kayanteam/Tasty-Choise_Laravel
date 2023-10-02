<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
    protected $guarded = [

    ];


    public function getImagePathAttribute()
    {

            return asset('storage/'.$this->image);
    }

    public function Wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'id');
    }
}
