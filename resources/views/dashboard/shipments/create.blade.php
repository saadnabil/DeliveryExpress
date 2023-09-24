@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Shipment') }}</h5>
            <hr />

            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            <div class="row">
                <div class="col-lg-8">
                    @include('dashboard.shipments.createForms.depositShipmentForm')
                    @include('dashboard.shipments.createForms.newShipmentForm')
                    @include('dashboard.shipments.createForms.replacementShipmentForm')
                </div>
                <div class="col-lg-4">
                    <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="productTitleEnglish"
                                        class="form-label">{{ __('translation.Shipment Type') }}</label>
                                    <div class="col-md-12">
                                        @foreach ($shipmentTypes as $key => $shipmentType)

                                                <div class="form-check">
                                                    <input class="shipmentType" {{ old('shipment_type_id', 1 ) == $shipmentType->id  ? 'checked' : '' }}
                                                        value="{{ $shipmentType->id }}"  name="shipment_type_id"
                                                        class="form-check-input" type="radio"
                                                        id="{{ $shipmentType->id }}">
                                                    <label class="form-check-label"
                                                        for="{{ $shipmentType->id }}">{{ $shipmentType->type }}</label>
                                                </div>

                                        @endforeach
                                        <div class="d-grid">
                                            @php
                                                $shipmentTypes = [
                                                    '1' => 'newShipmentForm' ,
                                                    '2' => 'replacedShipmentForm' ,
                                                    '3' => 'depositShipmentForm'
                                                ]
                                            @endphp
                                            <button form="{{ old('shipment_type_id') ? $shipmentTypes[old('shipment_type_id')] : 'newShipmentForm'  }}" type="submit"
                                                class="btn btn-success submitform">{{ __('translation.Save') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>
    </div>
@endsection

@push('script')
    <script>

        $('.form-switch input[type=checkbox]').click(function() {
            var parentRow = $(this).closest('.row');
            if (!$(this).is(":checked")) {
                parentRow.find('input').not('.form-switch input').prop('disabled', true);
                parentRow.find('input').not('.form-switch input').prop('required', false);
            } else {
                parentRow.find('input').prop('disabled', false);
                parentRow.find('input').not('.form-switch input').prop('required', true);
            }
        });
        $('.shipmentType').change(function(){
            $('form').css('display', 'none');
            if($(this).val() == 1){
                $('button.submitform').attr('form','newShipmentForm');
                $('form#newShipmentForm').css('display', 'block');
            }else if($(this).val() == 2){
                $('button.submitform').attr('form','replacedShipmentForm');
                 $('form#replacedShipmentForm').css('display', 'block');
            }else if($(this).val() == 3){
                $('button.submitform').attr('form','depositShipmentForm');
                 $('form#depositShipmentForm').css('display', 'block');
            }
        });
        $('.storeSelect').change(function() {
            var store_id = $(this).val();
            $.ajax({
                url: "{{ route('getStoreReturnedShipments') }}",
                type: 'POST', // or 'GET' depending on your requirements
                dataType: 'json',
                data: {
                    // Pass any data you need to send to the server here
                    'store_id': store_id,
                     '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle the successful response from the server

                    if(response['count'] == 0){
                        alert("{{ __('translation.No Replaced Shipments In This Store !') }}");
                    }
                     $(".shipmentReplacedIdSelect").empty().append(response['view']).val('id').trigger(
                        'change');
                },
                error: function(xhr, status, error) {
                    // Handle any errors that occur during the request
                    console.error(error);
                }
            });

        });
    </script>
@endpush
