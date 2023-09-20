<?php

use Illuminate\Pagination\LengthAwarePaginator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function resource_collection($resource): array
{
    return json_decode($resource->response()->getContent(), true) ?? [];
}

function generate_otp_function()
{
    return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
}

function generate_code_unique() {
    // Generate a random prefix of length 2 using letters
    $prefix = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);

    // Get the current date in the format "YmdHis" (YearMonthDayHourMinuteSecond)
    $currentDate = date('YmdHis');

    // Generate a random number between 1000 and 9999
    $randomNumber = mt_rand(1000, 9999);

    // Combine the prefix, date, and random number to create the code
    $shipmentCode = $prefix . $currentDate . $randomNumber;

    return $shipmentCode;
}

function shipment_price_reciept($shipment){
    $total = $shipment->shipment_price + $shipment->delivery_fee + $shipment->weight_fee + $shipment->collect_fee;
    if($shipment->shipment_price > 1000){ //check city and order is more than 1000 denar liby;
        $total = $total + ($shipment->shipment_price * 1 / 100);
    }
    if($shipment -> coupon_id){
        $total =   $total - ($total * $shipment->coupon->discount / 100);
    }
    $shipment->update(['total_price' => $total]);
    $response = [
        'shipmentId' => $shipment->id,
        'shipmentCode' => $shipment->shipment_code,
        'shipmentPrice' => $shipment->shipment_price,
        'deliveryFee' => $shipment->delivery_fee,
        'weightFee' => $shipment->weight_fee,
        'collectFee' => $shipment->collect_fee,
        'total' => $shipment->total_price,
    ];
    if($shipment->shipment_price > 1000){
        $response['tax_fee'] = '1 %';
    }
    if($shipment->coupon_id){
        $response['discount'] = $shipment->coupon->discount.'%';
    }
    return $response;
}

function generateQrCode($shipmentCode){
    return QrCode::size(300)->generate($shipmentCode);

}


