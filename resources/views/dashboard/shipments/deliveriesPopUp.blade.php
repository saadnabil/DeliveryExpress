<div class="col">
        <div class="modal fade" id="DeliveriesPopUp" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('translation.Assign Delivery') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="deliveryForm" method="post" action="">
                            @csrf
                            <div class="mb-3">
                                <label for="delivery_id" class="form-label">{{ __('translation.Delivery') }}:</label>
                                <select  id="delivery_id" required name="delivery_id"
                                    class="form-select single-select-field mb-3 @error('delivery_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="" selected>{{ __('translation.Select Delivery') }}</option>
                                    @foreach($deliveries as $key => $delivery)
                                        <option value="{{ $delivery->id }}" {{ old('delivery_id') === 1 ? 'selected' : '' }}>
                                            {{ $delivery->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('delivery_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('translation.Close') }}</button>
                        <button form="deliveryForm" type="submit" class="btn btn-success">{{ __('translation.Save') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
