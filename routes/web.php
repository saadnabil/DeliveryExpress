<?php

use App\Http\Controllers\Dashboard\ActivitiesController;
use App\Http\Controllers\Dashboard\CancelReasonsController;
use App\Http\Controllers\Dashboard\CitiesController;
use App\Http\Controllers\Dashboard\CollectionRequestsController;
use App\Http\Controllers\Dashboard\ComplainsController;
use App\Http\Controllers\Dashboard\CouponsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DeliveriesController;
use App\Http\Controllers\Dashboard\FaqsController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\ShipmentsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\TrackOrder\TrackOrderController;
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


/**
 *
 * Dashboard Routes
 */
Route::auth();
Route::get('/', [DashboardController::class , 'index']);
Route::resource('roles' , RoleController::class);
Route::resource('cities' ,CitiesController::class);
Route::resource('activities' ,ActivitiesController::class);
Route::resource('cancelReasons' ,CancelReasonsController::class);
Route::resource('coupons' ,CouponsController::class);
Route::resource('faqs' ,FaqsController::class);
Route::resource('complains' ,ComplainsController::class)->only('index' , 'destroy');
Route::resource('users' ,UsersController::class);
Route::resource('collectionRequests' ,CollectionRequestsController::class);// فيها شغل حلو
Route::resource('stores' ,StoresController::class);
Route::resource('deliveries' ,DeliveriesController::class);
Route::resource('shipments' ,ShipmentsController::class);
Route::post('getStoreReturnedShipments' ,[ShipmentsController::class , 'getStoreReturnedShipments'])->name('getStoreReturnedShipments');














/**
 *
 * Dashboard Routes
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('trackShipment/{shipmentCode}' , [TrackOrderController::class , 'trackShipment'])->name('trackShipmentView');

