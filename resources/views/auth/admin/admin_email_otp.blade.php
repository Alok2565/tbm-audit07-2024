@extends('layouts.auth')
@section('content')
<section class="custom_login py-5">
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
                @if(Session::has('success'))
				   <p class="alert alert-success">{{ Session::get('success') }}</p>
			   @endif
                <div class="codex-brand">
                  <a href="javscript:void(0)">
                    <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                  <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo"></a>
                  <h5 class="text-center">Please enter the OTP send on your registered email address.</h5>
                </div>
                {{-- <h5 class="justify-content-between" style="color: #000; font-weight:600;">Login for Exporter</h5> --}}
              </div>
               @if(Session::has('msg'))
				   <p class="alert alert-danger">{{ Session::get('msg') }}</p>
			   @endif
              <form class="login_submit" method="POST" action="{{ url('admin/admin_otp_submit') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="email_otp">{{ __('One Time Password') }}</label>
                    <input id="email_otp" type="text" name="email_otp" autocomplete="off" class="form-control @error('email_otp') is-invalid @enderror" placeholder="Enter OTP" />
                    @if($errors->has('email_otp'))
                        <span class="text-danger">{{ $errors->first('email_otp') }}</span>
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
                    <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha" autocomplete="off">
                    @if($errors->has('captcha'))
							<span class="text-danger">{{ $errors->first('captcha') }}</span>
						@endif
                </div>
                <div class="form-group">
                    <button id="show_email_otp" disabled class="btn btn-primary hide_email_otp_btn" type="submit"><i class="fa fa-sign-in"></i> {{ __('Verify') }}</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{ asset('public/assets/js') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/assets/js') }}/jquery.min.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $('#email_otp').keyup(function () {
			var value = $('#email_otp').val();
			var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;


			if(value == '' ){
				//$('.show_record').attr("disabled");
				$('#show_email_otp').prop("disabled", true);
			}else if(format.test(value)){
				$('#show_email_otp').prop("disabled", true);
			}else if(value.length !== 6){
				$('#show_email_otp').prop("disabled", true);
			}else{

				//$('.show_record').removeAttr("disabled");
				$('#show_email_otp').prop("disabled", false);
			}
        });
        });
    </script> -->
    <script type="text/javascript">
       $(document).ready(function () {
            $('#email_otp, #captcha').keyup(function () {
			var value = $('#email_otp').val();
            var value_cpt = $('#captcha').val();
			var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

			if(value == '' || value_cpt =='' ){
				//$('.show_record').attr("disabled");
				$('#show_email_otp').prop("disabled", true);
			}else if(format.test(value)){
				$('#show_email_otp').prop("disabled", true);
			}else if(value.length !== 6){
				$('#show_email_otp').prop("disabled", true);
			}else if(value_cpt.length !== 6){
				$('#show_email_otp').prop("disabled", true);
			}
            else{

				//$('.show_record').removeAttr("disabled");
				$('#show_email_otp').prop("disabled", false);
			}
        });
        });
    </script>

<script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{route('admin_login_captch')}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
		
	// 	$('input').keypress(function( e ) {
    //     if(e.which === 32) 
    //         return false;
    // });
//     </script>

@endsection