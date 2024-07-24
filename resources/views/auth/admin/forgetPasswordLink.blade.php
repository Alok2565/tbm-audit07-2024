@extends('layouts.auth')
@section('title','Reset Password')
@section('content')
<div class="container py-3">
    <div class="row">
      <div class="col-12">
    <div class="codex-authbox">
        <div class="auth-header">
            <div class="auth-icon"><i class="fa fa-unlock-alt"></i></div>
        <div class="codex-brand">
            <a href="javscript:void(0)">
              <img class="img-fluid light-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo">
            <img class="img-fluid dark-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo"></a>
          </div>
          <h3>Forgot your password                 </h3>
        </div>

        <form action="{{ route('reset.password.post') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="email_address" class="form-label text-md-right">{{__('Email Address')}}<span class="text-danger">*</span></label>
                    <input type="text" id="email_address" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
            </div>

            <div class="form-group">
                <label for="password" class="form-label text-md-right">{{__('Password')}} <span class="text-danger">*</span></label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif

            </div>

            <div class="form-group">
                <label for="password-confirm" class="form-label text-md-right">{{__('Confirm Password')}} <span class="text-danger">*</span></label>
                    <input type="password" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="off" name="password_confirmation">
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif

            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
      </div>
    </div>
</div>


                      {{-- <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">

                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                  @endif
                              </div>
                          </div>

                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Reset Password
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main> --}}
@endsection
