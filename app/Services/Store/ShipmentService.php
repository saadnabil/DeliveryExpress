<?php
namespace App\Services\Store;
use App\Helpers\FileHelper;
use App\Http\Resources\Api\Store\ShipmentResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Shipment;
use App\Models\ShipmentImage;
use Illuminate\Http\Request;

class ShipmentService{

    use ApiResponseTrait;

    public function index(){

        $statusArr = ['all' , 'delivered' ,'failed','returned','out_for_delivery','in_stock','recieved_by_delivery' ,'pending' ];

        $status = request('status');

        if(!in_array($status , $statusArr )){
            return $this->sendResponse([
                'error' => 'Status must be in: all , delivered ,failed,returned,out_for_delivery,in_stock,recieved_by_delivery,pending',
            ] , 'fail' , 404);
        }

        if($status != 'all'){
            $rows = Shipment::with(['images','delivery','shipmentType','shipmentReplaced'])
                       ->where('status' ,$status )
                       ->where('store_id' , auth()->user()->id )
                       ->latest()
                       ->simplePaginate();
        }else{
            $rows = Shipment::with(['images','delivery','shipmentType','shipmentReplaced'])
                       ->where('status' , '!=' , 'incomplete')
                       ->where('store_id' , auth()->user()->id )
                       ->latest()
                       ->simplePaginate();
        }
        return $this->sendResponse(resource_collection(ShipmentResource::collection($rows)));

    }

    public function storeStepOne(array $data){
        $data['store_id'] = auth()->user()->id;
        $data['shipment_code'] = generate_code_unique();
        $data['qr_code_image'] = generateQrCode($data['shipment_code']);
        $images = $data['images'] ?? null;
        unset($data['images']);
        $row = Shipment::create($data);
        if($images){
            foreach($images as $image){
                $imagename = FileHelper::upload_file('uploads',  $image);
                ShipmentImage::create([
                    'image' =>  $imagename,
                    'shipment_id' => $row->id,
                ]);
            }
        }
        return $this->sendResponse([
            'id' => $row->id,
            'shipmentCode' => $data['shipment_code'],
        ]);
    }

    public function storeStepTwo(array $data){
        $shipment = Shipment::find($data['shipment_id']);
        if(!$shipment){
            return $this->sendResponse(['error'=> __('translation.Shipment not found')] , 'fail' , 404);
        }
        unset($data['shipment_id']);
        $shipment->update($data);
        $shipment = $shipment->load('city');
        $shipment->calculateShipmentInvoice();
        $shipmentInvoice = $shipment->printShipmentInvoice();
        return $this->sendResponse($shipmentInvoice);
    }

    public function storeStepThree(array $data){
        $shipment = Shipment::with('coupon')->find($data['shipment_id']);
        if(!$shipment){
            return $this->sendResponse(['error'=>__('translation.Shipment not found')] , 'fail' , 404);
        }
        if($shipment->coupon){
            if($shipment->coupon->is_used == 1){
                return $this->sendResponse(['error'=> __('translation.Coupon is expired')] , 'fail' , 400);
            }
            $shipment->coupon->update([
                'is_used' => 1,
            ]);
        }
        unset($data['shipment_id']);
        $data['status'] = 'pending';
        $shipment->update($data);
        $response = [
            'shipmentCode' => $shipment->shipment_code,
            'qrImage' => $shipment->qr_code_image
        ];
        return $this->sendResponse($response);
    }
    public function returnedCodes(){
        $rows = Shipment::whereIn('status', ['returned' , 'fail'])
            ->where([
                'store_id' => auth()->user()->id
            ])->get();
         return $this->sendResponse($rows);
    }
    public function search(array $data){
        $query =  $data['query'];
        $shipments = Shipment::with(['images','delivery','shipmentType','shipmentReplaced'])->where([
            'store_id' => auth()->user()->id,
        ]);
        if ($data['status'] !== 'all') {
            $shipments = $shipments->where('status', $data['status']);
        }
        $filteredShipments = $shipments->where('shipment_code', 'like', "%{$query}%")
            ->orWhere('quantity', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('money', 'like', "%{$query}%")
            ->orWhere('weight', 'like', "%{$query}%")
            ->orWhere('length', 'like', "%{$query}%")
            ->orWhere('height', 'like', "%{$query}%")
            ->orWhere('width', 'like', "%{$query}%")
            ->orWhere('notes', 'like', "%{$query}%")
            ->orWhere('shipment_replace_reason', 'like', "%{$query}%")
            ->orWhere('client_name', 'like', "%{$query}%")
            ->orWhere('client_phone', 'like', "%{$query}%")
            ->orWhere('client_other_phone', 'like', "%{$query}%")
            ->orWhere('shipment_price', 'like', "%{$query}%")
            ->orWhere('delivery_fee', 'like', "%{$query}%")
            ->orWhere('weight_fee', 'like', "%{$query}%")
            ->orWhere('discount_fee', 'like', "%{$query}%")
            ->orWhere('collect_fee', 'like', "%{$query}%")
            ->orWhere('total_price', 'like', "%{$query}%")
            ->orWhere('cancel_reason_note', 'like', "%{$query}%")
            ->orWhere('delivered_date', 'like', "%{$query}%")
            ->orWhere('tax_fee', 'like', "%{$query}%")
            ->orWhereHas('city', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('country', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })->simplepaginate();

        // Return the filtered shipments
        return $this->sendResponse(resource_collection(ShipmentResource::collection($filteredShipments)));
    }
}
