<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('getModels/{year}/{make}', [VehicleController::class, 'getModels']);
    Route::get('getVariants/{year}/{make}/{model}', [VehicleController::class, 'getVariants']);
    Route::get('getCarInfo/{year}/{make}/{model}/{variant}', [VehicleController::class, 'getCarInfo']);
});


Route::group(['prefix' => 'admin'], function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::get('delete-vehicle-image/{id}', [VehicleController::class, 'deleteVehicleImage']);
    Route::get('delete-report/{id}', [VehicleController::class, 'deleteReport']);
});

require __DIR__.'/auth.php';
