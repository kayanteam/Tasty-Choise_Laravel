<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use HasFactory ,  Notifiable;
    protected $guarded = [];


    public function getImagePathAttribute()
    {
        if($this->image == null)
        {
            return 'https://cdn3.vectorstock.com/i/1000x1000/73/92/chef-avatar-cook-man-working-restaurant-services-vector-38067392.jpg';
        }

        return asset('storage/'. $this->image);
    }

    public function Wallet()
    {
        return $this->hasOne(Wallet::class, 'restaurant_id', 'id');
    }

    public function scopeActive()
    {
        return $this->where('status' , 1);
    }


    public function Product()
    {
        return $this->hasMany(Product::class, 'restaurant_id', 'id');
    }

    public function Orders()
    {
        return $this->hasManyThrough(Order::class, Product::class, 'restaurant_id', 'product_id', 'id', 'id');
    }

    public function resturantSubscription()
    {
        return $this->belongsToMany(Subscription::class , RestauarntSubscription::class, 'restaurant_id' , 'subscription_id');
    }

}
