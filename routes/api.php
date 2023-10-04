<?php

use App\Http\Controllers\Api\OrderController as ApiOrderController;
use App\Http\Controllers\Api\Partner\AppController;
use App\Http\Controllers\Api\Partner\HomeController;
use App\Http\Controllers\Api\Partner\ProfileController;
use App\Http\Controllers\Api\Partner\AuthController;
use App\Http\Controllers\Api\Partner\NotificationController;
use App\Http\Controllers\Api\Partner\OrderController;
use App\Http\Controllers\Api\Partner\ProductController;
use App\Http\Controllers\Api\Partner\PullRequestController;
use App\Http\Controllers\Api\Partner\SubscriptionController;
use App\Http\Controllers\Api\Partner\WalletController;
use App\Http\Controllers\Api\Users\AuthController as UsersAuthController;
use App\Http\Controllers\Api\Users\HomeController as UsersHomeController;
use App\Http\Controllers\Api\Users\NotificationController as UsersNotificationController;
use App\Http\Controllers\Api\Users\ProfileController as UsersProfileController;
use App\Models\Product;
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

    // Route::get('cancel-order/{id}', [HomeController::class, 'ConfirmCancelOrder']);


    
    // Route::post('request-money', [PullRequestController::class, 'RequestMoney']);
   

    // Route::post('contact-us', [CommunicationController::class, 'ContactUs']);
    Route::apiResource('notifications', NotificationController::class);
    Route::apiResource('products', ProductController::class);
    Route::post('update-product', [ProductController::class, 'update']);

   
    // Route::get('showCategories', [CategoryController::class, 'ShowCategories']);
    // //Show Service by hotel Id
    // Route::get('ShowServices/{id}', [PartnerOperationController::class, 'ShowServices']);
    // //Remove Service
    // Route::get('remove-service/{id}', [PartnerOperationController::class, 'DeleteService']);

    // //Orders 
    Route::get('showOrders', [OrderController::class, 'ShowAllOrders']);
    Route::get('showOrder/{id}', [OrderController::class, 'ShowOrder']);
    Route::post('updateOrder', [OrderController::class, 'UpdateStatus']);
    Route::get('common-quastions', [CommonQuastionsController::class, 'index']);

    //Subscriptions
    Route::get('subscriptions', [SubscriptionController::class, 'index']);
    Route::post('subscriptions', [SubscriptionController::class, 'store']);

    // Route::post('add-balance', [RequestMoneyController::class, 'StoreParnterTransaction']);
    Route::post('request-money', [PullRequestController::class, 'RequestMoney']);

    Route::get('wallet', [WalletController::class, 'index']);



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
    Route::post('settings', [AppController::class, 'Setting']);

    Route::get('app', [AppController::class, 'App']);
});





Route::prefix('users')->middleware(['auth:user'])->group(function () {
    Route::get('profile', [UsersProfileController::class, 'index']);
    Route::post('update-profile', [UsersProfileController::class, 'store']);
    Route::post('update-image', [UsersProfileController::class, 'updateImage']);
    Route::post('delete-account', [UsersProfileController::class, 'destroyAccount']);

    Route::get('home', [UsersHomeController::class, 'Home']);
    Route::get('restaurants', [UsersHomeController::class, 'Restuarants']);
    Route::get('restaurants/{id}/products', [UsersHomeController::class, 'RestuarantProducts']);
    Route::get('products/{id}', [UsersHomeController::class, 'ShowProduct']);

   
    // Route::post('contact-us', [CommunicationController::class, 'ContactUs']);
    Route::apiResource('notifications', UsersNotificationController::class);
    Route::apiResource('products', ProductController::class);

   
    

    // //Orders 
    Route::get('showOrders', [ApiOrderController::class, 'ShowOrders']);
    Route::post('make-order', [ApiOrderController::class, 'store']);
    Route::get('showOrder/{id}', [ApiOrderController::class, 'ShowOrder']);
    Route::post('updateOrder', [ApiOrderController::class, 'UpdateStatus']);
    Route::get('common-quastions', [CommonQuastionsController::class, 'index']);

    //Subscriptions





});


Route::prefix('users')->group(function () {
    Route::get('privacy-policy', [PagesController::class, 'getPrivacyPolicy']);
    Route::post('login', [UsersAuthController::class, 'Login']);
    Route::post('register', [UsersAuthController::class, 'Register']);
    Route::post('forget-password', [UsersAuthController::class, 'ForgetPassword']);
    Route::post('reset-password', [UsersAuthController::class, 'ResetPassword']);
    Route::post('change-password', [UsersAuthController::class, 'ChangePassword']);
    Route::post('resend-code', [UsersAuthController::class, 'resendCode']);
    Route::post('social_login', [UsersAuthController::class, 'socialLogin']);
    //VerifyCode
    Route::post('verify-code', [UsersAuthController::class, 'VerifyCode']);
    Route::post('/refresh_device_token', [UsersAuthController::class, 'RefreshDeviceToken']);
    Route::post('settings', [AppController::class, 'Setting']);

    Route::get('app', [AppController::class, 'App']);
});