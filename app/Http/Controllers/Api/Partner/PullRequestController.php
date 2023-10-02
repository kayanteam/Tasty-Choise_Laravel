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

        $request->merge(['restaurant_id'=> auth('restaurant')->user()->id]);
        PullRequest::create($request->all());
        return $this->SuccessApi(null);
    }
}
