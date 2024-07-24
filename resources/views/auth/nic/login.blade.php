@extends('layouts.auth')
@section('title','Login')
@section('content')
<section class="custom_login">
    <style>
        .codex-authbox .btn {
    margin-block-start: 0px;
}
    </style>
	
<div class="container">
        <div class="row">
          <div class="col-12">
            <div class="codex-authbox mt-4 mb-4">
              <div class="auth-header">
                <div class="codex-brand">
                  <a href="javscript:void(0)">
                    <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                    <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo"></a>
                </div>

                <h5 class="justify-content-between" style="color: #000; font-weight:600;">Login for Nic Officer</h5>
              </div>
             @if(Session::has('msg'))
				   <p class="alert alert-danger">{{ session('msg') }}</p>
			   @endif
                
              <form method="POST" action="{{ route('nic.validate_login') }}">
                @csrf
                <div class="form-group">
				
                    <label class="form-label" for="email">{{ __('Email Id') }}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="off" autofocus/>
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label" for="Password">{{ __('Password') }}</label>
						<span class="float-end"><a href="{{url('nic/forget-password')}}">Reset Password</a></span>

                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
						<!--<input id="pass_enc" value="" type="hidden" name="pass_enc" value="iphshealth" class="form-control" placeholder="Password" />-->
						@if($errors->has('password'))
							<span class="text-danger">{{ $errors->first('password') }}</span>
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
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" onclick="encryptPassword();"><i class="fa fa-sign-in"></i> {{ __('Login') }}</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
   <script src="{{asset('public/assets/js/crypto-js.min.js')}}"></script>
    <script>
         function generateSalt() {
            return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        }
/*function mySubmit() {
    //alert('gfhjgfhas');
  /*var pwdObj = document.getElementById('password');

var encrypted = CryptoJS.AES.encrypt(pwdObj);
//var decrypted = CryptoJS.AES.decrypt(pwdObj);
alert(encrypted);
}*/
var CryptoJSAesJson = {
    stringify: function (cipherParams) {
        var j = {ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)};
        if (cipherParams.iv) j.iv = cipherParams.iv.toString();
        if (cipherParams.salt) j.s = cipherParams.salt.toString();
        return JSON.stringify(j);
    },
    parse: function (jsonStr) {
        var j = JSON.parse(jsonStr);
        var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Base64.parse(j.ct)});
        if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
        if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
        return cipherParams;
    }
}
//var key = "iphshealth";
//var key=generateSalt();
var key = "{{ session('bsrandom') }}";
  const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        //document.querySelector('#pass_enc').value = key;
        //const passwordInput = this.querySelector("input[type=password]");
		//var passwordInput1 =passwordInput.value;		
 const passwordInput = this.querySelector("input[type=password]");
    var passwordInput1 = passwordInput.value;		
            passwordInput.value =CryptoJS.AES.encrypt(JSON.stringify(passwordInput1), key, {format: CryptoJSAesJson}).toString();			
            form.submit();
			
        //});
    });
</script>
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{route('nic_login.reloadCaptcha')}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
	// 	$('input').keypress(function( e ) {
    //     if(e.which === 32)
    //         return false;
    // });
    </script>


@endsection