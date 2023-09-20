@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Store') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('stores.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">

                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('translation.Name') }}</label>
                                <input required name="name" value="{{ old('name') }}" type="text"
                                    class="form-control @error('name') error-input @enderror" id="name">
                                @error('name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="store_name" class="form-label">{{ __('translation.Store Name') }}</label>
                                <input required name="store_name" value="{{ old('store_name') }}" type="text"
                                    class="form-control @error('store_name') error-input @enderror" id="store_name">
                                @error('store_name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('translation.Email') }}</label>
                                <input required name="email" value="{{ old('email') }}" type="email"
                                    class="form-control @error('email') error-input @enderror" id="email">
                                @error('email')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">{{ __('translation.Phone') }}</label>
                                <input required name="phone" value="{{ old('phone') }}" type="text"
                                    class="form-control @error('phone') error-input @enderror" id="phone">
                                @error('phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="other_phone" class="form-label">{{ __('translation.Other Phone') }}</label>
                                <input required name="other_phone" value="{{ old('other_phone') }}" type="text"
                                    class="form-control @error('other_phone') error-input @enderror" id="other_phone">
                                @error('other_phone')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('translation.Password') }}</label>
                                <input required name="password" value="" type="text"
                                    class="form-control @error('password') error-input @enderror" id="password">
                                @error('password')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">{{ __('translation.Address') }}</label>
                                <input required name="address" value="{{ old('address') }}" type="text"
                                    class="form-control @error('address') error-input @enderror" id="address">
                                @error('address')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="website" class="form-label">{{ __('translation.Website') }}</label>
                                <input required name="website" value="{{ old('website') }}" type="url"
                                    class="form-control @error('website') error-input @enderror" id="website">
                                @error('website')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="website" class="form-label">{{ __('translation.Website') }}</label>
                                <input required name="website" value="{{ old('website') }}" type="url"
                                    class="form-control @error('website') error-input @enderror" id="website">
                                @error('website')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Active Status') }}:</label>
                                <select requierd name="active"
                                    class="form-select mb-3 @error('active') error-input @enderror"
                                    aria-label="Default select example">
                                    <option value="" selected>{{ __('translation.Select Status') }}</option>
                                    <option value="1" {{ old('active') === 1 ? 'selected' : '' }}>
                                        {{ __('translation.Active') }}</option>
                                    <option value="0" {{ old('active') === 0 ? 'selected' : '' }}>
                                        {{ __('translation.Not Active') }}</option>
                                </select>
                                @error('active')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-12">
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

                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Activity') }}:</label>
                                        <select requierd name="activity_id"
                                            class="form-select mb-3 @error('activity_id') error-input @enderror"
                                            aria-label="Default select example">
                                            <option value="">{{ __('translation.Select Activity') }}</option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ $activity->id }}"
                                                    {{ old('activity_id') == $activity->id ? 'selected' : '' }}>
                                                    {{ $activity->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('activity_id')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">{{ __('translation.Store Logo') }}</label>
                                        <input name="image" accept="image.*" class="form-control" type="file" id="formFile">
                                         @error('image')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit"
                                            class="btn btn-success">{{ __('translation.Save') }}</button>
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
