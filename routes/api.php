<?php

use App\Http\Controllers\Api\Partner\HomeController;
use App\Http\Controllers\Api\Partner\ProfileController;
use App\Http\Controllers\Api\Partner\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('partners')->middleware(['auth:restaurant'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('update-profile', [ProfileController::class, 'store']);
    Route::post('update-image', [ProfileController::class, 'updateImage']);
    Route::post('delete-account', [ProfileController::class, 'destroyAccount']);

    Route::get('home', [HomeController::class, 'Home']);

    Route::get('cancel-order/{id}', [HomeController::class, 'ConfirmCancelOrder']);


    
    Route::get('wallet', [WalletController::class, 'index']);
    Route::post('request-money', [PullRequestController::class, 'RequestMoney']);
   

    Route::post('contact-us', [CommunicationController::class, 'ContactUs']);
    Route::apiResource('notifications', NotificationController::class);

   
    Route::get('showCategories', [CategoryController::class, 'ShowCategories']);
    //Show Service by hotel Id
    Route::get('ShowServices/{id}', [PartnerOperationController::class, 'ShowServices']);
    //Remove Service
    Route::get('remove-service/{id}', [PartnerOperationController::class, 'DeleteService']);

    //Orders 
    Route::get('showOrders', [PartnerOrderController::class, 'ShowOrders']);
    Route::get('showOrder/{id}', [PartnerOrderController::class, 'ShowOrder']);

  

    Route::post('add-balance', [RequestMoneyController::class, 'StoreParnterTransaction']);
    Route::post('request-money', [RequestMoneyController::class, 'AddPartnerMoaneyRequest']);


});


Route::prefix('partners')->group(function () {
    Route::get('privacy-policy', [PagesController::class, 'getPrivacyPolicy']);
    Route::post('login', [AuthController::class, 'Login']);
    Route::post('register', [AuthController::class, 'Register']);
    Route::post('forget-password', [AuthController::class, 'ForgetPassword']);
    Route::post('reset-password', [AuthController::class, 'ResetPassword']);
    Route::post('change-password', [AuthController::class, 'ChangePassword']);
    Route::post('resend-code', [AuthController::class, 'resendCode']);
    Route::post('social_login', [AuthController::class, 'socialLogin']);
    //VerifyCode
    Route::post('verify-code', [AuthController::class, 'VerifyCode']);
    Route::post('/refresh_device_token', [AuthController::class, 'RefreshDeviceToken']);

    Route::get('app', [AppController::class, 'App']);
});