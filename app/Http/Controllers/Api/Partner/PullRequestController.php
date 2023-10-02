<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Wallet\WalletResource;
use App\Models\Driver;
use App\Models\PullRequest;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class PullRequestController extends Controller
{

    use ApiTrait ;
    

    public function RequestMoney(Request $request)
    {
        $request->validate([
            'name'=> 'required' ,
            'iban_number'=>'required' ,
            'account_number'=> 'required' ,
            'amount'=> 'required',
            'bank'=> 'nullable' ,
        ]);

        $request->merge(['driver_id'=> auth('partner')->user()->id]);

        PullRequest::create($request->all());

        //Transactions 
        // $wallet = Wallet::where('userable_id' , auth('user')->id())->where('userable_type' , User::class)->first();
       
        // WalletTransaction::create([
        //     'wallet_id' => $wallet->id,
        //     'amount' => $request->amount,
        //     'type'=> 2 ,
        // ]);
        return $this->SuccessApi(null);
    }
}
