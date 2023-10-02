<?php

namespace App\Http\Resources\Api\Partners;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Http\Resources\Car\CarImageResource;
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
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone'=> $this->phone,
            'email'=> $this->email,
            'rest_type'=> $this->type,
            'image'=> $this->image_path,
            'manger_name'=> $this->manger_name,
            'token' => isset($this->token) ? $this->token : null,
        ];
       
    }
}
