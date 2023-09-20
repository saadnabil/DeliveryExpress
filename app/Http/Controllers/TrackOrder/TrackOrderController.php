<?php

namespace App\Http\Controllers\TrackOrder;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class TrackOrderController extends Controller
{
    //
    public function trackShipment($shipmentCode){
        $shipment = Shipment::with('cancelReason')->where(['shipment_code' => $shipmentCode ])->firstorfail();
        return view('TrackOrder.index' , compact('shipment'));
    }
}
