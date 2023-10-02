<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Category\CategoryResource;
use App\Http\Resources\AppConfig\AppResource;
use App\Http\Resources\ItemResource;
use App\Models\AppConfiguration;
use App\Models\Bank;
use App\Models\CarType;
use App\Models\Category;
use App\Models\MishwarType;
use App\Models\NavRange;
use App\Models\OrderType;
use App\Models\Payment;
use App\Models\RevisionType;
use App\Models\Setting;
use App\Models\ShoppingType;
use App\Models\TourTime;
use App\Models\TourType;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function App()
    {
        $settings = Setting::first();
        return response()->json([
            'facebook' => $settings->facebook,
            'twitter' => $settings->twitter,
            'instagram' => $settings->instagram,
            'snapchat' => $settings->snapchat,
            'youtube' => $settings->youtube,
            'whatsapp' => $settings->whatsapp,
            'phone' => $settings->phone,
            'email' => $settings->email,
        
        ]);
    }
}
