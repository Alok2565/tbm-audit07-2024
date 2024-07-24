@extends('layouts.auth')

@section('content')
<section class="custom_login">
<div class="container">
        <div class="row">
          <div class="col-12">
            <div class="codex-authbox mt-4 mb-4">
              <div class="auth-header">
                <div class="codex-brand">
                  <a href="javscript:void(0)">
                    <img class="img-fluid light-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo">
                  <img class="img-fluid dark-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo"></a>
                </div>
                <h5 class="justify-content-between" style="color: #000; font-weight:600;">Login For Importer/Exporter</h5>
              </div>
              @if($message = Session::get('success'))
			<div class="alert alert-info">
			{{ $message }}
			</div>
		@endif
              <form method="POST" action="{{ route('imp-exp/loginimportexport') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="iec_code">{{ __('Importer/Exporter Code (IEC)') }}</label>
                    <input type="text" name="iec_code" class="form-control" placeholder="IEC Code" />
                    @if($errors->has('iec_code'))
                        <span class="text-danger">{{ $errors->iec_code('iec_code') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label" for="Password">{{ __('Password') }}</label>
                    <div class="input-group group-input">
                        <input type="password" name="password" class="form-control" placeholder="Password" />
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->password('password') }}</span>
						@endif
                    </div>
                </div>
                <div class="form-group mb-0 mt-2">
                    <div class="auth-remember">
                        <div class="form-check custom-chek">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                        </div>
                        @if (Route::has('password.request'))
                        <a class="text-primary f-pwd" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> {{ __('Login') }}</button>
                </div>
                <h6 class="mt-2" style="color: #8392a5">don't have an account? <a class="text-primary" href="{{route('impexp.register')}}">{{ __('Register Here') }}</a></h6>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
