<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\City;
use App\Models\Country;
use App\Models\Shipment;
use App\Services\Dashboard\CouponsService;
use App\Services\Dashboard\DashboardService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $dashboardService;
    function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
        $this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }
    public function index(){
        $shipments = Shipment::get();
        $year = Carbon::now()->format('Y');
        //chart2
            $newShipmentsCount = $shipments->where('status' , 'pending')->count();
            $inStockShipmentsCount = $shipments->where('status' , 'in_stock')->count();
            $RecievedShipmentsCount = $shipments->where('status' , 'recieved_by_delivery')->count();
            $waitingDeliveryCount = $shipments->where('delievry_id','!=' ,null)->where(['status' => 'pending'])->count();
            $outForDeliveryCount = $shipments->where('status' , 'out_for_delivery')->count();
            $deliveredCount = $shipments->where('status' , 'delivered')->count();
            $failedCount = $shipments->where('status' , 'failed')->count();
            $returnedCount = $shipments->where('status' , 'returned')->count();
        //chart2
        //chart1
            $chartTwoData = $this->dashboardService->getChartTwoData($year , $shipments);
        //chart1
        //chart5
            $chartFiveData = $this->dashboardService->getChartFiveData($year);
        //chart5
        //chart3
            $chartThreeData = $this->dashboardService->getChartThreeData($year);
        //chart3
        $cityCount = City::count();
        $countryCount = Country::count();
        $activityCount = Activity::count();
        return view('dashboard.index',compact('newShipmentsCount','inStockShipmentsCount','RecievedShipmentsCount','outForDeliveryCount','deliveredCount','failedCount','returnedCount','waitingDeliveryCount','chartTwoData','chartFiveData','cityCount','countryCount','activityCount','chartThreeData'));
    }
}
