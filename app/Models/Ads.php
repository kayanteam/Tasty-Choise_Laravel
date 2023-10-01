<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    // public $translatable = ['name'];
    protected $guarded = [

    ];


    public function getImagePathAttribute()
    {

            return asset('storage/'.$this->image);
    }
}
