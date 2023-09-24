 <form id="depositShipmentForm" style="display:{{ old('shipment_type_id',$shipment->shipment_type_id) == 3 ? 'block' : 'none' }};" class="form-body" method="post" action="{{ route('shipments.update', $shipment) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('put')
                        <input type="hidden" value="3" name="shipment_type_id" />
                        <div  class="border border-3 p-4 rounded depositData">
                            <h5>{{ __('translation.Shipment Details') }}</h5>
                            <div class="mb-3">
                                <label for="deposit_money" class="form-label">{{ __('translation.Deposit') }}:</label>
                                <input value="{{ old('money',$shipment->money) }}" id="deposit_money" @error('money') error-input @enderror required name="money" type="number" step="0.01"
                                    @error('money') error-input @enderror class="form-control">
                                @error('money')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_store_id" class="form-label">{{ __('translation.Store') }}:</label>
                                <select id="deposit_store_id" requierd name="store_id"
                                    class="form-select single-select-field mb-3 @error('store_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option {{ old('store_id',$shipment->store_id) == $store->id ? 'selected' : '' }} value="{{ $store->id }}"
                                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                                            {{ $store->name }}</option>
                                    @endforeach
                                </select>
                                @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_store_notes" for="notes" class="form-label">{{ __('translation.Notes') }}:</label>
                                <textarea  @error('notes') error-input @enderror id="deposit_store_notes" name="notes" class="form-control" id="notes" placeholder="{{ __('translation.Add Notes') }}" rows="3">{{ old('notes',$shipment->notes) }}</textarea>
                                 @error('notes')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>



                        <div class="border border-3 mt-4 p-4 rounded">
                            <h5>{{ __('translation.Client Details') }}</h5>
                            <div class="mb-3">
                                <label for="deposit_client_name" class="form-label">{{ __('translation.Name') }}:</label>
                                <input value="{{ old('client_name',$shipment->client_name) }}" @error('client_name') error-input @enderror id="deposit_client_name" required required name="client_name" type="text"
                                     class="form-control">
                                @error('client_name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_client_phone" class="form-label">{{ __('translation.Phone') }}:</label>
                                <input  value="{{ old('client_phone',$shipment->client_phone) }}" @error('client_phone') error-input @enderror id="deposit_client_phone" required name="client_phone" type="text" @error('client_phone') error-input @enderror
                                    class="form-control">
                                @error('client_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_client_other_phone" class="form-label">{{ __('translation.Other Phone') }}:</label>
                                <input value="{{ old('client_other_phone',$shipment->client_other_phone) }}" @error('client_other_phone') error-input @enderror id="deposit_client_other_phone"  name="client_other_phone" type="text"
                                    class="form-control">
                                @error('client_other_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_payment_type" class="form-label">{{ __('translation.Payment Type') }}:</label>
                                <select  id="deposit_payment_type" required name="payment_type"
                                    class="form-select single-select-field mb-3 @error('payment_type') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="" selected>{{ __('translation.Select Payment Type') }}</option>
                                    <option value="1" {{ old('payment_type', $shipment->payment_type) === 1 ? 'selected' : '' }}>
                                        {{ __('translation.Cash') }}</option>
                                    <option value="2" {{ old('payment_type', $shipment->payment_type) === 2 ? 'selected' : '' }}>
                                        {{ __('translation.Visa On Delivery') }}</option>
                                </select>
                                @error('payment_type')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_city_id" class="form-label">{{ __('translation.City') }}:</label>
                                <select id="deposit_city_id" requierd name="city_id"
                                    class="form-select single-select-field mb-3 @error('city_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select City') }}</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ old('city_id', $shipment->city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deposit_country_id" class="form-label">{{ __('translation.Country') }}:</label>
                                <select id="deposit_country_id" requierd name="country_id"
                                    class="form-select single-select-field mb-3 @error('country_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Country') }}</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ old('country_id',$shipment->country_id) == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label for="deposit_client_address" class="form-label">{{ __('translation.Address') }}:</label>
                                <textarea @error('client_address') error-input @enderror id="deposit_client_address" name="client_address" required class="form-control" id="deposit_client_address" placeholder="{{ __('translation.Add Address') }}" rows="3">{{ old('client_address',$shipment->client_address) }}</textarea>
                                @error('client_address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </form>
