<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Orders\OfferItemResource;
use App\Http\Resources\Api\Orders\OrderCollection;
use App\Http\Resources\Api\Orders\OrderItemResource;
use App\Http\Resources\Api\Orders\OrderResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Http\Resources\ServiceResource;
use App\Models\Driver;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Reviews;
use App\Models\Service;
use App\Notifications\AcceptNotification;
use App\Notifications\CancelNotification;
use App\Traits\ApiTrait;
use App\Traits\CutstomTrait;
use App\Traits\FcmTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    use ApiTrait,  FcmTrait;
    public function store(Request $request)
    {
        $order = Order::create([
            'product_id' => $request->product_id,
            'user_id' => auth('user')->id(),
            'quantity' => $request->quantity,
        ]);
        return $this->SuccessApi($order, 'Order Created Successfully');
    }

    public function ShowOrders(Request $request)
    {
        $request->validate([
            'status' => 'in:open,accepted,rejected,finished,done,canceled',
        ]);
        $paginate = $request->pageLength ?? 15;
        $status = $request->status ?? 'pending';
        $orders = Order::CustomStatus($status)->where('user_id', auth('user')->id())->latest()->paginate($paginate);
        return new OrderCollection($orders);
    }

    public function ShowOrder($id)
    {
        $order = Order::find($id);
        return $this->SuccessApi(new OrderItemResource($order));
    }

    public function UpdateStatus(Request $request)
    {
        $request->validate([
            'status' => ['required', Rule::in(Order::$status)],
            'order_id' => 'required|exists:orders,id',
        ]);


        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();


        // $opNotificationOpts = $order->NotificationOptions($order->id);
        // $notification = $opNotificationOpts[Order::NOTIFICATION_TYPE[$request->status]];

        //send to user
        // $users = User::where('id' , $order->user_id)->get();

        // Notification::send($users , new NewNotification($order , $notification));

        // $this->SendNotification($users,$notification['title'],$notification['details'] , $order->id, Order::NOTIFICATION_TYPE[$request->status] );


        return $this->SuccessApi(null);
    }
}