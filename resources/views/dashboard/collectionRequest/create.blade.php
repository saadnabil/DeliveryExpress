@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Add New Collection Request') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('collectionRequests.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Date') }}:</label>
                                <input requierd name="date" value="{{ old('date') }}" type="datetime-local" class="form-control @error('date') error-input @enderror">
                                @error('date')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Store') }}:</label>
                                <select requierd name="store_id" class="form-select mb-3 @error('store_id') error-input @enderror" aria-label="Default select example">
                                    <option value="">{{ __('translation.Select Store') }}</option>
                                    @foreach ($stores as $store)
                                        <option  value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                                 @error('store_id')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="input11" class="form-label">{{ __('translation.Notes') }}</label>
                                <textarea required name="notes" class="form-control  @error('notes') error-input @enderror" id="input11" rows="3">{{ old('notes') }}</textarea>
                                @error('notes')
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

