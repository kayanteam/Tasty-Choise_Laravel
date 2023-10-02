<?php

namespace App\Http\Resources\Api\Users;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'image' => $this->image_path,
            'phone'=> $this->phone,
            'email'=> $this->email ,
            'token' => $this->token,
            'status'=> $this->status,
            // 'gender'=> $this->gender ,
            // 'wallet_balance'=> $this->Wallet->balance ,
            // 'orders'=> Order::where('user_id' , auth('user')->id())->where('status' , 'done')->latest()->select('id' , 'order_num')->get(), 
        ];
       
    }
}
