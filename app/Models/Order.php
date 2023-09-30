<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static $status = ['open' , 'accepted' , 'rejected' , 'finished' , 'done' , 'canceled'];

    // public static Status = [
    //         0 => 'Pending',
    //         1 => 'Accept',
    //         2 => 'Reject',
    //         3 => 'Upcoming',
    //         4 => 'Canceled' ,
    //         5 => 'Completed',
    // ];

}
