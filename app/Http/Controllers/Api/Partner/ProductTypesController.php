<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoryCollection;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginate = request()->pageLength ?? 15;
        //show Categories
        $productTypes = ProductType::where('status', 1)->get();
        return $productTypes;
    }


}
