<?php

namespace App\Http\Resources\Api\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name ,
            'price'=> $this->price ,
            'image'=> $this->image_path ,
            'description'=> $this->description ,
            'restaurant'=> $this->resturant->name,
            'restaurant-image'=> $this->resturant->image_path,

        ];

    }
}
