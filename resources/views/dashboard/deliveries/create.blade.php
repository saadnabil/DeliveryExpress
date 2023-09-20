@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Store') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('deliveries.store') }}" enctype="multipart/form-data">
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
                                <label for="id_number" class="form-label">{{ __('translation.ID Number') }}</label>
                                <input required name="id_number" value="{{ old('id_number') }}" type="text"
                                    class="form-control @error('id_number') error-input @enderror" id="id_number">
                                @error('id_number')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="birth_date" class="form-label">{{ __('translation.Birth Date') }}:</label>
                                <input required value="{{ Carbon\Carbon::parse(old('birth_date'))->format('Y-m-d') }}" name="birth_date" type="date"
                                    @error('birth_date') error-input @enderror class="form-control">
                                @error('birth_date')
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
                                <input  name="other_phone" value="{{ old('other_phone') }}" type="text"
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
                                        <label for="productTitleEnglish"
                                            class="form-label">{{ __('translation.Assign Work Cities') }}</label>
                                        <!--Start::buttons -->
                                        <div class="mb-5">
                                            <button
                                                class="btn btn-success btn-sm checkall">{{ __('translation.Check All') }}</button>
                                            <button
                                                class="btn btn-primary btn-sm uncheckall">{{ __('translation.Uncheck All') }}</button>
                                        </div>
                                        <!--Start::buttons -->
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach ($cities as $city)
                                                    <div class="col-md-6">
                                                        <input name="city[]" value="{{ $city->id }}" multiple
                                                            id="city{{ $city->id }}"
                                                            style="margin-right:10px;display:inline-block;"
                                                            type="checkbox" />
                                                        <!--begin::Label-->
                                                        <label style="cursor:pointer;" for="city{{ $city->id }}"
                                                            class=" form-label">{{ $city->name }}</label>
                                                        <!--end::Label-->
                                                    </div>
                                                @endforeach
                                            </div>
                                            @error('city')
                                                <div class="error-validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 border border-3 p-4 rounded">
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
                                        <label for="formFile"
                                            class="form-label">{{ __('translation.Delivery Image') }}</label>
                                        <input name="image" accept="image.*" class="form-control" type="file"
                                            id="formFile">
                                        @error('image')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{ __('translation.Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded mt-4">
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[0][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[0][day]" value="Saturday" type="text"
                                            class="form-control @error('worktimes[0][day]') error-input @enderror" id="worktimes[0][day]">
                                        @error('worktimes[0][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input type="time" name="worktimes[0][start_time]" value="{{ old('worktimes[0][start_time]') }}" class="form-control @error('worktimes[0][start_time]') error-input @enderror">
                                        @error('worktimes[0][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input type="time" name="worktimes[0][end_time]" value="{{ old('worktimes[0][end_time]') }}" class="form-control @error('worktimes[0][end_time]') error-input @enderror">
                                        @error('worktimes[0][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[1][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[1][day]" value="Sunday" type="text"
                                            class="form-control @error('worktimes[1][day]') error-input @enderror" id="worktimes[1][day]">
                                        @error('worktimes[1][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input type="time" name="worktimes[1][start_time]" value="{{ old('worktimes[1][start_time]') }}" class="form-control @error('worktimes[1][start_time]') error-input @enderror">
                                        @error('worktimes[1][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input type="time" name="worktimes[1][end_time]" value="{{ old('worktimes[1][end_time]') }}" class="form-control @error('worktimes[1][end_time]') error-input @enderror">
                                        @error('worktimes[1][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[2][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[2][day]" value="Monday" type="text"
                                            class="form-control @error('worktimes[2][day]') error-input @enderror" id="worktimes[2][day]">
                                        @error('worktimes[2][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input name="worktimes[2][start_time]"  type="time" value="{{ old('worktimes[2][start_time]') }}" class="form-control @error('worktimes[2][start_time]') error-input @enderror">
                                        @error('worktimes[2][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input name="worktimes[2][end_time]" type="time" value="{{ old('worktimes[2][end_time]') }}" class="form-control @error('worktimes[2][end_time]') error-input @enderror">
                                        @error('worktimes[2][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[3][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[3][day]" value="Tuesday" type="text"
                                            class="form-control @error('worktimes[3][day]') error-input @enderror" id="worktimes[3][day]">
                                        @error('worktimes[3][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input type="time" name="worktimes[3][start_time]" value="{{ old('worktimes[3][start_time]') }}" class="form-control @error('worktimes[3][start_time]') error-input @enderror">
                                        @error('worktimes[3][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input type="time" name="worktimes[3][end_time]" value="{{ old('worktimes[3][end_time]') }}" class="form-control @error('worktimes[3][end_time]') error-input @enderror">
                                        @error('worktimes[3][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[4][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[4][day]" value="Wednesday" type="text"
                                            class="form-control @error('worktimes[4][day]') error-input @enderror" id="worktimes[4][day]">
                                        @error('worktimes[4][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input type="time" name="worktimes[4][start_time]" value="{{ old('worktimes[4][start_time]') }}" class="form-control @error('worktimes[4][start_time]') error-input @enderror">
                                        @error('worktimes[4][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input type="time" name="worktimes[4][end_time]" value="{{ old('worktimes[4][end_time]') }}" class="form-control @error('worktimes[4][end_time]') error-input @enderror">
                                        @error('worktimes[4][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                           </div>
                            <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[5][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[5][day]" value="Thursday" type="text"
                                            class="form-control @error('worktimes[5][day]') error-input @enderror" id="worktimes[5][day]">
                                        @error('worktimes[5][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input name="worktimes[5][start_time]" type="time" value="{{ old('worktimes[5][start_time]') }}" class="form-control @error('worktimes[5][start_time]') error-input @enderror">
                                        @error('worktimes[5][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input type="time" name="worktimes[5][end_time]" value="{{ old('worktimes[5][end_time]') }}" class="form-control @error('worktimes[5][end_time]') error-input @enderror">
                                        @error('worktimes[5][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                           </div>
                           <div class="row">
                                <div class="col-md-4">
                                      <div class="mb-3">
                                        <label for="worktimes[6][day]" class="form-label">{{ __('translation.Day') }}</label>
                                        <input readonly required name ="worktimes[6][day]" value="Friday" type="text"
                                            class="form-control @error('worktimes[6][day]') error-input @enderror" id="worktimes[6][day]">
                                        @error('worktimes[6][day]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.Start Time') }}:</label>
                                        <input name="worktimes[6][start_time]" type="time" value="{{ old('worktimes[6][start_time]') }}" class="form-control @error('worktimes[6][start_time]') error-input @enderror">
                                        @error('worktimes[6][start_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('translation.End Time') }}:</label>
                                        <input name="worktimes[6][end_time]" type="time" value="{{ old('worktimes[6][end_time]') }}" class="form-control @error('worktimes[6][end_time]') error-input @enderror">
                                        @error('worktimes[6][end_time]')
                                            <div class="error-validation">{{ $message }}</div>
                                        @enderror
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
    </script>
@endpush
