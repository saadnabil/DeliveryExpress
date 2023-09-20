@extends('dashboard.master')
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-6">
            <h6 class="mb-0 text-uppercase">{{ __('translation.Collection Request Details') }} </h6>
        </div>
    </div>
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            {{ __('translation.Store Details') }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            @if ($collectionRequest->store->image)
                                <div class="text-center " style="margin-bottom:40px;">
                                    <img style="width:100px;"
                                        src="{{ url('storage/' . $collectionRequest->store->image) }}" />
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Store Name') }}: </label>
                                        {{ $collectionRequest->store->store_name }}
                                    </div>
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Name') }}: </label> {{ $collectionRequest->store->name }}
                                    </div>
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Email') }}: </label>
                                        {{ $collectionRequest->store->email }}
                                    </div>
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Phone') }}: </label>
                                        {{ $collectionRequest->store->phone }}
                                    </div>
                                    @if ($collectionRequest->store->other_phone)
                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Other Phone') }}: </label>
                                            {{ $collectionRequest->store->other_phone }}
                                        </div>
                                    @endif

                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Website') }}: </label>
                                        {{ $collectionRequest->store->website }}
                                    </div>

                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Activity') }}: </label>
                                        {{ $collectionRequest->store->activity->title }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Address') }}: </label>
                                        {{ $collectionRequest->store->address }}
                                    </div>
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.City') }}: </label>
                                        {{ $collectionRequest->store->city->name }}
                                    </div>
                                    <div>
                                        <label style="font-weight:bold">{{ __('translation.Country') }}: </label>
                                        {{ $collectionRequest->store->country->name }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('translation.Shipments Details') }}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($collectionRequest->collectionRequestShipments as $key => $collectionRequestShipment)
                                {!!$collectionRequestShipment->shipment->qr_code_image!!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Code') }}: </label>
                                            {{ $collectionRequestShipment->shipment->shipment_code }}
                                        </div>
                                        <div>
                                             <label style="font-weight:bold">{{ __('translation.Status') }}: </label>
                                            {{ $collectionRequestShipment->shipment->status }}
                                        </div>
                                        <div>
                                             <label style="font-weight:bold">{{ __('translation.Type') }}: </label>
                                            {{ $collectionRequestShipment->shipment->shipmentType->type }}
                                        </div>
                                        <div>
                                             <label style="font-weight:bold">{{ __('translation.Quantity') }}: </label>
                                            {{ $collectionRequestShipment->shipment->quantity }}
                                        </div>
                                        @if($collectionRequestShipment->shipment->type_id !=3)
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Weight') }}: </label>
                                                {{ $collectionRequestShipment->shipment->weight }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Length') }}: </label>
                                                {{ $collectionRequestShipment->shipment->length }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Height') }}: </label>
                                                {{ $collectionRequestShipment->shipment->height }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Breakable') }}: </label>
                                                {{ $collectionRequestShipment->shipment->breakable }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Measurement Is Allowed') }}: </label>
                                                {{ $collectionRequestShipment->shipment->measurement_is_allowed }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Shipment Packaging') }}: </label>
                                                {{ $collectionRequestShipment->shipment->shipment_packaging }}
                                            </div>
                                            <div>
                                                <label style="font-weight:bold">{{ __('translation.Preview Allowed') }}: </label>
                                                {{ $collectionRequestShipment->shipment->preview_allowed }}
                                            </div>
                                             <div>
                                                <label style="font-weight:bold;display:block">{{ __('translation.Description') }}: </label>
                                                {{ $collectionRequestShipment->shipment->description }}
                                            </div>
                                        @else
                                             <div>
                                                <label style="font-weight:bold">{{ __('translation.Money') }}: </label>
                                                {{ $collectionRequestShipment->shipment->money }}
                                            </div>
                                        @endif
                                         <div>
                                             <label style="font-weight:bold;display:block">{{ __('translation.Notes') }}: </label>
                                            {{ $collectionRequestShipment->shipment->notes }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Shipment Price') }}: </label>
                                            {{ $collectionRequestShipment->shipment->shipment_price }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Delivery Fee') }}: </label>
                                            {{ $collectionRequestShipment->shipment->delivery_fee }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Weight Fee') }}: </label>
                                            {{ $collectionRequestShipment->shipment->weight_fee }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Discount Fee') }}: </label>
                                            {{ $collectionRequestShipment->shipment->discount_fee }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Collect Fee') }}: </label>
                                            {{ $collectionRequestShipment->shipment->collect_fee }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Total Fee') }}: </label>
                                            {{ $collectionRequestShipment->shipment->total_fee }}
                                        </div>

                                        <div>
                                            <label style="font-weight:bold">{{ __('translation.Payment Type') }}: </label>
                                            {{ $collectionRequestShipment->shipment->payment_type == 2 ? __('translation.Visa On Delivery') : __('translation.Cash') }}
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:15px;">
                                        @foreach ($collectionRequestShipment->shipment->images as $image )
                                            <img src="{{ url('storage/'. $image->image ) }}" class="ml-3 rounded-circle p-1 border" width="90" height="90" alt="...">
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('style')
<style>
svg{
    width:120px !important;
    height:120px !important;
    margin:20px auto;
}
</style>
@endpush
