<?php

namespace App\Http\Resources\Api\Orders;

use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'number' => $this->order_num,
            'status'=> $this->status,
            'hotel'=> $this->Service->Hotel ? $this->Service->Hotel->name : null,
            // 'hotel'=> $this->hotel ,
            'category'=> $this->Service->Category->name ,
            'service'=> [
                'id'=> $this->Service->id,
                'name'=> $this->Service->name,
                'image'=> asset('storage/' . $this->Service->main_image) ,
                'rate'=> '4.5' ,
            ],
            'user'=> [
                'id'=> $this->user->id,
                'name'=> $this->user->name,
                'image'=> $this->user->image_path ,
            ],
            'created_at'=> $this->created_at->diffforHumans(),
        ];
       
    }
}
