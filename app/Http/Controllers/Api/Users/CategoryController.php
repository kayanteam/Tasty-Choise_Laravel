<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoryCollection;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Category\UserCategoryCollection;
use App\Http\Resources\Api\Category\UserCategoryResource;
use App\Http\Resources\Api\Services\ServiceCollection;
use App\Http\Resources\Api\Services\ServiceItemResource;
use App\Http\Resources\Api\Services\ServicesCollection;
use App\Http\Resources\FieldResource;
use App\Models\Category;
use App\Models\Service;
use App\Models\ServiceAttr;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiTrait;

    public function ShowCategories()
    {
        $categories = Category::Active()->FullParent()->get();
        return new UserCategoryCollection($categories); 
    }

    //Show Category 
    public function ShowCategory($id)
    {
        $categories = Category::where('parent_id' , $id)->get();
        if(!$categories)
        {
            return $this->FailedApi('Category Not Found' , 404);
        }
        
        return new UserCategoryCollection($categories); 
    }

    public function ShowServices(Request $request)
    {
        $search = $request->search;
        $categoryId = $request->category_id;
        
        // if(!$categoryId)
        // {
        //     return $this->FailedApi('Category Id is required' , 422);
        // }
        $services =Service::when($search , function($q) use($search){
            return $q->where('name' , 'LIKE' , "%$search%");
        })
        ->when($categoryId , function($q) use($categoryId){
            return $q->where('category_id' , $categoryId);
        })
        ->orderBy('created_at' , 'DESC')->paginate(10);
        return new ServiceCollection($services); 
    }

    public function ShowService($id)
    {
        $service = Service::where('id' , $id)->first();
        return $this->SuccessApi(new ServiceItemResource($service) , 'Service'); 
    }

    
    public function ShowServiceFeilds($id)
    {
        $attr = ServiceAttr::where('service_id' , $id)->get();
        return $this->SuccessApi(FieldResource::collection($attr), 'Service'); 
    }







}
