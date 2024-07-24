@extends('layouts.auth')
@section('title','Reset Password')
@section('content')
<section class="custom_login">
    <div class="container">
        <style>
            .codex-authbox .btn {
                margin-block-start: 0px;
            }

        </style>
        <div class="row">
            <div class="col-12">
                <div class="codex-authbox mt-4 mb-4">
                    <div class="auth-header">
                        @if(Session::has('status'))
				   <p class="alert alert-success">{{ Session::get('status') }}</p>
                        @endif
                        <div class="codex-brand">
                            <a href="javscript:void(0)">
                                <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                                <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo"></a>
                        </div>
                        <h5 class="justify-content-between" style="color: #000; font-weight:600;">Reset your password</h5>
                        <!-- <p class="text-danger" style="text-align: justify;">Please use a unique password that should be different for all your accounts.</p> -->
                    </div>
                    {{-- @if(Session::has('msg'))
				   <p class="alert alert-danger">{{ Session::get('msg') }}</p>
                    @endif --}}
                    <form method="POST" action="{{ route('impexp.submitResetPassword') }}">
                        @csrf
                          {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}

                          <div class="form-group">
                            <label for="emailaddress" class="form-label">{{ __('Iec Code') }}<span class="text-danger">*</span></label>
                            <input type="text" id="iec_code" class="form-control" autocomplete="off" name="iec_code" value="{{$iec_code}}" required autofocus placeholder="Iec Code" readonly>
                                  @if ($errors->has('iec_code'))
                                      <span class="text-danger">{{ $errors->first('iec_code') }}</span>
                                  @endif
                        </div>
                          <div class="form-group">
                              <label for="password" class="col-form-label">Password<span class="text-danger">*</span></label>
                              <input type="password" id="password" class="form-control" name="password" autocomplete="off" required autofocus placeholder="Password">
                              @if ($errors->has('password'))
                                  <span class="text-danger">{{ $errors->first('password') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                              <label for="confirm_password" class="col-form-label">Confirm Password<span class="text-danger">*</span></label>
                              <input type="password" id="confirm_password" class="form-control" autocomplete="off" name="confirm_password" required autofocus placeholder="Confirm Password">
                              @if ($errors->has('confirm_password'))
                                  <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                              @endif
                          </div>
                          <div class="form-group">
                            <div class="captcha d-inline-flex d-flex">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha">
                            @if($errors->has('captcha'))
                            <span class="text-danger">{{ $errors->first('captcha') }}</span>
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
</section>
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: '{{route('icmr.reloadCaptchaIcmrForget')}}',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });

//     $('input').keypress(function( e ) {
//     if(e.which === 32)
//         return false;
// });
</script>
@endsection
