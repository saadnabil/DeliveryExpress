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
                                <label for="email" class="form-label">{{ __('translation.Email') }}</label>
                                <input required name="email"  value="{{ old('email' , setting('email')) }}"  type="email"
                                    class="form-control @error('email') error-input @enderror" id="email">
                                @error('email')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('translation.Phone') }}</label>
                                <input required name="phone"  value="{{ old('phone' , setting('phone')) }}"  type="phone"
                                    class="form-control @error('phone') error-input @enderror" id="phone">
                                @error('phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="application_name" class="form-label">{{ __('translation.Application Name') }}</label>
                                <input required name="application_name"  value="{{ old('application_name' , setting('application_name')) }}"  type="text"
                                    class="form-control @error('application_name') error-input @enderror" id="application_name">
                                @error('application_name')
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

                            <div class="mb-3">
                                <label for="terms_conditions" class="form-label">{{ __('translation.Terms And Conditions') }}</label>
                                <textarea  name="terms_conditions" class="form-control ckeditor  @error('terms_conditions' , setting('terms_conditions')) error-input @enderror"
                                    id="terms_conditions" rows="3">{{ old('terms_conditions', setting('terms_conditions')) }}</textarea>
                                @error('terms_conditions')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="privacy_policy" class="form-label">{{ __('translation.Privacy And Policy') }}</label>
                                <textarea  name="privacy_policy" class="form-control ckeditor  @error('privacy_policy') error-input @enderror"
                                    id="privacy_policy" rows="3">{{ old('privacy_policy', setting('privacy_policy')) }}</textarea>
                                @error('privacy_policy')
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




