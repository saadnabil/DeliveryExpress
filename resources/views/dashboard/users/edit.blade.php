@extends('dashboard.master')
@section('content')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">{{ __('translation.Edit Admin') }}</h5>
            <hr />
            <form class="form-body mt-4" method="post" action="{{ route('users.update' , $user) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('translation.Name') }}</label>
                                <input required name="name" value="{{ old('name' , $user->name) }}" type="text"
                                    class="form-control @error('name') error-input @enderror" id="name"
                                    >
                                @error('name')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="email" class="form-label">{{ __('translation.Email') }}</label>
                                <input required name="email" value="{{ old('email', $user->email) }}" type="text"
                                    class="form-control @error('email') error-input @enderror" id="email"
                                    >
                                @error('email')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="password" class="form-label">{{ __('translation.Password') }}</label>
                                <input  name="password" value="{{ old('password') }}" type="text"
                                    class="form-control @error('password') error-input @enderror" id="password">
                                @error('password')
                                    <div class="error-validation">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('translation.Role') }}:</label>
                                <select  requierd name="role_id"
                                    class="form-select mb-3 @error('role_id') error-input @enderror"
                                    aria-label="Default select example">
                                    <option>{{ __('translation.Select Role') }}</option>
                                    @php
                                        $user_roles = $user -> roles->pluck('id') -> toarray();
                                    @endphp
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"{{ in_array($role -> id , $user_roles) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
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

