<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static $status = ['open' , 'accepted' , 'rejected' , 'finished' , 'done' , 'canceled'];
    
    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            //get last record
            $last = static::orderby('id', 'desc')
                ->first();

            $nextInvoiceNumber = 1;
            if ($last) {
                $nextInvoiceNumber = $last->order_num +  1;
            }

            $order->order_num = $nextInvoiceNumber;
        });
    }
    const Status = [
            0 => 'Pending',
            1 => 'Accept',
            2 => 'Reject',
            3 => 'Upcoming',
            4 => 'Canceled' ,
            5 => 'Completed',
    ];


    public function ScopeCustomStatus($query, $status)
    {
        return $query->where('status', $status);
    }

}
