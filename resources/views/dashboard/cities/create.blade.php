@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New City') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('cities.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('translation.Name') }}</label>
                                <input required name="name" value="{{ old('name') }}" type="text"
                                    class="form-control @error('name') error-input @enderror" id="name"
                                    >
                                @error('name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="shipmentPrice" class="form-label">{{ __('translation.Shipment Price') }}</label>
                                <input  required name="shipmentPrice" value="{{ old('shipmentPrice') }}" type="number" step="0.01"
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
                                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
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

