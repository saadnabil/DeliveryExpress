<?php
namespace App\Services\Dashboard;

use App\Models\Activity;
use App\Models\CancelReason;
use App\Models\City;
use App\Models\CollectionRequest;
use App\Models\Complain;
use App\Models\Coupon;
use App\Models\Store;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class CollectionRequestService{

    public function index(){
        $rows = CollectionRequest::with('store')
                                 ->where('type' , 1)
                                 ->latest()
                                 ->get();
        return view('dashboard.collectionRequest.index',compact('rows'));
    }

    public function create(){
        $stores = Store::get();
        return view('dashboard.collectionRequest.create',compact('stores'));
    }

    public function store(array $data){
        $data['type'] = 1;
        CollectionRequest::create($data);
        return redirect()->route('collectionRequests.index')->with(['success' => __('translation.Added Successfully')]);
    }

    public function edit($collectionRequest){
        $stores = Store::get();
        return view('dashboard.collectionRequest.edit' , compact('collectionRequest','stores'));
    }

    public function update(array $data , $collectionRequest){

        $collectionRequest->update($data);
        return redirect()->route('collectionRequests.index')->with(['success' => __('translation.Updated Successfully')]);
    }

    public function show($collectionRequest){
        $collectionRequest->load('store.city','store.country','store.activity','CollectionRequestShipments.shipment.shipmentType','CollectionRequestShipments.shipment.images');
        return view('dashboard.collectionRequest.show',compact('collectionRequest'));
    }

    public function destroy($collectionRequest){
        $collectionRequest->delete();
        return redirect()->route('collectionRequests.index')->with(['success' => __('translation.Deleted Successfully')]);
    }

    public function confirmRecieveShipments($collectionRequest){
        $collectionRequest = $collectionRequest->load('CollectionRequestShipments.shipment');
        foreach($collectionRequest->CollectionRequestShipments as $CollectionRequestShipment){
            $CollectionRequestShipment->shipment->update(['status' => 'in_stock']);
        }
        $collectionRequest->update([
            'status' => 'recieved_by_stock',
        ]);
        return redirect()->route('collectionRequests.index')->with(['success' => __('translation.Recieved Confirmed Successfully')]);
    }

    public function confirmReturnShipments($collectionRequest){
        $collectionRequest = $collectionRequest->load('CollectionRequestShipments.shipment');
        foreach($collectionRequest->CollectionRequestShipments as $CollectionRequestShipment){
            $CollectionRequestShipment->shipment->update(['status' => 'returned_to_store']);
        }
        $collectionRequest->update([
            'status' => 'returned_to_store',
        ]);
        return redirect()->route('collectionRequests.index')->with(['success' => __('translation.Recieved Confirmed Successfully')]);
    }

}
