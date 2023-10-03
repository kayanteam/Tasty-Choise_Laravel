<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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

    public function productType()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }

    public function ordar()
    {
        return $this->hasMany(Order::class, 'product_id');
    }

}
