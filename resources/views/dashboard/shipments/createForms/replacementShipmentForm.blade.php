 <form style="display:{{ old('shipment_type_id') == 2 ? 'block' : 'none' }};" id="replacedShipmentForm" class="form-body" method="post" action="{{ route('shipments.store') }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="2" name="shipment_type_id" />
                        <div class="border border-3 p-4 rounded newData">
                            <h5>{{ __('translation.Shipment Details') }}</h5>
                            <div class="mb-3">
                                <label for="replace_shipment_price"
                                    class="form-label">{{ __('translation.Shipment Price') }}:</label>
                                <input id="replace_shipment_price" required name="shipment_price" min="1" type="number"
                                    @error('shipment_price') error-input @enderror class="form-control">
                                @error('shipment_price')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_quantity" class="form-label">{{ __('translation.Quantity') }}:</label>
                                <input id="replace_quantity" required name="quantity" min="1" type="number"
                                    @error('quantity') error-input @enderror class="form-control">
                                @error('quantity')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="replace_weight" class="form-label">{{ __('translation.Weight') }}:</label>
                                        <input  id="replace_weight" required name="weight" min="1" type="number"
                                            @error('weight') error-input @enderror class="form-control">
                                        @error('weight')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="replace_length" class="form-label">{{ __('translation.Length') }}:</label>
                                        <input  id="replace_length" required name="length" min="1" type="number"
                                            @error('length') error-input @enderror class="form-control">
                                        @error('length')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="replace_width" class="form-label">{{ __('translation.Width') }}:</label>
                                        <input id="replace_width" required name="width" min="1" type="number"
                                            @error('width') error-input @enderror class="form-control">
                                        @error('width')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="replace_height" class="form-label">{{ __('translation.Height') }}:</label>
                                        <input id="replace_height" required name="height" min="1" type="number"
                                            @error('height') error-input @enderror class="form-control">
                                        @error('height')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <div class="form-check mb-3">
                                            <input @error('breakable') error-input @enderror name="breakable" class="form-check-input" type="checkbox" value="1"
                                                id="replace_breakable">
                                            <label class="form-check-label"
                                                for="replace_breakable">{{ __('translation.Breakable') }}</label>
                                        </div>
                                        @error('breakable')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <div class="form-check mb-3">
                                            <input @error('measurement_is_allowed') error-input @enderror name="measurement_is_allowed" class="form-check-input" type="checkbox"
                                                value="1" id="replace_measurement_is_allowed">
                                            <label class="form-check-label"
                                                for="replace_measurement_is_allowed">{{ __('translation.Measurement Is Allowed') }}</label>
                                        </div>
                                        @error('measurement_is_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <div class="form-check mb-3">
                                            <input @error('shipment_packaging') error-input @enderror name="shipment_packaging" class="form-check-input" type="checkbox"
                                                value="1" id="replace_shipment_packaging">
                                            <label class="form-check-label"
                                                for="replace_shipment_packaging">{{ __('translation.Shipment Packaging') }}</label>
                                        </div>
                                        @error('shipment_packaging')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <div class="form-check mb-3">
                                            <input @error('preview_allowed') error-input @enderror name="preview_allowed" class="form-check-input" type="checkbox"
                                                value="1" id="replace_preview_allowed">
                                            <label class="form-check-label"
                                                for="replace_preview_allowed">{{ __('translation.Preview Allowed') }}</label>
                                        </div>
                                        @error('preview_allowed')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="replace_store_id" class="form-label">{{ __('translation.Store') }}:</label>
                                <select id="replace_store_id"  requierd name="store_id"
                                    class="single-select-field form-select storeSelect mb-3 @error('store_id') error-input @enderror"
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
                                <label for="replace_shipment_replaced_id"
                                    class="form-label">{{ __('translation.Returned Shipments') }}</label>
                                <select @error('shipment_replaced_id') error-input @enderror required name="shipment_replaced_id" class="form-select shipmentReplacedIdSelect single-select-field"
                                    id="replace_shipment_replaced_id" data-placeholder="{{ __('translation.Select Replaced Shipment') }}">
                                    <option></option>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="replace_notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea @error('notes') error-input @enderror name="notes" class="form-control" id="replace_notes" placeholder="{{ __('translation.Add Notes') }}"
                                    rows="3"></textarea>
                                @error('notes')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_description" class="form-label">{{ __('translation.Description') }}:</label>
                                <textarea @error('description') error-input @enderror  name="description" class="form-control" id="replace_description"
                                    placeholder="{{ __('translation.Add Description') }}" rows="3"></textarea>
                                @error('description')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_shipment_replace_reason"
                                    class="form-label">{{ __('translation.Replace Reason') }}:</label>
                                <textarea  @error('shipment_replace_reason') error-input @enderror name="shipment_replace_reason" class="form-control" id="replace_shipment_replace_reason"
                                    placeholder="{{ __('translation.Add Replace Reason') }}" rows="3"></textarea>
                                @error('shipment_replace_reason')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="replace_formFile" class="form-label">{{ __('translation.Shipment Images') }}</label>
                                <input @error('images') error-input @enderror name="images[]" multiple accept="image.*" class="form-control" type="file" id="replace_formFile">
                                    @error('images')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                          <div class="border border-3 mt-4 p-4 rounded">
                            <h5>{{ __('translation.Client Details') }}</h5>
                            <div class="mb-3">
                                <label for="replace_client_name" class="form-label">{{ __('translation.Name') }}:</label>
                                <input id="replace_client_name" required required name="client_name" type="text"
                                    @error('client_name') error-input @enderror class="form-control">
                                @error('client_name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_client_phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input id="replace_client_phone" required name="client_phone" type="text" @error('client_phone') error-input @enderror
                                    class="form-control">
                                @error('client_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_client_other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input id="replace_client_other_phone"  name="client_other_phone" type="text"
                                    @error('client_other_phone') error-input @enderror class="form-control">
                                @error('client_other_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="replace_payment_type" class="form-label">{{ __('translation.Payment Type') }}:</label>
                                <select id="replace_payment_type" required name="payment_type"
                                    class="form-select single-select-field mb-3 @error('payment_type') error-input @enderror"
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
                                <label for="replace_city_id" class="form-label">{{ __('translation.City') }}:</label>
                                <select id="replace_city_id" requierd name="city_id"
                                    class="form-select single-select-field mb-3 @error('city_id') error-input @enderror" aria-label="Default select example">
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
                                <label for="replace_country_id" class="form-label">{{ __('translation.Country') }}:</label>
                                <select id="replace_country_id" requierd name="country_id"
                                    class="form-select single-select-field mb-3 @error('country_id') error-input @enderror"
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
                                <label for="replace_client_address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea  @error('client_address') error-input @enderror id="replace_client_address" name="client_address" required class="form-control" id="replace_client_address" placeholder="{{ __('translation.Add Address') }}" rows="3"></textarea>
                                @error('client_address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </form>
