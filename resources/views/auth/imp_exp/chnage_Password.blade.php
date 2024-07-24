@extends('impexp.layouts.admin')
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

    <div class="row">
        <div class="col-md-6">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <div>{{ Session::get('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="auth-header text-center py-2">
                <div class="auth-icon"><i class="mdi mdi-lock-open" style="font-size: 30px;"></i></div>
                <h3 class="text-dark">Change your password</h3>

            </div>
            <form action="{{ route('impexp.update-password') }}" method="POST">
                @csrf
                <div class="card-body py-3">
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Old Password <span class="text-danger">*</span></label>
                        <div class="input-group input-group-merge d-flex">
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="current_password" type="password" autocomplete="off" class="form-control @error('current_password') is-invalid @enderror" id="oldPasswordInput" placeholder="current_password">
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
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="new_password" type="password" autocomplete="off" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
                            <input id="pass_enc" value="" type="hidden" name="pass_enc" value="iphshealth" class="form-control" placeholder="Password" />

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
                            <span class="input-group-text" id="inputGroupPrepend"><i class="mdi mdi-lock"></i></span>
                            <input name="confirm_password" type="password" autocomplete="off" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm Password">
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
var key=generateSalt();

  const form = document.querySelector("form");
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        document.querySelector('#pass_enc').value = key;
        const passwordInput = this.querySelector("input[type=password]");
		var passwordInput1 =passwordInput.value;			
            passwordInput.value =CryptoJS.AES.encrypt(JSON.stringify(passwordInput1), key, {format: CryptoJSAesJson}).toString();			
            form.submit();
			
        //});
    });
</script>
@endsection
