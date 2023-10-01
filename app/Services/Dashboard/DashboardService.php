<?php
namespace App\Services\Dashboard;

use Carbon\Carbon;

class DashboardService{

    public function getChartTwoData($year , $shipments){
        $newData = [];
        $multiExhchangeData = [];
        $moneyData = [];

        $months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        foreach($months as $month){
            $newData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return Carbon::parse( $shipment->created_at->month)->format('F') == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 1;
            })->dd();

            $multiExhchangeData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return  Carbon::parse( $shipment->created_at->month)->format('F') == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 2;
            })->count();

            $moneyData[] = $shipments->filter(function ($shipment) use ($year,$month) {
                return  Carbon::parse( $shipment->created_at->month)->format('F') == $month
                    && $shipment->created_at->year == $year
                    &&$shipment->status != 'incomplete'
                    && $shipment->shipment_type_id == 3;
            })->count();
        }
        $data =  [
            'newData' => $newData,
            'multiExhchangeData' => $multiExhchangeData,
            'moneyData' => $moneyData
        ];
        dd ($data);
    }

}
