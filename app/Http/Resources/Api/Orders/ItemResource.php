<?php

namespace App\Http\Resources\Api\Orders;

use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'name' => $this->service ? $this->service->name : 'deleted',
            'price'=> $this->price ?? '',
        ];
       
    }
}
