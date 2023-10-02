<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoryCollection;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class RestaurantTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = request()->pageLength ?? 15;
        //show Categories
        $categories = Category::where('status', 1)->paginate($paginate);
        return new CategoryCollection($categories);
    }


}
