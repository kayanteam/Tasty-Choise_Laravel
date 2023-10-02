<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Partners\PartnerResource;
use App\Http\Resources\Api\Users\UserResource;
use App\Models\Restaurant;
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\SmsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use ApiTrait   ;
    public function Login(Request $request)
    {
       
        $input = $request->all();
        // return $input ;
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null) , 'exists:partners,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email'=> [Rule::requiredIf($request->phone == null) , 'email' , 'exists:partners,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($request->phone){
            $user = Restaurant::where('phone', $request->phone)->first();
        }else{
            $user = Restaurant::where('email', $request->email)->first();
        }
      
        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }
      
        $token = $user->createToken('hojizati', ['restaurant'])->accessToken;
       
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'login successfully',
            'user' => new PartnerResource($user->setAttribute('token', $token)),
        ], 200);
    }

    public function Register(Request $request)
    {
        $request->validate([

            'phone' => [Rule::requiredIf($request->email == null), 'unique:restaurants,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'email', 'unique:restaurants,email'],
            'password' => ['required', 'string', 'min:8'],
            'name'=> 'required|max:50' ,
        ]);

        $code = $this->generateCode() ;
        $user = Restaurant::create([
            'name'=> $request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'code' => $code,
            'fcm_token' => $request->fcm_token ?? '',
        ]);

        // $this->SendVerificationCode($code , $request->phone);
        $user->Wallet()->create(['userable_type' => Restaurant::class]);
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'Register successfully , We will send you a verification code',
            'user' => null ,
        ], 200);
    }


    public function VerifyCode(Request $request)
    {
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null), 'exists:partners,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'exists:partners,email'],
            'code' => ['required', 'string', 'min:4'],
        ]);
   
       
        if ($request->phone != null) {
            $user = Restaurant::where('phone', $request->phone)->first();
        } else {
            $user = Restaurant::where('email', $request->email)->first();
        }

        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

        if ($user->code != $request->code) {
            return $this->FailedApi('The code are incorrect.');
        }

        $token = $user->createToken('MyApp', ['partner'])->accessToken;
        $user->update([
            'code' => null,
        ]);
    
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code verified successfully',
            'user' => new PartnerResource($user->setAttribute('token', $token)),
        ], 200);
    }

    //forget password
    public function ForgetPassword(Request $request)
    {
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null), 'exists:partners,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'exists:partners,email'],
           
        ]);

        

        if($request->phone){
            $user = Restaurant::where('phone', $request->phone)->first();
        }else{
            $user = Restaurant::where('email', $request->email)->first();
        }
        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

       
        $code = $this->generateCode() ;
        $user->update([
            'code' =>  $code,
        ]);
        $this->SendVerificationCode($code , $request->phone);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code send successfully',
            'user' => null,
        ], 200);
    }


    //reset password
    public function ResetPassword(Request $request)
    {
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null), 'exists:partners,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'exists:partners,email'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        

        if($request->phone){
            $user = Restaurant::where('phone', $request->phone)->first();
        }else{
            $user = Restaurant::where('email', $request->email)->first();
        }
        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Password changed successfully',
            'user' =>null,
        ], 200);
    }


    //change password
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        $user = Restaurant::where('id', auth('partner')->user()->id)->first();

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Password changed successfully',
            'user' => null,
        ], 200);
    }
    //resendCode
    public function ResendCode(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
        ]);

        $user = Restaurant::where('phone', $request->phone)->first();

        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }
        $code = $this->generateCode();
        $user->update([
            'code' =>  $code ,
        ]);
        $this->SendVerificationCode($code , $request->phone);
      
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code send successfully',
            'user' => new PartnerResource($user),
        ], 200);
    }

    public function socialLogin(Request $request)
    {


        $validate = $request->validate([
            'id' => 'required|string',
            'provider' => ['required', 'string', Rule::in(['apple', 'google'])],
            'name' => 'nullable|string',
            'image' => 'nullable|string',
            'email' => 'nullable|email',
            'uuid' => 'nullable|string',
        ]);


        $user = User::where('provider_type', $request->provider)
            ->where('provider_id', $request->id)
            ->when($request->uuid, function ($query) use ($request) {
                $query->where('provider_uuid', $request->uuid);
            })
            ->first();
        // return $request;
        // if there is no record with these data, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'image' => ($request->image ?? null),
                'provider_id' => $request->id,
                'provider_type' => $request->provider,
                'email' => $request->email,
                'provider_uuid' => $request->uuid,
            ]);
        }

        $token = $user->createToken('postman');
        $accessToken = PersonalAccessToken::findToken($token->plainTextToken);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'login successfully',
            'user' => new UserResource($user->setAttribute('token', $token->plainTextToken)),
        ], 200);
    }


    public function RefreshDeviceToken(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required|string',
            'lang'=> 'required',
        ]);
      

        $user = User::where('id', Auth::guard('user')->id())->first();

        if ($user) {
            $user->update([
                'fcm_token' => $request->fcm_token,
                'lang'=> $request->lang ,
            ]);
        } else {
            return $this->FailedApi('User Not Found', 404);
        }
        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'token successfully',
            'user' => null,
        ], 200);
    }
}
