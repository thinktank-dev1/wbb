<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\LotsController;

use App\Http\Livewire\Auction;

use App\Http\Controllers\RedirectController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\AuctionGroupController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about-us', [PagesController::class, 'about'])->name('about-us');
Route::get('contact-us', [PagesController::class, 'contact'])->name('contact-us');
Route::get('register/step2', [RegisterController::class, 'showStep2']);
Route::post('register/step2', [RegisterController::class, 'saveStep2']);
Route::get('register/step3', [RegisterController::class, 'showStep3']);
Route::post('register/step3', [RegisterController::class, 'saveStep3']);
Route::post('assistance', [PagesController::class, 'assistance'])->name('assistance');
Route::post('contact', [PagesController::class, 'contactUs'])->name('contact');

Route::get('redirects', [RedirectController::class, 'redirects']);

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('profile', [ProfileController::class, 'updateProfile']);
    Route::get('payments', [PaymentsController::class, 'index']);
    Route::post('payments', [PaymentsController::class, 'updatePayments']);
    Route::get('my-lots', [LotsController::class, 'user_lots']);
    Route::get('catalogue', [CatalogueController::class, 'catalogue'])->name('catalogue');
    Route::get('favourites', [CatalogueController::class, 'favourites'])->name('favourites');
    Route::get('lot', [LotsController::class, 'view_lot'])->name('lot');
    Route::get('auction', Auction::class)->name('auction');
    
    Route::get('getModels/{year}/{make}', [VehicleController::class, 'getModels']);
    Route::get('getVariants/{year}/{make}/{model}', [VehicleController::class, 'getVariants']);
    Route::get('getCarInfo/{year}/{make}/{model}/{variant}', [VehicleController::class, 'getCarInfo']);
    
    Route::group(['prefix' => 'admin'], function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index']);
        Route::resource('users', UserController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::get('delete-vehicle-image/{id}', [VehicleController::class, 'deleteVehicleImage']);
        Route::get('delete-report/{id}', [VehicleController::class, 'deleteReport']);
        Route::resource('auction-groups', AuctionGroupController::class);
    });
});

require __DIR__.'/auth.php';
