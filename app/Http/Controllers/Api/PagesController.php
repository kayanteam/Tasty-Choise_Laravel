<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    use ApiTrait;
    public function getPrivacyPolicy()
    {
        $privacyPolicy = Privacy::first();
        return $this->SuccessApi( $privacyPolicy->desc ,'Privacy Policy',);
        
    }
}
