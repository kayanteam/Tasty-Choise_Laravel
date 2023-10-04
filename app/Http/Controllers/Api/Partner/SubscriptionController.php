<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Subscriptions\SubscriptionResource;
use App\Models\Product;
use App\Models\RestauarntSubscription;
use App\Models\Subscription;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //SHOW SUBSCRIPTIONS
        $subscriptions = Subscription::get();
        return $this->SuccessApi(SubscriptionResource::collection($subscriptions), 'الاشتراكات');
    }


    /**
     * Store the specified resource.
     */
    public function store(Request $request)
    {
        //ADD SUBSCRIPTION
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id',
        ]);
        $subscription = Subscription::find($request->subscription_id);
        RestauarntSubscription::create([
            'restaurant_id' => auth('restaurant')->user()->id,
            'subscription_id' => $request->subscription_id,
            'expired_at' => now()->addDays($subscription->duration),
        ]);
        return $this->SuccessApi(null , 'تم اضافة الاشتراك بنجاح');
    }

}
