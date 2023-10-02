<?php

namespace App\Http\Resources\Api\Orders;

use App\Http\Resources\Api\Driver\DriverResource;
use App\Http\Resources\Api\Offers\OfferResource;
use App\Http\Resources\Api\Services\ServiceResource;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferItemResource extends JsonResource
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
            'order_id' => $this->Order->id,
            'start_lng'=> $this->Order->start_lng ,
            'start_lat'=> $this->Order->start_lat,
            'start_address'=>$this->Order->start_address ,
            'end_lng'=> $this->Order->end_lng ,
            'end_lat'=> $this->Order->end_lat,
            'end_address'=>$this->Order->end_address ,
            'number' => $this->Order->order_num,
            'category'=> $this->Order->Category->name ,
            'status'=> $this->Order->status ,
            'car_type'=> $this->Order->car_type_id ? $this->Order->CarType->name : null ,
            'pick_type'=> $this->Order->pick_type,
            'payment_types'=> 'cash' ,
            'nav_range'=> $this->Order->nav_range_id ? $this->Order->NavRange->name  : null ,
            'driver_gender'=> $this->Order->driver_gender ,
            'tour_type_status'=> $this->Order->tour_type  ,
            'tour_type'=> $this->Order->tour_type_id ? $this->Order->TourType->name : null ,
            'revision_type'=> $this->Order->revision_type_id ? $this->Order->RevisionType->name : null ,
            'tour_time'=> $this->Order->tour_time ,
            'seats_number'=> $this->Order->seats_number ,
            'driver'=> $this->Order->driver_id ? new DriverResource($this->Order->Driver) : null ,
            'desc'=> $this->Order->desc ,
            'price'=> $this->price ,
            'tax'=> $this->tax ,
            'total'=> $this->price + $this->tax ,
        ];
       
    }
}
