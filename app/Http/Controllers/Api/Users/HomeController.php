<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Orders\RestaurantOrderCollection;
use App\Http\Resources\Api\Orders\OrderItemResource;
use App\Http\Resources\Api\Products\ProductResource;
use App\Http\Resources\Api\Restuarants\ResturantsCollection;
use App\Models\Ads;
use App\Models\Category;
use App\Models\Driver;
use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
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

        $status = $request->status ?? 'open' ;
        $paginate = $request->pageLength ?? 15 ;
    
    
        $ads = Ads::latest()->limit(10)->get();
        $categories = Category::where('status' , 1)->get();
        $products  = Product::latest()->limit(6)->get();

        $data = [
            'ads' => AdsResource::collection($ads) ,
            'categories' => CategoryResource::collection($categories) ,
            'prodtucts' => ProductResource::collection($products) ,
        ];
        return $this->SuccessApi($data); 
       
    }


    public function Restuarants(Request $request)
    {
        $categoryId = $request->category_id ;
        $maxPrice = $request->max_price ?? Product::max('price') ;
        $minPrice = $request->min_price ?? 0 ;

        $paginate = $request->pageLength ?? 15 ;
        $restuaurants = Restaurant::withCount('Product')
        ->whereHas('Product' , function($query) use ($maxPrice , $minPrice){
            $query->when($maxPrice , function($q) use($maxPrice , $minPrice){
                $q->whereBetween('price' , [$minPrice , $maxPrice]);
            });
        })
        ->when($categoryId , function($q) use($categoryId){
            $q->where('category_id' , $categoryId);
        })
        ->orderBy('product_count' , 'desc')
        ->paginate($paginate);
        return new ResturantsCollection($restuaurants);
    }


   public function RestuarantProducts($restId)
   {
         $products = Product::where('restaurant_id' , $restId)->get();
         return $this->SuccessApi(ProductResource::collection($products));
   }

   public function ShowProduct($id)
   {
       $product = Product::find($id);
       return $this->SuccessApi(new ProductResource($product));
   }
}
