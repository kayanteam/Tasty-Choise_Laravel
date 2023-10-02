<?php

namespace App\Http\Resources\Api\Orders;

use App\Http\Resources\Api\Driver\DriverResource;
use App\Http\Resources\Api\Offers\OfferResource;
use App\Http\Resources\Api\Services\ServiceResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Models\Employee;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'service'=> $this->Service ? [
                'id'=> $this->Service->id,
                'name'=> $this->Service->name,
                'image'=> asset('storage/' . $this->Service->main_image) ,
                'rate'=> '4.5' ,
                'category'=> $this->Service->Category->name ,
                'hotel'=> $this->Hotel ? $this->Hotel->name : null ,
                'distance'=>'212.2' ?? $this->getDistance($this->Hotel->lng , $this->Hotel->lat),
            ] : null ,   

            'author_details' => [
                'author_name'=> $this->author_name,
                'author_phone'=> $this->author_phone,
                'author_email'=> $this->author_email, 
            ] , 
            'book_date'=> $this->book_date,   
            'price'=> $this->price,
            'created_at'=> $this->created_at->format('y-m-d') ,

        ];
       
    }


    public function getDistance($lng , $lat)
    {

    }
}
