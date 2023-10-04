<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Users\UserResource;
use App\Http\Resources\Api\Users\UserResourceWithoutToken;
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\SmsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use ApiTrait;
    public function Login(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null), 'exists:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($request->email && (Auth::attempt(['email' => $request->email, 'password' => $input['password']]))) {
            $user  = Auth::user('user');
        } elseif (Auth::attempt(['phone' =>  $request->phone, 'password' => $input['password']])) {
            $user  = Auth::user('user');
        } else {
            return $this->FailedApi('The auth credentials are incorrect.');
        }

        $token = $user->createToken('MyApp', ['user'])->accessToken;


        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'login successfully',
            'user' => new UserResource($user->setAttribute('token', $token)),
        ], 200);
    }

    public function Register(Request $request)
    {

        $request->validate([

            'phone' => [Rule::requiredIf($request->email == null), 'unique:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $code = $this->generateCode();
        $user = User::create(([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'code' => $code,
            'fcm_token' => $request->fcm_token ?? '',
        ]));

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'Register successfully , We will send you a verification code',
            'user' => null,
        ], 200);
    }


    public function VerifyCode(Request $request)
    {
        $request->validate([
            'phone' => [Rule::requiredIf($request->email == null), 'exists:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:8'],
            'email' => [Rule::requiredIf($request->phone == null), 'exists:users,email'],
            'code' => ['required', 'string', 'min:4'],
        ]);

        if ($request->phone != null) {
            $user = User::where('phone', $request->phone)->first();
        } else {
            $user = User::where('email', $request->email)->first();
        }


        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

        if ($user->code != (string)$request->code) {
            return $this->FailedApi('The code are incorrect.');
        }

        $user->update([
            'code' => null,
        ]);

        $token = $user->createToken('MyApp', ['user'])->accessToken;

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code verified successfully',
            'user' => new UserResource($user->setAttribute('token', $token)),
        ], 200);
    }

    //forget password
    public function ForgetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }

        $code = $this->generateCode();
        $user->update([
            'code' =>  $code,
        ]);

        // $this->SendVerificationCode($code, $request->email);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code send successfully',
            // 'user' => new UserResource($user),
        ], 200);
    }


    //reset password
    public function ResetPassword(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();

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
            'user' => null,
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

        $user = User::where('id', auth('user')->user()->id)->first();

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
            'email' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->FailedApi('The provided credentials are incorrect.');
        }
        $code = $this->generateCode();
        $user->update([
            'code' =>  $code,
        ]);
        // $this->SendVerificationCode($code, $request->phone);

        return Response()->Json([
            'status' => true,
            'code' => 200,
            'message' => 'The Code send successfully',
            'user' => new UserResource($user),
        ], 200);
    }

  
    public function RefreshDeviceToken(Request $request)
    {
        $request->validate([
            'fcm_token' => 'required|string',
            'lang' => 'required',
        ]);


        $user = User::where('id', Auth::guard('user')->id())->first();

        if ($user) {
            $user->update([
                'fcm_token' => $request->fcm_token,
                'lang' => $request->lang,
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
