<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Partners\PartnerObjResource;
use App\Http\Resources\Api\Partners\PartnerResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Models\CarImages;
use App\Models\Driver;
use App\Models\Hotel;
use App\Models\Partner;
use App\Models\Restaurant;
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
        // return Auth::guard('restaurant')->user();
        $token = request()->header('Authorization');
        $restaurant = Restaurant::find(auth('restaurant')->id());

        return $this->SuccessApi(new PartnerResource($restaurant->setAttribute('token', str_replace('Bearer ', '', $token))), 'Profile Return Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:restaurants,email,' . auth('restaurant')->id(),
            'password' => ['required', 'string', 'min:8'],
            'name' => 'required|max:50',
            'category_id' => 'required|exists:categories,id',
            'manager_name' => 'required|max:50',
        ]);

        $data = $request->all();

        $restaurant = Restaurant::where('id', auth('resturant')->user()->id)->first();
        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }


        $restaurant->update($data);


        //get token from header 
        $token = request()->header('Authorization');

        return $this->SuccessApi(new PartnerResource($restaurant->setAttribute('token', str_replace('Bearer ', '', $token))), 'تم تعديل البروفايل بنجاح');
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
        Restaurant::where('id', auth('user')->user()->id)->update($data);
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
        $user = Restaurant::find(auth('user')->user()->id);
        $user->delete();
        return $this->SuccessApi($user, 'Profile Deleted Successfully');
    }
}
