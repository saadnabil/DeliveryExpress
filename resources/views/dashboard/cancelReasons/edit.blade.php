@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit Cancel Reason') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('cancelReasons.update', $cancelReason) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="reason" class="form-label">{{ __('translation.Reason') }}</label>
                                <input required name="reason" value="{{ old('name',$cancelReason->reason) }}" type="text"
                                    class="form-control @error('reason') error-input @enderror" id="reason"
                                    placeholder="White">
                                @error('reason')
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

