@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Coupon') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('coupons.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">

                             <div class="mb-3">
                                <label for="title" class="form-label">{{ __('translation.Title') }}</label>
                                <input required name="title" value="{{ old('title') }}" type="text"
                                    placeholder="DXC2023" class="form-control @error('title') error-input @enderror" id="title">
                                @error('title')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Expire Date') }}:</label>
                                <input requierd name="expire_date" value="{{ old('expire_date') }}" type="datetime-local" class="form-control @error('expire_date') error-input @enderror">
                                @error('expire_date')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Store') }}:</label>
                                <select requierd name="store_id" class="form-select mb-3 @error('store_id') error-input @enderror" aria-label="Default select example">
                                    <option>{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option  value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                 @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="discount" class="form-label">{{ __('translation.Discount') }}</label>
                                <input required name="discount" value="{{ old('discount') }}" type="number" min="1"  max="100"
                                    placeholder="10" class="form-control @error('discount') error-input @enderror" id="discount">
                                @error('discount')
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

