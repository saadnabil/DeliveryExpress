@extends('dashboard_v2.master')

@push('style')
    {{--  <link href="{{ url('dashboard_v2/assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}" rel="stylesheet" />  --}}
@endpush

@section('content')

    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Product') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">

                            <div class="mb-3">
                                <label for="productTitleEnglish" class="form-label">{{ __('translation.Title English') }}</label>
                                <input required name="name_en" value="{{ old('name_en') }}" type="text"
                                    class="form-control @error('name_en') error-input @enderror" id="productTitleEnglish"
                                    placeholder="Suit colored one size">
                                @error('name_en')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="productTitleArabic" class="form-label">{{ __('translation.Title Arabic') }}</label>
                                <input required name="name_ar" value="{{ old('name_ar') }}" type="text"
                                    class="form-control @error('name_ar') error-input @enderror" id="productTitleArabic"
                                    placeholder="بدلة ملونة حجم ثابت">
                                @error('name_ar')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="productDescriptionEnglish" class="form-label">{{ __('translation.Description English') }}</label>
                                <textarea required name="desc_en" class="form-control ckeditor  @error('desc_en') error-input @enderror"
                                    id="productDescriptionEnglish" rows="3">{{ old('desc_en') }}</textarea>
                                @error('desc_en')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="productDescriptionArabic" class="form-label">{{ __('translation.Description Arabic') }}</label>
                                <textarea required name="desc_ar" class="form-control ckeditor @error('desc_ar') error-input @enderror"
                                    id="productDescriptionArabic" rows="3"> {{ old('desc_ar') }}</textarea>
                                @error('desc_ar')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="productImage" class="form-label">{{ __('translation.Main Image') }} </label>
                                <input required name="image" id="productImage" class="image-uploadify" type="file"
                                    accept="image/*">
                                @error('image')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="product-variants">
                            @if (old('variants'))
                                @php
                                    $variants_counter = 1;
                                @endphp
                                @foreach (old('variants') as $variant)
                                    <div class="product-variant border border-3 p-4 rounded  mt-3"
                                        style="position:relative;">
                                            <input type="hidden" class="status" name="variants[{{ $variants_counter }}][status]" value="new"/>
                                            <div class="mb-3 sizediv" style="display:{{ old('size_setting') != 1 ?'none' : 'block' }}">
                                                <label for="inputProductType" class="form-label" >{{ __('translation.Product Size') }}</label>
                                                <select required name="variants[{{ $variants_counter }}][size]"
                                                    class="form-select  @error('variants.'.$variants_counter. '.size') error-input @enderror" id="inputProductType">
                                                    <option></option>
                                                    @foreach ($sizes as $key => $size)
                                                        <option {{ $variant['size'] == $size->id ? 'selected' : '' }}
                                                            value="{{ $size->id }}">{{ $size->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('variants.'.$variants_counter. '.size')
                                                    <div class="error-validation">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 colordiv" style="display:{{ old('color_setting') != 1 ?'none' : 'block' }}">
                                                <label for="inputProductType" class="form-label">{{ __('translation.Product Color') }}</label>
                                                <select  required name="variants[{{ $variants_counter }}][color]"
                                                    class="form-select  @error('variants.'.$variants_counter. '.color') error-input @enderror" id="inputProductType">
                                                    <option></option>
                                                    @foreach ($colors as $key => $color)
                                                        <option {{ $variant['color'] == $color->id ? 'selected' : '' }}
                                                            value="{{ $color->id }}">{{ $color->title }}</option>
                                                    @endforeach
                                                </select>
                                                 @error('variants.'.$variants_counter. '.color')
                                                    <div class="error-validation">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">{{ __('translation.Product Stock') }}</label>
                                            <input min="1" required value="{{ $variant['stock'] }}"
                                                name="variants[{{ $variants_counter }}][stock]" type="number"
                                                 class="form-control @error('variants.'.$variants_counter. '.stock') error-input @enderror" id="inputProductTitle"
                                                placeholder="">
                                             @error('variants.'.$variants_counter. '.stock')
                                                <div class="error-validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">{{ __('translation.Product Images') }}</label>
                                            <input name="variants[{{ $variants_counter }}][images][]"
                                                class="image-uploadify" type="file"
                                                accept="image/*"
                                                multiple>
                                            @error('variants.'.$variants_counter. '.images')
                                                <div class="error-validation">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @if($variants_counter != 1)
                                         <span class="remove-variant" title="Remove" style="position: absolute; top:3px;right:3px; cursor:pointer;font-size:18px;">
                                            <i class="bx bx-x"></i>
                                        </span>
                                        @endif
                                    </div>
                                    @php
                                        $variants_counter++;
                                    @endphp
                                @endforeach
                            @else
                                <div class="product-variant border border-3 p-4 rounded  mt-3" style="position:relative;">
                                    <input type="hidden" class="status" name="variants[1][status]" value="new"/>
                                    <div class="mb-3 sizediv">
                                        <label for="inputProductType" class="form-label">{{ __('translation.Product Size') }}</label>
                                        <select required name="variants[1][size]" class="form-select"
                                            id="inputProductType">
                                            <option></option>
                                            @foreach ($sizes as $key => $size)
                                                <option value="{{ $size->id }}">{{ $size->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 colordiv">
                                        <label for="inputProductType" class="form-label">{{ __('translation.Product Color') }}</label>
                                        <select required name="variants[1][color]" class="form-select"
                                            id="inputProductType">
                                            <option></option>
                                            @foreach ($colors as $key => $color)
                                                <option value="{{ $color->id }}">{{ $color->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductTitle" class="form-label">{{ __('translation.Product Stock') }}</label>
                                        <input min="1" required name="variants[1][stock]" type="number"
                                            class="form-control" id="inputProductTitle"
                                            placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">{{ __('translation.Product Images') }}</label>
                                        <input  name="variants[1][images][]" class="image-uploadify" type="file"
                                            accept="image/*"
                                            multiple>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @error('variants')
                            <div class="error-validation">{{ $message }}</div>
                        @enderror
                        <div class="mt-3">
                            <button data-count="{{ old('variants') ? count(old('variants')) :1 }}" class="btn btn-primary btn-sm add-variant">
                                 {{ __('translation.New Variant') }}
                                <i class="bx bx-plus"></i>
                            </button>
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
                                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('service')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-12" >
                                    <label for="mainCategoriesSelect" class="form-label">{{ __('translation.Main Categories') }}</label>
                                    <select required name="main_category_id"
                                        class="form-select mainCategoriesSelect @error('main_category_id') error-input @enderror"
                                        id="mainCategoriesSelect">
                                        <option></option>
                                    </select>
                                    @error('main_category_id')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="subCategoriesSelect" class="form-label">{{ __('translation.Sub Categories') }}</label>
                                    <select required name="category_id" requried
                                        class="form-select subCategoriesSelect @error('category_id') error-input @enderror"
                                        id="subCategoriesSelect">
                                        <option></option>
                                    </select>
                                    @error('category_id')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="card-body">
                                    <label for="" class="form-label">{{ __('translation.Size Setting') }}</label>
                                    <div class="form-check">
                                        <input {{ old('size_setting' , 1 ) == 1 ? 'checked' : ''  }} name="size_setting" class="form-check-input" type="radio"
                                            value="1" id="has_size">
                                        <label class="form-check-label" for="has_size">{{ __('translation.Has Size') }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input {{ old('size_setting' ,1) == 0 ? 'checked' : ''  }} name="size_setting" class="form-check-input" type="radio"
                                            value="0" id="doesnt_has_size">
                                        <label class="form-check-label" for="doesnt_has_size">{{ __('translation.Doesnt Has Size') }}</label>
                                    </div>

                                    <div class="form-check">
                                        <input {{ old('size_setting' ,1) == 2 ? 'checked' : ''  }} name="size_setting" class="form-check-input" type="radio"
                                            value="2" id="size_is_customized">
                                        <label class="form-check-label" for="size_is_customized">{{ __('translation.Size Is Customized') }}</label>
                                    </div>
                                </div>
                                @error('size_setting')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror

                                <div class="card-body">
                                    <label for="" class="form-label">{{ __('translation.Color Setting') }}</label>
                                    <div class="form-check">
                                        <input {{ old('color_setting' ,1) == 1 ? 'checked' : ''  }} name="color_setting"  class="form-check-input" type="radio"
                                            value="1" id="has_color">
                                        <label class="form-check-label" for="has_color">{{ __('translation.Has Color') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input  {{ old('color_setting' ,1) == 0 ? 'checked' : ''  }} name="color_setting" class="form-check-input" type="radio"
                                            value="0" id="doesnt_has_color">
                                        <label class="form-check-label" for="doesnt_has_color">{{ __('translation.Doesnt Has Color') }}</label>
                                    </div>
                                </div>
                                @error('color_setting')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="border border-3 p-4 rounded mt-3">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="" class="form-label">{{ __('translation.Price') }}</label>
                                    <input value="{{ old('price') }}" name="price" type="number" step="0.01"
                                        min="1"
                                        class="form-control priceinput @error('price') error-input @enderror"
                                        id="inputPrice" placeholder="00.00">
                                    @error('price')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>
                                <input type="hidden" name="new_price" class="newpriceinput"
                                    value="{{ old('new_price') }}" />
                                <div class="col-md-6">
                                    <label for="" class="form-label">{{ __('translation.New Price') }}</label>
                                    <input value="{{ old('new_price') }}" name="new_price" disabled type="number"
                                        step="0.01"
                                        class="form-control newpriceinput @error('new_price') error-input @enderror"
                                        id="inputCompareatprice" placeholder="00.00">
                                    @error('new_price')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="inputCompareatprice" class="form-label">{{ __('translation.Discount Percentage') }}</label>
                                    <input value="{{ old('discount', 0) }}" max="100" min="0"
                                        name="discount" value="{{ old('discount', 0) }}" type="number" step="0.01"
                                        class="form-control discountinput @error('discount') error-input @enderror"
                                        id="inputCompareatprice" placeholder="00.00">
                                    @error('discount')
                                        <div class="error-validation">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="inputProductType" class="form-label">{{ __('translation.Fashion Designer') }}</label>
                                    <select name="designer" class="form-select" id="inputProductType">
                                        <option></option>
                                        @foreach ($designers as $designer)
                                            <option value="{{ $designer->id }}">{{ $designer->name_en }}</option>
                                        @endforeach
                                    </select>
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
    @include('dashboard_v2.products.script.custom')
@endpush
