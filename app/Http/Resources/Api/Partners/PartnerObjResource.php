<?php

namespace App\Http\Resources\Api\Partners;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Http\Resources\Car\CarImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerObjResource extends JsonResource
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
            'type'=> $this->type,
            'image'=> $this->image_path,
            'manger_name'=> $this->manger_name,
            'commercial_registration_no'=> $this->commercial_registration_no,
            'description'=> $this->description,
            'id_number'=> $this->id_number,
            'id_image' => $this->id_image_path,
            'commercial_reg_image'=> $this->commercial_reg_image_path,
            // 'token' => isset($this->token) ? $this->token : null,
            'status'=> $this->status,
            'rate'=> 0 ?? $this->Rating ,
            'lon' =>  $this->lon,
            'lat' =>  $this->lat,
            'address' => $this->address,
            'branch_name' => $this->branch_name,
        ];
       
    }
}
