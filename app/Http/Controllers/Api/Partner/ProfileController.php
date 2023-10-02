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
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class ProfileController extends Controller
{
    use GeneralTrait, ApiTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get token from header 
        $token = request()->header('Authorization');
        $user = Partner::find(auth('partner')->id());

        return $this->SuccessApi(new PartnerResource($user->setAttribute('token', str_replace('Bearer ', '', $token))), 'Profile Return Successfully');
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
            'type' => 'required|in:person,company',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'commercial_activation' => 'nullable|image',
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'id_number' => 'nullable|string',
            'activity_practice_certificate' => 'nullable|image',
            'id_image' => 'nullable|image',
            'manager_name' => 'nullable|string',
            'commercial_registration_no' => 'nullable|string',
            'description' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'manager_id_image' => 'nullable|image',
            'commercial_reg_image' => 'nullable|image',
            'lon' => 'nullable|numeric',
            'lat' => 'nullable|numeric',
            'address' => 'nullable|string',
            'branch_name' => 'nullable|string',
        ]);

        $data = $request->all();

        $user = Partner::where('id', auth('partner')->user()->id)->first();
        if ($request->image) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $data['image'] = $image_path;
        }
        if ($request->commercial_activation) {
            $image_path = $request->file('commercial_activation')->store('uploads', 'public');
            $data['commercial_activation'] = $image_path;
        }

        if ($request->id_image) {
            $image_path = $request->file('id_image')->store('uploads', 'public');
            $data['id_image'] = $image_path;
        }

        if ($request->manager_id_image) {
            $image_path = $request->file('manager_id_image')->store('uploads', 'public');
            $data['manager_id_image'] = $image_path;
        }

        
        if ($request->commercial_reg_image) {
            $image_path = $request->file('commercial_reg_image')->store('uploads', 'public');
            $data['commercial_reg_image'] = $image_path;
        }
        // if ($request->car_images) {
        //     foreach ($request->car_images as $key => $value) {
        //         $image_path = $value->store('uploads', 'public');
        //         CarImages::create([
        //             'driver_id' => $user->id,
        //             'image' => $image_path,
        //         ]);
        //     }
        //     unset($data['car_images']);
        // }

        $user->update($data);


        if($request->address)
        {
            $hotel = Hotel::where('partner_id' , $user->id)->first();
            $hotel->update([
                'name' => $request->name ?? $hotel->name, 
                'address' => $request->address ?? $hotel->address ,
                'lng' => $request->lng  ?? $hotel->lng ,
                'lat' => $request->lat  ?? $hotel->lat ,
            ]);
        }
       

        //get token from header 
        $token = request()->header('Authorization');

        return $this->SuccessApi(new PartnerObjResource($user), 'Profile Updated Successfully');
    }

    public function selectServices(Request $request)
    {
        $request->validate([
            'my_categories' => 'required',
            'car_type_id' => 'required',
            'nav_range_id' => 'required',
        ]);
        $data = $request->all();
        $user = Driver::where('id', auth('partner')->id())->first();
        $user->update($data);
        return $this->SuccessApi(null, 'Profile Updated Successfully');
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

    //update Lng Lat address 
    public function updateLocation(Request $request)
    {
        $request->validate([
            'lat' => 'required|string|max:255',
            'lng' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);
        $data = $request->all();
        User::where('id', auth('user')->user()->id)->update($data);
        return $this->SuccessApi($data, 'Location Updated Successfully');
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
}
