<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ResturantController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth:admin'])->group(function () {

    Route::resource('admins', AdminsController::class);

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth:admin']);
    Route::resource('messages', MessageController::class);

    Route::resource('profile', AdminProfileController::class);

    Route::get('users/changeStatus', [UsersController::class, 'updateStatus'])->name('user.status');
    Route::resource('users', UsersController::class);

     Route::get('users/changeStatus', [UsersController::class, 'updateStatus'])->name('user.status');
    Route::resource('users', UsersController::class);

     Route::get('Restaurants/changeStatus', [ResturantController::class, 'changeStatus'])->name('resturant.status');
    Route::resource('Restaurants', ResturantController::class);


    Route::resource('Restaurants', ResturantController::class);
    Route::post('Restaurants/status', [ResturantController::class, 'updateStatus'])->name('Restaurants.status');

    Route::resource('ads', AdsController::class);
    Route::post('ads/status', [AdsController::class, 'updateStatus'])->name('ads.status');

    Route::resource('category', CategoryController::class);
    Route::post('category/status', [CategoryController::class, 'updateStatus'])->name('category.status');

    Route::resource('productType', ProductTypeController::class);
    Route::post('productType/status', [ProductTypeController::class, 'updateStatus'])->name('productType.status');

    Route::resource('subscription', SubscriptionController::class);
    Route::post('subscription/status', [SubscriptionController::class, 'updateStatus'])->name('subscription.status');



});


Route::get('storage/{file}', function ($file) {
    $path = storage_path('app/public/' . $file);
    if (!is_file($path)) {
        abort(404);
    }
    return response()->file($path);
})->where('file', '.+');



Route::prefix('admin')->group(function () {
    require __DIR__ . '/auth.php';
});
