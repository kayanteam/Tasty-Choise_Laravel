<?php

namespace App\Http\Resources\Api\Wallet;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\RestauarntSubscription;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $Sub = RestauarntSubscription::where('resturant_id' , auth('restaurant')->id())->where('subscription_id' , $this->id)->first();
        return [
            'id' => $this->id,
            'name'=> $this->name ,
            'price'=> $this->price ,
            'days'=> $this->duration ,
            'has_order'=> $this->has_order ,
            'is_subscribed'=> $Sub ? $Sub->status : 'unsubscribe' ,
        ];
       
    }
}
