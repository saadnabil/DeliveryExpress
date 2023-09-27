<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\Delivery\AuthController as DeliveryAuthController;
use App\Http\Controllers\Api\Delivery\ComplainController;
use App\Http\Controllers\Api\Delivery\OtpController as DeliveryOtpController;
use App\Http\Controllers\Api\Delivery\ProfileController as DeliveryProfileController;
use App\Http\Controllers\Api\Delivery\ShipmentController as DeliveryShipmentController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\Store\AuthController;
use App\Http\Controllers\Api\Store\CollectionRequestController;
use App\Http\Controllers\Api\Store\CostRateController;
use App\Http\Controllers\Api\Store\CouponController;
use App\Http\Controllers\Api\Store\OtpController;
use App\Http\Controllers\Api\Store\ProfileController;
use App\Http\Controllers\Api\Store\ShipmentController;
use App\Http\Controllers\Api\Store\SupportController;
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
Route::group(['prefix' => 'v1'],function(){
    Route::get('setting' , [SettingController::class , 'index']);
    Route::get('cities',[CityController::class, 'index']);
    Route::get('countries',[CountryController::class, 'index']);
    Route::get('/terms', [SettingController::class, 'terms']);
    Route::get('/privacy', [SettingController::class, 'privacy']);
    Route::group(['prefix' => 'store'],function(){
        Route::post('register' , [AuthController::class , 'register']);
        Route::post('login' , [AuthController::class , 'login']);
        Route::post('sendNewOtp', [OtpController::class , 'sendNewOtp']);
        Route::post('verifyOtp', [OtpController::class , 'verifyOtp']);
        Route::post('changePassword', [AuthController::class , 'changePassword']);
        Route::group(['middleware' => 'auth:sanctum'],function(){
            Route::post('logout', [AuthController::class , 'logout']);
            Route::group(['prefix' => 'coupons'],function(){
                Route::get('/',[CouponController::class, 'coupons']);
                Route::post('/apply', [CouponController::class, 'apply']);
            });
            Route::group(['prefix' => 'shipment'] , function(){
                Route::get('/', [ShipmentController::class, 'index']);
                Route::post('/storeStepOne', [ShipmentController::class, 'storeStepOne']);
                Route::post('/storeStepTwo', [ShipmentController::class, 'storeStepTwo']);
                Route::post('/storeStepThree', [ShipmentController::class, 'storeStepThree']);
                Route::get('/returnedCodes', [ShipmentController::class, 'returnedCodes']);
                Route::post('/search',  [ShipmentController::class, 'search']);
            });
            Route::group(['prefix' => 'collectionRequest'] , function(){
                Route::post('store', [CollectionRequestController::class, 'store']);
                Route::post('shipmentsCodes', [CollectionRequestController::class, 'shipmentsCodes']);
            });
            Route::group(['prefix' => 'technicalSupport'] , function(){
                Route::get('/', [SupportController::class, 'index']);
            });
            Route::group(['prefix' => 'costRate'] , function(){
                Route::post('/calculate', [CostRateController::class, 'calculateCostRate']);
            });
            Route::group(['prefix' => 'profile'] , function(){
                Route::get('/show', [ProfileController::class, 'show']);
                Route::get('/deleteAccount', [ProfileController::class, 'deleteAccount']);
                Route::post('/update/personalData', [ProfileController::class, 'updatePersonal']);
                Route::post('/update/storeData', [ProfileController::class, 'updateStore']);
                Route::post('/update/password', [ProfileController::class, 'updatePassword']);
            });
            Route::group(['prefix' => 'complain'] , function(){
                Route::post('/store', [ComplainController::class, 'store']);
            });
        });
    });
    Route::group(['prefix' => 'delivery'],function(){
        Route::post('registerStepOne' , [DeliveryAuthController::class , 'registerStepOne']);
        Route::group(['middleware' => 'auth:sanctum'],function(){
            Route::post('registerStepTwo' , [DeliveryAuthController::class , 'registerStepTwo']);
            Route::post('registerStepThree' , [DeliveryAuthController::class , 'registerStepThree']);
            Route::post('logout', [DeliveryAuthController::class , 'logout']);
            Route::group(['prefix'=>'shipment'],function(){
                Route::get('/', [DeliveryShipmentController::class , 'index']);
                Route::get('/invoice', [DeliveryShipmentController::class , 'shipmentInvoice']);
                Route::post('recieve', [DeliveryShipmentController::class , 'recieve']);
                Route::post('startDeliverShipment', [DeliveryShipmentController::class , 'startDeliverShipment']);
                Route::post('endDeliverShipment', [DeliveryShipmentController::class , 'endDeliverShipment']);
                Route::post('failDeliverShipment', [DeliveryShipmentController::class , 'failDeliverShipment']);
            });
            Route::group(['prefix' => 'profile'] , function(){
                Route::get('/deleteAccount', [DeliveryProfileController::class, 'deleteAccount']);
                Route::get('/show', [DeliveryProfileController::class, 'show']);
                Route::post('/update/personalData', [DeliveryProfileController::class, 'updatePersonal']);
                Route::post('/update/password', [DeliveryProfileController::class, 'updatePassword']);
            });
            Route::group(['prefix' => 'complain'] , function(){
                Route::post('/store', [ComplainController::class, 'store']);
            });
        });
        Route::post('login' , [DeliveryAuthController::class , 'login']);
        Route::post('sendNewOtp', [DeliveryOtpController::class , 'sendNewOtp']);
        Route::post('verifyOtp', [DeliveryOtpController::class , 'verifyOtp']);
        Route::post('changePassword', [DeliveryAuthController::class , 'changePassword']);
    });
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
