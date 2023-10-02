<?php

namespace App\Http\Resources\Api\Wallet;

use App\Http\Resources\Api\Services\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletTransactionResource extends JsonResource
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
            'type'=> $this->type == 1 ? 'سحب' : 'ايداع' ,
            'amount'=> $this->amount ,
            'currency'=> __('dashboard.currency') ,
            'created_at' => $this->created_at->format('y-m-d'),
        ];
       
    }
}
