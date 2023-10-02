<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\NotificationResource as ApiNotificationResource;
use App\Http\Resources\NotificationCollection;
use App\Http\Resources\NotificationResource;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    use ApiTrait ;
    
    public function index()
    {
        $user = Auth::guard('restaurant')->user();
        return new NotificationCollection($user->notifications()->latest()->paginate(10));  

    }

}
