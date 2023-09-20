@extends('dashboard_v2.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Color') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('color.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="productTitleArabic" class="form-label">{{ __('translation.Title English') }}</label>
                                <input required name="title_en" value="{{ old('title_en') }}" type="text"
                                    class="form-control @error('title_en') error-input @enderror" id="productTitleArabic"
                                    placeholder="White">
                                @error('title_en')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productTitleEnglish" class="form-label">{{ __('translation.Title Arabic') }}</label>
                                <input required name="title_ar" value="{{  old('title_ar') }}" type="text"
                                    class="form-control @error('title_ar') error-input @enderror" id="productTitleEnglish"
                                    placeholder="ابيض">
                                @error('title_ar')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="color" class="form-label">{{ __('translation.Color') }}</label>
                                <input  required name="color" value="{{ old('color' , '#fff000') }}" type="color"
                                    class="form-control @error('color') error-input @enderror" id="color"
                                    placeholder="">
                                @error('color')
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

