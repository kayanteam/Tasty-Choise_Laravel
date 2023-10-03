<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Http\Resources\Api\Orders\RestaurantOrderCollection;
use App\Http\Resources\Api\Orders\OrderItemResource;
use App\Models\Ads;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Wallet;
use App\Notifications\CancelNotification;
use App\Traits\ApiTrait;
use App\Traits\CutstomTrait;
use App\Traits\FcmTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    use ApiTrait , FcmTrait;
    public function Home(Request $request)
    {

        $status = $request->status ?? 'pending' ;
        $paginate = $request->pageLength ?? 15 ;
        $rest = auth('restaurant')->user();
    
        $ads = Ads::latest()->limit(10)->get();
        $myproducts  = Product::where('restaurant_id' ,  $rest->id )->latest()->get();

        $data = [
            'ads' => AdsResource::collection($ads) ,
            'prodtucts' => $myproducts ,
        ];
        return $this->SuccessApi($data); 
       
    }



    public function ConfirmCancelOrder($id)
    {
        $order = Order::find($id);
        if (!$order)
            return $this->FailedApi('this order not found');

        $cancel_tax_order = $this->getCancelOrderTax();
        $this->PullMoneyFromWallet($cancel_tax_order);
        $this->ConvertToCancel($order);

        if($order->user_id)
        {
            $title = 'تم الغاء الطلب';
            $body = 'تم الغاء الطلب من قبل السائق';
            $user = User::where('id' , $order->user_id)->first();
            Notification::send($user, new CancelNotification($title , $body));
            $this->sendFcmNotifications($user->device_token , $title , $body);
        }


        return $this->SuccessApi(null);
    }

    private function ConvertToCancel($order)
    {
       $order->delete();
       return true;
    }


    public function getWallet()
    {
        $wallet = Wallet::where('userable_id' , auth('partner')->id())->where('userable_type' , Driver::class)->first();
        // dd($wallet) ;
        return $wallet ;
    }

    public function PullMoneyFromWallet($amount)
    {
        $wallet = $this->getWallet();
        $wallet->balance = $wallet->balance - $amount ;
        $wallet->save();
        return true;
    }
}
