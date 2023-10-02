<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Wallet\WalletResource;
use App\Models\Driver;
use App\Models\PaymentReceipt;
use App\Models\PullRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Traits\ApiTrait;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;

class RequestMoneyController extends Controller
{

    use ApiTrait , GeneralTrait ;
    

    public function AddMoaneyRequest(Request $request)
    {
        $request->validate([
            'name'=> 'required' ,
            'bank_id'=>'required' ,
            'image'=> 'nullable',
        ]);
        $data = $request->all();
        $data['user_id'] = auth('user')->id();
        if($request->image){
            $data['image'] = $this->imageStore($request , $data , 'image' , 'images/paymentreceipt');
        }
        PaymentReceipt::create($data);
        return $this->SuccessApi(null);
    }

    public function AddPartnerMoaneyRequest(Request $request)
    {
        $request->validate([
            'name'=> 'required' ,
            'bank_id'=>'required' ,
            'image'=> 'nullable',
        ]);
        $data = $request->all();
        $data['user_id'] = auth('parnter')->id();
        if($request->image){
            $data['image'] = $this->imageStore($request , $data , 'image' , 'images/paymentreceipt');
        }
        PaymentReceipt::create($data);
        return $this->SuccessApi(null);
    }


    public function StoreTransaction(Request $request)
    {
        $request->validate([
            'amount'=> 'required' ,
        ]);
        $wallet = Wallet::where('userable_id' , auth('user')->id())->where('userable_type' , User::class)->first();
        $wallet->update([
            'balance' => $wallet->balance + $request->amount
        ]);

        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->amount,
            'type'=> 2 ,
        ]);

        return $this->SuccessApi(null);
    }



    public function StoreParnterTransaction(Request $request)
    {
        $request->validate([
            'amount'=> 'required' ,
        ]);
        $wallet = Wallet::where('userable_id' , auth('partner')->id())->where('userable_type' , 'App\Models\Partner')->first();
        $wallet->update([
            'balance' => $wallet->balance + $request->amount
        ]);

        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'amount' => $request->amount,
            'type'=> 2 ,
        ]);

        return $this->SuccessApi(null);
    }


    
}
