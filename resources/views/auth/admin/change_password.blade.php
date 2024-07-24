@extends('admin.layouts.admin')
@section('title', 'Chnage Password')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title-heding text-dark">Change Password</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="auth-header text-center py-2">
                        <div class="auth-icon"><i class="mdi mdi-lock-open" style="font-size: 30px;"></i></div>
                        <h3 class="text-dark">Change your password</h3>
                    </div>
                    <form action="{{ route('admin.update_password') }}" method="POST">
                        @csrf
                        <div class="card-body py-3">
                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge d-flex">
                                    <span class="input-group-text" id="inputGroupPrepend"><i
                                            class="mdi mdi-lock"></i></span>
                                <input name="old_password" type="password" autocomplete="off" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                    </div>
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
                                <label for="newPasswordInput" class="form-label">New Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge d-flex">
                                    <span class="input-group-text" id="inputGroupPrepend"><i
                                            class="mdi mdi-lock"></i></span>
                                <input name="new_password" type="password" autocomplete="off" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <div class="input-group input-group-merge d-flex">
                                    <span class="input-group-text" id="inputGroupPrepend"><i
                                            class="mdi mdi-lock"></i></span>
                                <input name="new_password_confirmation" autocomplete="off" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder="Confirm Password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                            </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
