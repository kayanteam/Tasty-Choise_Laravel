<?php

use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ResturantController;
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

    Route::get('Restaurants/edit_services/{id}', [ResturantController::class, 'editServices'])->name('Restaurants.edit-services');
    Route::put('Restaurants/update_services/{id}', [ResturantController::class, 'updateServices'])->name('Restaurants.update-services');

    Route::resource('Restaurants', ResturantController::class);
    Route::post('Restaurants/status', [ResturantController::class, 'updateStatus'])->name('Restaurants.status');

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
