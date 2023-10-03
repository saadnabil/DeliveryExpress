<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\City;
use App\Models\CollectionRequest;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Shipment;
use App\Models\Store;
use Carbon\Carbon;

class DashboardService{

    public function getChartTwoData($year , $shipments){
        $newData = [];
        $multiExhchangeData = [];
        $moneyData = [];


        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        foreach($months as $month){
            $newData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return $shipment->created_at->month == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 1;
            })->count();

            $multiExhchangeData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return  $shipment->created_at->month == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 2;
            })->count();

            $moneyData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return  $shipment->created_at->month == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 3;
            })->count();
        }
        return [
            'newData' => $newData,
            'multiExhchangeData' => $multiExhchangeData,
            'moneyData' => $moneyData
        ];
    }

    public function getChartFiveData($year){
        $deliveryData = [];
        $storeData = [];

        $deliveries = Delivery::get();
        $stores = Store::get();

        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        foreach($months as $month){
            $deliveryData[] = $deliveries->filter(function ($delivery) use ($year,$month) {
                return $delivery->created_at->month == $month
                    && $delivery->created_at->year == $year
                    &&$delivery->verified == 1;
            })->count();

            $storeData[] = $stores->filter(function ($store) use ($year,$month) {
                return $store->created_at->month == $month
                    && $store->created_at->year == $year
                    &&$store->verified == 1;
            })->count();
        }
        return   [
            'deliveryData' => $deliveryData,
            'storeData' => $storeData,
        ];
    }

    public function getChartThreeData($year){
        $CollectionRequestData = [];
        $CollectionBakeupRequestData = [];

        $collectionRequests = CollectionRequest::where('type',1)->get();
        $collectionBakeupRequests = CollectionRequest::where('type',2)->get();

        $months = [1,2,3,4,5,6,7,8,9,10,11,12];
        foreach($months as $month){
            $CollectionRequestData[] = $collectionRequests->filter(function ($collectionRequest) use ($year,$month) {
                return $collectionRequest->created_at->month == $month
                    && $collectionRequest->created_at->year == $year;
            })->count();

            $CollectionBakeupRequestData[] = $collectionBakeupRequests->filter(function ($collectionBakeupRequest) use ($year,$month) {
                return $collectionBakeupRequest->created_at->month == $month
                    && $collectionBakeupRequest->created_at->year == $year;
            })->count();
        }
        return[
            'CollectionRequestData' => $CollectionRequestData,
            'CollectionBakeupRequestData' => $CollectionBakeupRequestData,
        ];
    }

}
