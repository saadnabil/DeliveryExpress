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
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\ShipmentsController;
use App\Http\Controllers\Dashboard\StoresController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\TrackOrder\TrackOrderController;
use App\Models\Shipment;
use Illuminate\Support\Facades\Route;
// use Twilio\Rest\Client;



use Infobip\Api\SmsApi;
use Infobip\Configuration;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
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

Route::get('/',function(){
    return redirect()->route('login');
});
Route::auth();
Route::group(['middleware' => 'auth'],function(){
    Route::get('admin' , [DashboardController::class,'index'])->name('adminDashboard');
    Route::resource('roles' , RoleController::class);
    Route::resource('cities' ,CitiesController::class);
    Route::resource('activities' ,ActivitiesController::class);
    Route::resource('cancelReasons' ,CancelReasonsController::class);
    Route::resource('coupons' ,CouponsController::class);
    Route::resource('faqs' ,FaqsController::class);
    Route::resource('complains' ,ComplainsController::class)->only('index','destroy');
    Route::resource('users' ,UsersController::class);
    Route::resource('collectionRequests' ,CollectionRequestsController::class);// فيها شغل حلو
    Route::post('collectionRequests/confirmRecieveShipments/{collectionRequest}', [CollectionRequestsController::class , 'confirmRecieveShipments'])->name('collectionRequests.confirmRecieveShipments');
    Route::post('collectionRequests/confirmReturnShipments/{collectionRequest}', [CollectionRequestsController::class , 'confirmReturnShipments'])->name('collectionRequests.confirmReturnShipments');
    Route::resource('stores' ,StoresController::class);
    Route::resource('deliveries' ,DeliveriesController::class);
    Route::resource('shipments' ,ShipmentsController::class);
    Route::post('shipments/assignDeliveryInStockShipment/{shipment}' ,[ShipmentsController::class,'assignDeliveryInStockShipment'])->name('shipments.assignDeliveryInStockShipment');
    Route::post('getStoreReturnedShipments' ,[ShipmentsController::class , 'getStoreReturnedShipments'])->name('getStoreReturnedShipments');
    Route::resource('settings', SettingsController::class)->only('index','store');
});

// Route::get('testSms', function(){
//     $receiverNumber = "+218928908901";
//         $message = __('translation.Your Verification PIN Is:'). 1234;
//         try {
//             $account_sid = getenv("TWILIO_SID");
//             $auth_token = getenv("TWILIO_TOKEN");
//             $twilio_number = getenv("TWILIO_FROM");
//             $client =  new Twilio\Rest\Client($account_sid, $auth_token);
//             $client->messages->create($receiverNumber, [
//                 'from' => $twilio_number,
//                 'body' => $message]);
//             dd('SMS Sent Successfully.');
//         } catch (Exception $e) {
//             dd("Error: ". $e->getMessage());
//         }
// });

Route::get('testSms', function(){
    $client = new Client([
        'base_uri' => "https://9llky4.api.infobip.com/",
        'headers' => [
            'Authorization' => "App 845664a868b0e9d3903679e30c776750-ab9ed3bf-c62b-43f8-bf91-8608ef10f1c6",
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]
    ]);
    $response = $client->request(
        'POST',
        'sms/2/text/advanced',
        [
            RequestOptions::JSON => [
                'messages' => [
                    [
                        'from' => 'InfoSMS',
                        'destinations' => [
                            ['to' => "201143707240"]
                        ],
                        'text' => 'Your verification PIN is: 9318',
                    ]ا
                ]
            ],
        ]
    );
    echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
    echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);

});
