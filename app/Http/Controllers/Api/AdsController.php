<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Models\Ads;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    use ApiTrait;
    public function ShowAds($categoryId)
    {
        $ads = Ads::where('status' , 1)->where('category_id' , $categoryId)->get();
        return $this->SuccessApi(AdsResource::collection($ads) , 'Ads');
    }


    public function ShowHomeAds($id)
    {
        $ads = Ads::where('status' , 1)->latest()->limit(10)->inRandomOrder()->get();
        return $this->SuccessApi(AdsResource::collection($ads) , 'Ads');
    }
}
