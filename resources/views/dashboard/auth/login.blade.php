@extends('dashboard.auth.partials.master')

@section('content')
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="p-4">
                                <div class="mb-3 text-center">
                                    <img src="{{ url('dashboard_v2/assets/images/logo-img.png') }}" width="60" alt="" />
                                </div>
                                <div class="text-center mb-4">
                                    <h5 class="">{{ __('translation.Delivery Express') }}</h5>
                                    <p class="mb-0">{{ __('translation.Please log in to your account') }}</p>
                                </div>
                                <div class="form-body">
                                    <form class="row g-3" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">{{ __('translation.Email') }}</label>
                                            <input required type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="jhon@example.com">
                                            @error('email')
                                            <label style="color:#f00;font-size:12px;" class="form-label">{{ __('translation.Email or password is incorrect') }}</label>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="inputChoosePassword" class="form-label">{{ __('translation.Password') }}</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input required type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="12345678" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>

                                        {{--  <div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">{{ __('translation.Forgot Password ?') }}</a>  --}}
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-success">{{ __('translation.Sign in') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
@endsection
