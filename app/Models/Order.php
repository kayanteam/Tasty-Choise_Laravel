<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public static $status = ['open', 'accepted', 'rejected', 'finished', 'done', 'canceled'];
    protected $guarded = [];
    public static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            //get last record
            $last = static::orderby('id', 'desc')
                ->first();

            $nextInvoiceNumber = 1;
            if ($last) {
                $nextInvoiceNumber = $last->order_number +  1;
            }

            $order->order_number = $nextInvoiceNumber;
        });
    }





    public function ScopeCustomStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    //Relation
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


    const NOTIFICATION_TYPE = [
        'open'     => 1,
        'accepted' => 2,
        'rejected' => 3,
        'finished' => 4,
        'done'     => 5,
        'canceled' => 6,
    ];


    public function NotificationOptions($order_num)
    {
        return [
            1 => [
                'type' => 'open',
                'title' => 'تم ارسال الطلب بنجاح',
                'details' => 'طلبك رقم' . $order_num . ' , مفتوح ، بانتظار القبول',
            ],

            2 => [
                'type' => 'accepted',
                'title' => 'تهانينا ، تم قبول الطلب',
                'details' => 'طلبك رقم' . $order_num . 'اصبح مقبولا',
            ],
            3 => [
                'type' => 'rejected',
                'title' => 'للأسف ، تم رفض الطلب ',
                'details' => 'طلبك رقم' . $order_num . 'تم رفضه',
            ],
            4 => [
                'type' => 'done',
                'title' => 'تهانينا ، تمت عملية الدفع ',
                'details' => ' طلبك رقم' . $order_num . 'قيد التنفيذ',
            ],
            5 => [
                'type' => 'finished',
                'title' => 'مبروك ، انتهى طلبك ',
                'details' => 'طلبك رقم' . $order_num . 'انتهى ، يرجى تقييم الطلب',
            ],
            6 => [
                'type' => 'canceled',
                'title' => 'تم الغاء الطلب',
                'details' => 'طلبك رقم ' . $order_num . 'تم الغاءه',
            ],
        ];
    }


}
