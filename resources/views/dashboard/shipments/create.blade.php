@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Shipment') }}</h5>
            <hr />

            @if($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
@endif

            <div class="row">
                <div class="col-lg-8">

                    {{--  <form id="storeShipment" class="form-body" method="post" action="{{ route('shipments.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="3" name="shipment_type_id" />

                        <div  class="border border-3 p-4 rounded depositData">
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
                                <label class="form-label">{{ __('translation.Store') }}:</label>
                                <select requierd name="store_id"
                                    class="form-select mb-3 @error('store_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}"
                                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea name="notes" class="form-control" id="notes" placeholder="{{ __('translation.Add Notes') }}" rows="3"></textarea>
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
                                <label for="client_phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input required name="client_phone" type="text" @error('client_phone') error-input @enderror
                                    class="form-control">
                                @error('client_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="client_other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input  name="client_other_phone" type="text"
                                    @error('client_other_phone') error-input @enderror class="form-control">
                                @error('client_other_phone')
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
                                <label for="client_address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea name="client_address" required class="form-control" id="client_address" placeholder="{{ __('translation.Add Address') }}" rows="3"></textarea>
                                @error('client_address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </form>  --}}

                    {{--  <form id="storeShipment" class="form-body" method="post" action="{{ route('shipments.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="1" name="shipment_type_id" />
                        <div class="border border-3 p-4 rounded newData">
                            <h5>{{ __('translation.Shipment Details') }}</h5>
                            <div class="mb-3">
                                <label for="shipment_price" class="form-label">{{ __('translation.Shipment Price') }}:</label>
                                <input required name="shipment_price" min="1" type="number"
                                    @error('shipment_price') error-input @enderror class="form-control">
                                @error('shipment_price')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">{{ __('translation.Quantity') }}:</label>
                                <input required name="quantity" min="1" type="number"
                                    @error('quantity') error-input @enderror class="form-control">
                                @error('quantity')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">{{ __('translation.Weight') }}:</label>
                                        <input required name="weight" min="1" type="number"
                                            @error('weight') error-input @enderror class="form-control">
                                        @error('weight')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="length" class="form-label">{{ __('translation.Length') }}:</label>
                                        <input required name="length" min="1" type="number"
                                            @error('length') error-input @enderror class="form-control">
                                        @error('length')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="width" class="form-label">{{ __('translation.Width') }}:</label>
                                        <input required name="width" min="1" type="number"
                                            @error('width') error-input @enderror class="form-control">
                                        @error('width')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="height" class="form-label">{{ __('translation.Height') }}:</label>
                                        <input required name="height" min="1" type="number"
                                            @error('height') error-input @enderror class="form-control">
                                        @error('height')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="breakable" class="form-check-input" type="checkbox" value="1" id="breakable">
                                            <label class="form-check-label" for="breakable">{{ __('translation.Breakable') }}</label>
                                        </div>
                                        @error('breakable')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="measurement_is_allowed" class="form-check-input" type="checkbox" value="1" id="measurement_is_allowed">
                                            <label class="form-check-label" for="measurement_is_allowed">{{ __('translation.Measurement Is Allowed') }}</label>
                                        </div>
                                        @error('measurement_is_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="shipment_packaging" class="form-check-input" type="checkbox" value="1" id="shipment_packaging">
                                            <label class="form-check-label" for="shipment_packaging">{{ __('translation.Shipment Packaging') }}</label>
                                        </div>
                                        @error('shipment_packaging')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="preview_allowed" class="form-check-input" type="checkbox" value="1" id="preview_allowed">
                                            <label class="form-check-label" for="preview_allowed">{{ __('translation.Preview Allowed') }}</label>
                                        </div>
                                        @error('preview_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>



                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Store') }}:</label>
                                <select requierd name="store_id"
                                    class="form-select mb-3 @error('store_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}"
                                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea name="notes" class="form-control" id="notes" placeholder="{{ __('translation.Add Notes') }}" rows="3"></textarea>
                                 @error('notes')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="description" class="form-label">{{ __('translation.Description') }}:</label>
                                <textarea name="description" class="form-control" id="description" placeholder="{{ __('translation.Add Description') }}" rows="3"></textarea>
                                 @error('description')
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
                                <label for="client_phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input required name="client_phone" type="text" @error('client_phone') error-input @enderror
                                    class="form-control">
                                @error('client_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="client_other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input  name="client_other_phone" type="text"
                                    @error('client_other_phone') error-input @enderror class="form-control">
                                @error('client_other_phone')
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
                                <label for="client_address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea name="client_address" required class="form-control" id="client_address" placeholder="{{ __('translation.Add Address') }}" rows="3"></textarea>
                                @error('client_address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </form>  --}}

                    <form id="storeShipment" class="form-body" method="post" action="{{ route('shipments.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="2" name="shipment_type_id" />
                        <div class="border border-3 p-4 rounded newData">
                            <h5>{{ __('translation.Shipment Details') }}</h5>
                            <div class="mb-3">
                                <label for="shipment_price" class="form-label">{{ __('translation.Shipment Price') }}:</label>
                                <input required name="shipment_price" min="1" type="number"
                                    @error('shipment_price') error-input @enderror class="form-control">
                                @error('shipment_price')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">{{ __('translation.Quantity') }}:</label>
                                <input required name="quantity" min="1" type="number"
                                    @error('quantity') error-input @enderror class="form-control">
                                @error('quantity')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">{{ __('translation.Weight') }}:</label>
                                        <input required name="weight" min="1" type="number"
                                            @error('weight') error-input @enderror class="form-control">
                                        @error('weight')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="length" class="form-label">{{ __('translation.Length') }}:</label>
                                        <input required name="length" min="1" type="number"
                                            @error('length') error-input @enderror class="form-control">
                                        @error('length')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="width" class="form-label">{{ __('translation.Width') }}:</label>
                                        <input required name="width" min="1" type="number"
                                            @error('width') error-input @enderror class="form-control">
                                        @error('width')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="height" class="form-label">{{ __('translation.Height') }}:</label>
                                        <input required name="height" min="1" type="number"
                                            @error('height') error-input @enderror class="form-control">
                                        @error('height')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="breakable" class="form-check-input" type="checkbox" value="1" id="breakable">
                                            <label class="form-check-label" for="breakable">{{ __('translation.Breakable') }}</label>
                                        </div>
                                        @error('breakable')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="measurement_is_allowed" class="form-check-input" type="checkbox" value="1" id="measurement_is_allowed">
                                            <label class="form-check-label" for="measurement_is_allowed">{{ __('translation.Measurement Is Allowed') }}</label>
                                        </div>
                                        @error('measurement_is_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="shipment_packaging" class="form-check-input" type="checkbox" value="1" id="shipment_packaging">
                                            <label class="form-check-label" for="shipment_packaging">{{ __('translation.Shipment Packaging') }}</label>
                                        </div>
                                        @error('shipment_packaging')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div>
                                        <div class="form-check mb-3">
                                            <input name="preview_allowed" class="form-check-input" type="checkbox" value="1" id="preview_allowed">
                                            <label class="form-check-label" for="preview_allowed">{{ __('translation.Preview Allowed') }}</label>
                                        </div>
                                        @error('preview_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>



                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Store') }}:</label>
                                <select requierd name="store_id"
                                    class="form-select mb-3 @error('store_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}"
                                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea name="notes" class="form-control" id="notes" placeholder="{{ __('translation.Add Notes') }}" rows="3"></textarea>
                                 @error('notes')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">{{ __('translation.Description') }}:</label>
                                <textarea name="description" class="form-control" id="description" placeholder="{{ __('translation.Add Description') }}" rows="3"></textarea>
                                 @error('description')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="shipment_replace_reason" class="form-label">{{ __('translation.Replace Reason') }}:</label>
                                <textarea name="description" class="form-control" id="shipment_replace_reason" placeholder="{{ __('translation.Add Replace Reason') }}" rows="3"></textarea>
                                 @error('shipment_replace_reason')
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
                                <label for="client_phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input required name="client_phone" type="text" @error('client_phone') error-input @enderror
                                    class="form-control">
                                @error('client_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="client_other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input  name="client_other_phone" type="text"
                                    @error('client_other_phone') error-input @enderror class="form-control">
                                @error('client_other_phone')
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
                                <label for="client_address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea name="client_address" required class="form-control" id="client_address" placeholder="{{ __('translation.Add Address') }}" rows="3"></textarea>
                                @error('client_address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
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
                                        @foreach($shipmentTypes as $key => $shipmentType)
                                            <div class="form-check">
                                                <input class="shipmentType" {{ $shipmentType->id == 3 ? 'selected' : '' }} value="{{ $shipmentType->id }}" checked name="shipment_type_id" class="form-check-input" type="radio"
                                                     id="{{ $shipmentType->id }}">
                                                <label class="form-check-label"
                                                    for="{{ $shipmentType->id }}">{{ $shipmentType->type }}</label>
                                            </div>
                                        @endforeach
                                        <div class="d-grid">
                                            <button form="storeShipment" type="submit"
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
