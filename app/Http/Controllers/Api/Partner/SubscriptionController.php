<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Subscriptions\SubscriptionResource;
use App\Models\Product;
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->first();
        if (!$product) {
            return $this->FailedApi('هذا المنتج غير موجود');
        }
        $product->delete();
        return $this->SuccessApi(null, 'تم حذف المنتج بنجاح');
    }
}
