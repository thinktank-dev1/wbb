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
use App\Http\Livewire\ViewLot;

use App\Http\Controllers\RedirectController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\AuctionGroupController;
use App\Http\Controllers\Admin\AuctionController;
use App\Http\Controllers\Admin\OptionsController;

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

Route::get('test-mail', function(){
    $options = [
        'name' => 'Wilson Ndlovu',
        'year' => '2016',
        'make' => 'Ford',
        'model' => 'Fogo',
        'variant' => 'Titanium Power Shift 1.5D'
    ];
    return view('mail.comm1', ['options' => $options]);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('FAQs', [PagesController::class, 'about'])->name('FAQs');
Route::get('contact-us', [PagesController::class, 'contact'])->name('contact-us');
Route::get('register/step2', [RegisterController::class, 'showStep2']);
Route::post('register/step2', [RegisterController::class, 'saveStep2']);
Route::get('register/step3', [RegisterController::class, 'showStep3']);
Route::post('register/step3', [RegisterController::class, 'saveStep3']);
Route::post('assistance', [PagesController::class, 'assistance'])->name('assistance');
Route::post('contact', [PagesController::class, 'contactUs'])->name('contact');

Route::get('getModels2/{make}', [VehicleController::class, 'getModels2']);

Route::get('redirects', [RedirectController::class, 'redirects']);


Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('profile', [ProfileController::class, 'updateProfile']);
    Route::get('payments', [PaymentsController::class, 'index']);
    Route::post('payments', [PaymentsController::class, 'updatePayments']);
    Route::get('my-lots', [LotsController::class, 'user_lots']);
    Route::get('catalogue', [CatalogueController::class, 'catalogue'])->name('catalogue');
    Route::get('lot/{id}', [LotsController::class, 'view_lot'])->name('lot');
    Route::get('auction', Auction::class)->name('auction');
    Route::get('auction/{favs}', Auction::class)->name('favourites');
    Route::get('view-lot/{id}', ViewLot::class)->name('view-lot');
    Route::post('new-password', [ProfileController::class, 'passwordReset'])->name('new.password');
    
    Route::get('getModels/{year}/{make}', [VehicleController::class, 'getModels']);
    Route::get('getVariants/{year}/{make}/{model}', [VehicleController::class, 'getVariants']);
    Route::get('getCarInfo/{year}/{make}/{model}/{variant}', [VehicleController::class, 'getCarInfo']);
    Route::get('getCarByMMCode/{mmcode}', [VehicleController::class, 'getCarByMMCode']);
    
    Route::get('add-to-favourites/{id}', [CatalogueController::class, 'add_to_favourites']);
    Route::get('remove-favourite/{id}', [CatalogueController::class, 'remove_favourite']);
    

    Route::get('filter-catalogue', [CatalogueController::class, 'filterCatalogue'])->name('filter-catalogue');   
    Route::get('search-catalogue', [CatalogueController::class, 'searchCatalogue'])->name('search-catalogue');
    Route::get('sort-catalogue-date', [CatalogueController::class, 'sortCatalogueByDate']);
    Route::get('sort-catalogue', [CatalogueController::class, 'sortCatalogue']);
    Route::get('paginate-catalogue', [CatalogueController::class, 'paginateCatalogue']);
    
    Route::group(['prefix' => 'admin'], function(){
        Route::get('dashboard', [AdminDashboardController::class, 'index']);
        Route::resource('users', UserController::class);
        Route::resource('vehicles', VehicleController::class);
        Route::get('delete-vehicle-image/{id}', [VehicleController::class, 'deleteVehicleImage']);
        Route::get('delete-report/{id}', [VehicleController::class, 'deleteReport']);
        Route::get('vehicle/delete/{id}',[VehicleController::class, 'deleteVehicle']);
        Route::resource('auction-groups', AuctionGroupController::class);
        
        Route::get('add-lots-to-auction-group/{id}', [AuctionGroupController::class, 'showAddLots']);
        Route::post('save-lots', [AuctionGroupController::class, 'saveLots']);
        Route::get('remove-lot/{id}', [AuctionGroupController::class, 'removeLot']);
        
        Route::get('auction-results', [AuctionController::class, 'index']);
        Route::get('vehicles/status/{status}', [VehicleController::class, 'listByStatus']);
        Route::get('reset-car/{id}', [VehicleController::class, 'resetCar']);
        Route::post('update-user-status/{id}', [UserController::class, 'updateUserStatus']);
        
        Route::get('options/{type}', [OptionsController::class, 'index']);
        Route::get('options/{type}/{id}', [OptionsController::class, 'index']);
        Route::post('saveOption', [OptionsController::class, 'saveOption']);
        Route::get('delete-option/{id}', [OptionsController::class, 'deleteOption']);
        
        Route::get('remove-video/{id}', [VehicleController::class, 'deleteVideo']);
        Route::get('search', [VehicleController::class, 'search']);
    });
});

require __DIR__.'/auth.php';
