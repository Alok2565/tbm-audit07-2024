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
                        @if(Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                        @endif
                        <div class="codex-brand">
                            <a href="javscript:void(0)">
                                <img class="img-fluid light-logo"
                                    src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                                <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}"
                                    alt="logo"></a>
                        </div>
                        <h5 class="justify-content-between" style="color: #000; font-weight:600;">Login for Exporter
                        </h5>
                    </div>
                    @if(Session::has('msg'))
                    <p class="alert alert-danger">{{ Session::get('msg') }}</p>
                    @endif
                    <form class="login_submit" method="POST" action="{{ route('imp-exp/loginimportexport') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="iec_code">{{ __('Importer-Exporter Code (IEC)') }}</label>
                            <input type="text" name="iec_code" class="form-control" placeholder="IEC Code" autocomplete="off"/>
                            @if($errors->has('iec_code'))
                            <span class="text-danger">{{ $errors->first('iec_code') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="Password">{{ __('Password') }}</label>
                            <span class="float-end"><a href="{{url('imp-exp/forget-password')}}">Reset Password</a></span>

                            <input id="password" type="password" value="" name="password" autocomplete="off"
                                class="form-control" placeholder="Password" />
                            <!-- <input id="pass_enc" value="" type="hidden" name="pass_enc" value="iphshealth" class="form-control" placeholder="Password" /> -->

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
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror"
                                placeholder="Enter Captcha" name="captcha" autocomplete="off">
                        </div>
                        @if($errors->has('captcha'))
                        <span class="text-danger">{{ $errors->first('captcha') }}</span>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-sign-in"></i>
                                {{ __('Login') }}</button>
                        </div>
                        <h6 class="mt-2" style="color: #8392a5">Don't have an account? <a class="text-primary"
                                href="{{route('impexp.registations')}}">{{ __('Register Here') }}</a></h6>
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
    stringify: function(cipherParams) {
        var j = {
            ct: cipherParams.ciphertext.toString(CryptoJS.enc.Base64)
        };
        if (cipherParams.iv) j.iv = cipherParams.iv.toString();
        if (cipherParams.salt) j.s = cipherParams.salt.toString();
        return JSON.stringify(j);
    },
    parse: function(jsonStr) {
        var j = JSON.parse(jsonStr);
        var cipherParams = CryptoJS.lib.CipherParams.create({
            ciphertext: CryptoJS.enc.Base64.parse(j.ct)
        });
        if (j.iv) cipherParams.iv = CryptoJS.enc.Hex.parse(j.iv)
        if (j.s) cipherParams.salt = CryptoJS.enc.Hex.parse(j.s)
        return cipherParams;
    }
}
//var key = "iphshealth";
//var key = generateSalt();

var key = "{{ session('bsrandom') }}";

const form = document.querySelector("form");
form.addEventListener("submit", function(e) {
    e.preventDefault();
    // document.querySelector('#pass_enc').value = key;
    //const passwordInput = this.querySelector("input[type=password]");
    //var passwordInput1 = passwordInput.value;
    const passwordInput = this.querySelector("input[type=password]");
    var passwordInput1 = passwordInput.value;

    passwordInput.value = CryptoJS.AES.encrypt(JSON.stringify(passwordInput1), key, {
        format: CryptoJSAesJson
    }).toString();
    form.submit();

    //});
});
</script>


<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>

<script type="text/javascript">
$('#reload').click(function() {
    $.ajax({
        type: 'GET',
        url: '{{route('impexp_login.reloadCaptcha')}}',
        success: function(data) {
            $(".captcha span").html(data.captcha);
        }
    });
});
</script>
<script src="{{asset('public/assets/js/crypto-js.js')}}"></script>

@endsection