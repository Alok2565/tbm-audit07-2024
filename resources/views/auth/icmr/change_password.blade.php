@extends('icmr.layouts.admin')
@section('title', 'Change Password')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title-heding text-dark">Change Password</h3>
                <hr>
            </div>
        </div>
    </div>
    {{-- @if(Session::has('success'))
    <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif --}}


    <div class="row">
        <div class="col-md-6">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ Session::get('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-8"> 
        <div class="card">
            <div class="auth-header text-center py-2">
                <div class="auth-icon"><i class="mdi mdi-lock-open" style="font-size: 30px;"></i></div>
                <h3 class="text-dark">Change your password</h3>

            </div>
            <form action="{{ route('icmr.icmrupdate-password') }}" method="POST">
                @csrf
                <div class="card-body py-3">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Enter current password<span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge d-flex">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="current_password" type="password" autocomplete="off" class="form-control @error('current_password') is-invalid @enderror" id="oldPasswordInput" placeholder="current_password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        @if($errors->has('current_password'))
							<span class="text-danger">{{ $errors->first('current_password') }}</span>
						    @endif
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if (session('error'))
                        <span class="text-danger" role="alert">
                            {{ session('error') }}
                        </span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="newPasswordInput" class="form-label">Enter New Password <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge d-flex">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="new_password" type="password" autocomplete="off" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="confirmNewPasswordInput" class="form-label">Enter Confirm Password <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge d-flex">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="confirm_password" type="password" autocomplete="off" class="form-control @error('confirm_password') is-invalid @enderror" id="confirmNewPasswordInput" placeholder="Confirm Password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>

                        </div>
                        @if($errors->has('confirm_password'))
							<span class="text-danger">{{ $errors->first('confirm_password') }}</span>
						    @endif
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Update Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
