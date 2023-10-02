<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class CommonQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];


    
    public function ScopeActive($query)
    {
        return $query->where('status' , 1);
    }
}
