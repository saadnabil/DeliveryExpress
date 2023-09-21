@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Shipment') }}</h5>
            <hr />

            <div class="row">
                <div class="col-lg-8">
                    <form class="form-body " method="post" action="{{ route('shipments.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="3" name="shipment_type_id" />
                        <div class="border border-3 p-4 rounded">
                            <h5>{{ __('translation.Shipment Details') }}</h5>
                            <div class="mb-3">
                                <label for="money" class="form-label">{{ __('translation.Deposit') }}:</label>
                                <input required name="money" type="number" step="0.01"
                                    @error('money') error-input @enderror class="form-control">
                                @error('money')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea class="form-control" id="notes" placeholder="{{ __('translation.Add Notes') }}" rows="3"></textarea>
                                 @error('notes')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="border border-3 mt-4 p-4 rounded">
                            <h5>{{ __('translation.Client Details') }}</h5>
                            <div class="mb-3">
                                <label for="client_name" class="form-label">{{ __('translation.Name') }}:</label>
                                <input required required name="client_name" type="text"
                                    @error('client_name') error-input @enderror class="form-control">
                                @error('client_name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input required name="phone" type="text" @error('phone') error-input @enderror
                                    class="form-control">
                                @error('phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input  name="other_phone" type="text"
                                    @error('other_phone') error-input @enderror class="form-control">
                                @error('other_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Payment Type') }}:</label>
                                <select required name="payment_type"
                                    class="form-select mb-3 @error('payment_type') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="" selected>{{ __('translation.Select Payment Type') }}</option>
                                    <option value="1" {{ old('payment_type') === 1 ? 'selected' : '' }}>
                                        {{ __('translation.Cash') }}</option>
                                    <option value="2" {{ old('payment_type') === 2 ? 'selected' : '' }}>
                                        {{ __('translation.Visa On Delivery') }}</option>
                                </select>
                                @error('payment_type')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.City') }}:</label>
                                <select requierd name="city_id"
                                    class="form-select mb-3 @error('city_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select City') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Country') }}:</label>
                                <select requierd name="country_id"
                                    class="form-select mb-3 @error('country_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea required class="form-control" id="address" placeholder="{{ __('translation.Add Address') }}" rows="3"></textarea>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="productTitleEnglish"
                                        class="form-label">{{ __('translation.Shipment Type') }}</label>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input checked name="shipment_type_id" class="form-check-input" type="radio"
                                                name="flexRadioDefault" id="TypeThree">
                                            <label class="form-check-label"
                                                for="TypeThree">{{ __('translation.Deposit') }}</label>
                                        </div>

                                        <div class="form-check">
                                            <input name="shipment_type_id" class="form-check-input" type="radio"
                                                name="flexRadioDefault" id="TypeOne">
                                            <label class="form-check-label"
                                                for="TypeOne">{{ __('translation.New') }}</label>
                                        </div>
                                        <div class="form-check">
                                            <input name="shipment_type_id" class="form-check-input" type="radio"
                                                name="flexRadioDefault" id="TypeTwo">
                                            <label class="form-check-label"
                                                for="TypeTwo">{{ __('translation.Multiple Exchange') }}</label>
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit"
                                                class="btn btn-success">{{ __('translation.Save') }}</button>
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
        $(".checkall").click(function(e) {
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', true);
        });
        $(".uncheckall").click(function(e) {
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', false);
        });
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
    </script>
@endpush
