@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Role') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="productTitleEnglish" class="form-label">{{ __('translation.Assign Permissions') }}</label>
                                <!--Start::buttons -->
                                <div class="mb-5">
                                    <button class="btn btn-success btn-sm checkall">{{ __('translation.Check All') }}</button>
                                    <button class="btn btn-primary btn-sm uncheckall">{{ __('translation.Uncheck All') }}</button>
                                </div>
                                <!--Start::buttons -->
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-4">
                                                <input name="permission[]" value="{{ $permission->id }}" multiple
                                                    id="permission{{ $permission->id }}"
                                                    style="margin-right:10px;display:inline-block;" type="checkbox" />
                                                <!--begin::Label-->
                                                <label style="cursor:pointer;" for="permission{{ $permission->id }}"
                                                    class=" form-label">{{ $permission->name }}</label>
                                                <!--end::Label-->
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('permission')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('translation.Name') }}</label>
                                    <input required name="name" value="{{ old('name') }}" type="text"
                                        class="form-control @error('name') error-input @enderror" id="name"
                                        placeholder="سوبر ادمن">
                                    @error('name')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
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
@push('script')
    <script>
        $(".checkall").click(function(e){
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', true);
        });
        $(".uncheckall").click(function(e){
            e.preventDefault();
            $("input[type=checkbox]").prop('checked', false);
        });
    </script>
@endpush
