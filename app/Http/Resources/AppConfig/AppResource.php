<?php

namespace App\Http\Resources\AppConfig;

use Illuminate\Http\Resources\Json\JsonResource;

class AppResource extends JsonResource
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
            'title'=> $this->title ,
            'sub_title'=> $this->desc ,
            'logo'=> $this->logo_path ,
            'splash'=> $this->splash_path ,
            'order_duration'=> $this->order_duration ,
            'cancel_order_tax'=> $this->cancel_order_tax,
        ];
    }
}
