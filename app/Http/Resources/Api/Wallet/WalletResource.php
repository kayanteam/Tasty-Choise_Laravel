<?php

namespace App\Http\Resources\Api\Wallet;

use App\Http\Resources\Api\Services\ServiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
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
            'balance'=> $this->balance ,
            'currency'=> __('dashboard.currency'),
            'transactions'=> WalletTransactionResource::collection($this->transations ?? []) ,
        ];
       
    }
}
