@extends('layouts.auth')
@section('title','Login')
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
                        <h5 class="justify-content-between" style="color: #000; font-weight:600;">Reset Your Password</h5>
                        <p class="text-dark mb-4">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                    </div>
                    {{-- @if(Session::has('msg'))
				   <p class="alert alert-danger">{{ Session::get('msg') }}</p>
                    @endif --}}
                    <form method="POST" action="{{ route('icmr.icmrsubmitForgetPassword') }}">
                        @csrf
                        <div class="form-group">
                            <label for="emailaddress" class="form-label">{{ __('Email address') }}<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" autocomplete="off" id="emailaddress" placeholder="Enter your email" />
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
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
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" autocomplete="off" placeholder="Enter Captcha" name="captcha">
                            @if($errors->has('captcha'))
                            <span class="text-danger">{{ $errors->first('captcha') }}</span>
                        @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i> {{ __('Send Reset Link') }}</button>
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
            url: '{{route('impexp.reloadCaptchaImpexpForget')}}',
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
