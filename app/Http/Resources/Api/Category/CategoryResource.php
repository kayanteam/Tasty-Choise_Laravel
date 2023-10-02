<?php

namespace App\Http\Resources\Api\Category;

use App\Http\Resources\Api\Services\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => $this->name,
            'icon'=> asset('storage/' . $this->icon) ,
        ];
       
    }
}
