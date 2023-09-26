@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit Setting') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="application_name" class="form-label">{{ __('translation.Application Name') }}</label>
                                <input required name="application_name"  value="{{ old('application_name' , setting('application_name')) }}"  type="text"
                                    class="form-control @error('application_name') error-input @enderror" id="application_name">
                                @error('application_name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="delivery_fee" class="form-label">{{ __('translation.Delivery Fee') }}</label>
                                <input required name="delivery_fee" min="0" value="{{ old('delivery_fee' , setting('delivery_fee')) }}" step="0.01" type="number"
                                    class="form-control @error('delivery_fee') error-input @enderror" id="delivery_fee">
                                @error('delivery_fee')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="weight_fee" class="form-label">{{ __('translation.Weight Fee') }}</label>
                                <input required name="weight_fee" min="0" value="{{ old('weight_fee' , setting('weight_fee')) }}" step="0.01" type="number"
                                    class="form-control @error('weight_fee') error-input @enderror" id="weight_fee">
                                @error('weight_fee')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="collect_fee" class="form-label">{{ __('translation.Collect Fee') }}</label>
                                <input required name="collect_fee" min="0" value="{{ old('collect_fee' , setting('collect_fee')) }}" step="0.01" type="number"
                                    class="form-control @error('collect_fee') error-input @enderror" id="collect_fee">
                                @error('collect_fee')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tax_fee" class="form-label">{{ __('translation.Tax Fee') }}</label>
                                <input required name="tax_fee" min="0" value="{{ old('tax_fee' , setting('tax_fee')) }}" step="0.01" type="number"
                                    class="form-control @error('tax_fee') error-input @enderror" id="tax_fee">
                                @error('tax_fee')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                    @can('setting-create')
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
                    @endcan
                </div><!--end row-->
            </form>
        </div>
    </div>
@endsection

