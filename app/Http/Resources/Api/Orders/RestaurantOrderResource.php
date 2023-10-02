<?php

namespace App\Http\Resources\Api\Orders;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = $this->User;
        return [
            'id' => $this->id,
            'order_num' => $this->order_number,
            'user'=> $this->user_id ?  [
                'id' => $this->user_id ,
                'image'=> $user->image ,
                'name'=> $user->name ,
            ] : null ,
            'status'=> $this->status ,
            'created_at'=> Carbon::parse($this->created_at)->format('Y-m-d H:i:s') ,
            'product'=> [
                'id' => $this->product_id ,
                'name'=> $this->product->name ,
                'image'=> $this->product->image_path ,
                'price'=> $this->product->price ,
                'count'=> $this->count ,
            ],    
        ];
       
    }
}
