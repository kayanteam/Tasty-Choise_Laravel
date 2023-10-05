<?php

namespace App\Http\Resources\Api\Partners;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Http\Resources\Car\CarImageResource;
use App\Models\RestauarntSubscription;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $Sub = RestauarntSubscription::where('restaurant_id' , auth('restaurant')->id())->latest()->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'rest_type'=> $this->type,
            'image'=> $this->image_path,
            'manger_name'=> $this->manger_name,
            'token' => isset($this->token) ? $this->token : null,
            'is_subscribed'=> $Sub ? ($Sub->status == 'active' ? true : false )  : false ,

        ];

    }
}
