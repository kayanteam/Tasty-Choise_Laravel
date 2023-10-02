<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Partners\PartnerResource;
use App\Http\Resources\Api\Services\ServiceCollection;
use App\Http\Resources\Api\Services\ServiceResource as ServicesServiceResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Http\Resources\ServiceResource;
use App\Models\FavoriteService;
use App\Models\Partner;
use App\Models\Service;
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class ProfileController extends Controller
{
    use ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get token from header 
        $token = request()->header('Authorization');
        $user = User::find(auth('user')->user()->id);
        return $this->SuccessApi(new UserResource($user->setAttribute('token', str_replace('Bearer ', '', $token))), 'Profile Return Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users,phone,' . auth('user')->id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . auth('user')->id(),
        ]);

        $data = $request->all();
        //store Image 
      
        $user = User::where('id', auth('user')->id())->first();
        $user->update($data);
        //get token from header 
        $token = request()->header('Authorization');
        return $this->SuccessApi(new UserResource($user->setAttribute('token', str_replace('Bearer ', '', $token))), 'Profile Updated Successfully');
    }


    public function updateImage(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = $request->all();
        //store Image 
        if ($request->image) {
            $data['image'] = $this->imageStore($request, $data, 'image', 'images/users');
        }
        User::where('id', auth('user')->user()->id)->update($data);
        return $this->SuccessApi($data, 'Image Updated Successfully');
    }

  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyAccount()
    {
        $user = User::find(auth('user')->user()->id);
        $user->Orders()->delete();
        $user->delete();
        return $this->SuccessApi($user, 'Profile Deleted Successfully');
    }


    //ShowFavoriteServices
    public function ShowFavoriteServices(Request $request)
    {

        $categoryId = $request->category_id;
        if ($categoryId == null) {
            return $this->FailedApi('Category Id Is Required');
        }
        $user = User::find(auth('user')->user()->id);
        $Ids = FavoriteService::where('user_id', $user->id)->get()->pluck('service_id')->toArray();
        $services = Service::whereIn('id', $Ids)->where('category_id', $categoryId)->get();
        return new ServiceCollection($services);
    }



    //add To Favorite Services
    public function FavoriteServices(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
        ]);
        $user = User::find(auth('user')->user()->id);
        $services = Service::find($request->service_id);
        $fav = FavoriteService::where('user_id', $user->id)->where('service_id', $request->service_id)->first();
        if ($fav) {
            $fav->delete();
            return $this->SuccessApi(null, 'Service Removed From Favorite Successfully');
        }
        $favs = FavoriteService::create([
            'user_id' => $user->id,
            'service_id' => $request->service_id,
        ]);
        return $this->SuccessApi(new ServicesServiceResource($services), 'Service Added To Favorite Successfully');
    }

    public function AddMoaneyRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bank_id' => 'required',
            'image' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = auth('user')->id();
        if ($request->image) {
            $data['image'] = $this->imageStore($request, $data, 'image', 'images/paymentreceipt');
        }
        PaymentReceipt::create($data);
        return $this->SuccessApi(null);
    }
}
