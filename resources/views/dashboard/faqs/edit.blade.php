@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit Question') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('faqs.update' , $faq) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="question" class="form-label">{{ __('translation.Question') }}</label>
                                <input required name="question" value="{{ old('question' , $faq->question) }}" type="text"
                                    class="form-control @error('question') error-input @enderror" id="question">
                                @error('question')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="input11" class="form-label">{{ __('translation.Answer') }}</label>
                                <textarea required name="answer" class="form-control  @error('answer') error-input @enderror" id="input11" rows="3">{{ old('answer',$faq->answer) }}</textarea>
                                @error('answer')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Application') }}:</label>
                                <select  requierd name="application"
                                    class="form-select mb-3 @error('application') error-input @enderror"
                                    aria-label="Default select example">
                                    <option>{{ __('translation.Select Application') }}</option>
                                    <option {{ $faq->application == 'deliveryApplication' ? 'selected' : '' }} value="deliveryApplication">{{ __('translation.deliveryApplication') }}
                                    </option>
                                    <option {{ $faq->application == 'storeApplication' ? 'selected' : '' }} value="storeApplication">{{ __('translation.storeApplication') }}</option>
                                </select>
                                @error('application')
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
