<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConstantController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ResturantController;
use App\Http\Controllers\Admin\ResturantSubscriptionController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Api\Partner\AppController;
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
    return redirect()->route('dashboard');
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

     Route::get('resturant/changeStatus', [ResturantController::class, 'changeStatus'])->name('resturant.status');
    Route::resource('resturant', ResturantController::class);


    Route::resource('resturant', ResturantController::class);
    Route::post('resturant/status', [ResturantController::class, 'updateStatus'])->name('resturant.status');

    Route::resource('ads', AdsController::class);
    Route::post('ads/status', [AdsController::class, 'updateStatus'])->name('ads.status');

    Route::resource('category', CategoryController::class);
    Route::post('category/status', [CategoryController::class, 'updateStatus'])->name('category.status');

    Route::resource('productType', ProductTypeController::class);
    Route::post('productType/status', [ProductTypeController::class, 'updateStatus'])->name('productType.status');

    Route::resource('subscription', SubscriptionController::class);
    Route::post('subscription/status', [SubscriptionController::class, 'updateStatus'])->name('subscription.status');


    Route::resource('transaction', TransactionController::class);
    Route::post('transaction/status', [TransactionController::class, 'updateStatus'])->name('transaction.status');

    Route::resource('resturantSubscription', ResturantSubscriptionController::class);
    Route::post('resturantSubscription/status', [ResturantSubscriptionController::class, 'updateStatus'])->name('resturantSubscription.status');

    Route::resource('product', ProductController::class);
    Route::post('product/status', [ProductController::class, 'updateStatus'])->name('product.status');

    Route::resource('order', OrderController::class);
    Route::post('order/status', [OrderController::class, 'updateStatus'])->name('order.status');

    Route::get('constant', [ConstantController::class, 'index'])->name('constant.index');
    Route::post('update', [ConstantController::class, 'update'])->name('constants.update');



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
