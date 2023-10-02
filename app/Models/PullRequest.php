<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PullRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Partner()
    {
        return $this->belongsTo(Partner::class);
    }

 
}
