<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //SHOW SUBSCRIPTIONS
       $subscriptions = Subscription::where('status', 1)->get();
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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nulla|image',
            'product_type_id' => 'required|exists:product_types,id',
            'description' => 'required|string',
        ]);
        $data = $request->all();
        //store Image
        Product::create($data);

        return $this->SuccessApi(null, 'تم اضافة المنتج بنجاح');
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
