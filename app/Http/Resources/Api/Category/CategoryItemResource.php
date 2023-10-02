<?php

namespace App\Http\Resources\Api\Category;

use App\Http\Resources\Api\Services\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryItemResource extends JsonResource
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
            'name_ar' => $this->getTranslation('name', 'ar'),
            'name_en' =>$this->getTranslation('name', 'en'),
            'services' => ServiceResource::collection($this->services),
            // 'update'=> route('categories.update' , $this->id),
        ];
       
    }
}
