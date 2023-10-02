<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauarntSubscription extends Model
{
    use HasFactory;
    protected $guarded = [

    ];


    public function getImagePathAttribute()
    {

            return asset('storage/'.$this->image);
    }

    public function resturant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }
}
