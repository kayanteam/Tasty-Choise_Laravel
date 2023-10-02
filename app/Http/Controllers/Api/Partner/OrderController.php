<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Orders\OfferItemResource;
use App\Http\Resources\Api\Orders\OrderCollection;
use App\Http\Resources\Api\Orders\OrderItemResource;
use App\Http\Resources\Api\Orders\OrderResource;
use App\Http\Resources\Api\Orders\RestaurantOrderCollection;
use App\Http\Resources\Api\Orders\RestaurantOrderResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Http\Resources\ServiceResource;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Partner;
use App\Models\Reviews;
use App\Models\Service;
use App\Models\User;
use App\Notifications\AcceptNotification;
use App\Notifications\CancelNotification;
use App\Notifications\OrderNotify;
use App\Traits\ApiTrait;
use App\Traits\CutstomTrait;
use App\Traits\FcmTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    use ApiTrait, FcmTrait;


    public function ShowAllOrders(Request $request)
    {
        $status = $request->status ?? 'open';
        $paginate = $request->pageLength ?? 15;
        $restaurant = auth('restaurant')->user();
        $orders = Order::where('status', $status)
            ->whereHas('product' , function($q) use($restaurant){
                $q->where('restaurant_id' , $restaurant->id);
            })
            ->latest()
            ->paginate($paginate);
        return new RestaurantOrderCollection($orders);
    }


    public function ShowOrder($id)
    {
        $order = Order::find($id);
        return $this->SuccessApi(new RestaurantOrderResource($order));
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


        $opNotificationOpts = $order->NotificationOptions($order->id);
       
        $notification = $opNotificationOpts[Order::NOTIFICATION_TYPE[$request->status]];
        // send to user
        $users = User::where('id' , $order->user_id)->get();

        Notification::send($users , new OrderNotify($order , $notification));

        // $this->SendNotification($users,$notification['title'],$notification['details'] , $order->id, Order::NOTIFICATION_TYPE[$request->status] );


        return $this->SuccessApi( $notification , $notification['title'] );
    }
}
