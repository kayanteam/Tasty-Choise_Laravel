<?php

namespace App\Http\Resources\Api\Orders;

use App\Models\Ads;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RestaurantOrderCollection extends ResourceCollection
{

 


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'status' => true,
            'code' => 200,
            'message' => 'Success',
            'data' =>$this->collection,
          
        ];
       
    }

  
}
