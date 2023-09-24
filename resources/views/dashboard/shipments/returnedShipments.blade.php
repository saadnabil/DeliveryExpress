<option></option>
@foreach ($returnedShipments as $returnedShipment)
    <option value="{{ $returnedShipment->id }}">
        {{ $returnedShipment->shipment_code }}</option>
@endforeach
