<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //show my products
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'product_type_id' => 'required|exists:product_types,id',
            'description' => 'required|string',
        ]);
         $request->merge([
            'restaurant_id' => auth('restaurant')->id(),
        ]);
        $data = $request->all();

        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }
      
        Product::create($data);
        return $this->SuccessApi(null, 'تم اضافة المنتج بنجاح');


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
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable',
            'product_type_id' => 'required|exists:product_types,id',
            'description' => 'required|string',
        ]);
        $data = $request->except('product_id');

        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }
        //store Image
        Product::find($request->product_id)->update($data);
        return $this->SuccessApi(null, 'تم تعديل المنتج بنجاح');
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
