@extends('dashboard_v2.master')
@section('content')

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit Category') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('category.update' , $category) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="productTitleEnglish" class="form-label">{{ __('translation.Title English') }}</label>
                                <input  required name="name_en" value="{{ old('name_en' , $category->name_en) }}" type="text"
                                    class="form-control @error('name_en') error-input @enderror" id="productTitleEnglish"
                                    placeholder="International Branding">
                                @error('name_en')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="productTitleArabic" class="form-label">{{ __('translation.Title Arabic') }}</label>
                                <input  required name="name_ar" value="{{ old('name_ar' , $category->name_ar ) }}" type="text"
                                    class="form-control @error('name_ar') error-input @enderror" id="productTitleArabic"
                                    placeholder="منتجات عالمية">
                                @error('name_ar')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="serviceSelect" class="form-label">{{ __('translation.Service') }}</label>
                                    <select required name="service"
                                        class="form-select serviceSelect @error('service') error-input @enderror"
                                        id="serviceSelect">
                                        <option></option>
                                        @foreach ($services as $service)
                                            <option {{ $category->service == $service->id ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('service')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 childs" style="display:{{ old('parent' , $category->primary) == 0 ? 'block' : 'none' }};">
                                    <label for="mainCategoriesSelect" class="form-label">{{ __('translation.Main Categories') }}</label>
                                    <select name="main_category_id"
                                        class="form-select mainCategoriesSelect @error('main_category_id') error-input @enderror"
                                        id="mainCategoriesSelect">
                                        <option ></option>
                                       @foreach ($mainCategories as $mainCategory)
                                             <option value="{{ $mainCategory->id }}" {{ $mainCategory->id == $category->parent ? 'selected' : ''}}>{{ $mainCategory->name }}</option>
                                       @endforeach
                                    </select>
                                    @error('main_category_id')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="card-body">
                                        <label for="" class="form-label">{{ __('translation.Main Category ?') }}</label>
                                        <div class="form-check">
                                            <input required {{ old('parent' , $category->primary ) == 1 ? 'checked' : ''  }} name="parent" class="form-check-input" type="radio"
                                                value="1" id="parent">
                                            <label class="form-check-label" for="parent">{{ __('translation.Yes') }}</label>
                                        </div>

                                        <div class="form-check">
                                            <input required {{ old('parent' ,$category->primary) == 0 ? 'checked' : ''  }} name="parent" class="form-check-input" type="radio"
                                                value="0" id="doesnt_parent">
                                            <label class="form-check-label" for="doesnt_parent">{{ __('translation.No') }}</label>
                                        </div>
                                    </div>
                                    @error('size_setting')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
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

@push('script')
    @include('dashboard_v2.categories.script.custom')
@endpush
