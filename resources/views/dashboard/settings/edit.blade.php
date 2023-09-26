@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit City') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('cities.update', $city) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('translation.Name') }}</label>
                                <input required name="name" value="{{ old('name',$city->name) }}" type="text"
                                    class="form-control @error('name') error-input @enderror" id="name"
                                    placeholder="White">
                                @error('name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="shipmentPrice" class="form-label">{{ __('translation.Shipment Price') }}</label>
                                <input required name="shipmentPrice" value="{{  old('shipmentPrice',$city->shipmentPrice) }}" min="1" step="0.01" type="number"
                                    class="form-control @error('shipmentPrice') error-input @enderror" id="shipmentPrice">
                                @error('shipmentPrice')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">{{ __('translation.Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </form>
        </div>
    </div>
@endsection

