@extends('layouts.auth')
@section('title','Generate Password')
@section('content')
<section class="py-50">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="codex-authbox register mt-4 mb-4">
              <div class="auth-header">
                <div class="codex-brand">
                  <a href="javscript:void(0)">
                    <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                  <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo"></a>
                </div>
                <h4 class="justify-content-between" style="color: #000;">Generate Your Password</h4>
              </div>
              <form method="POST" action="{{ route('icmr.save-password') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">{{ __('Email Id') }}</label>
                    <input id="email" type="text" class="form-control iec_code @error('email') is-invalid @enderror" name="email" value="{{ $email }}" required autocomplete="email" autofocus readonly>
                    @if($errors->has('email'))
                          <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <div class="input-group group-input">
                      <input class="form-control @error('password') is-invalid @enderror" autocomplete="off" name="password" type="password" id="password" placeholder="Enter Your Password" required=""><span class="input-group-text toggle-show fa fa-eye"></span>

                    </div>
                    @if($errors->has('password'))
                         <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="confirm_password">{{ __('confirm password') }}</label>
                    <div class="input-group group-input">
                      <input class="form-control @error('confirm_password') is-invalid @enderror" autocomplete="off" name="confirm_password" type="password" id="confirm_password" placeholder="Re Enter Your Password" required=""><span class="input-group-text toggle-show fa fa-eye"></span>

                    </div>
                    @if($errors->has('confirm_password'))
                      <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                     @endif
                  </div>
                <div class="form-group">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Generate Password') }}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
     $(document).ready(function () {
               $('.iec_code').on('change', function () {
                    var sending_iec_number = $('#iec_code').val();
                    //alert(sending_iec_number);
                    $.ajax({
                        url: '{{url('admin/exportapi') }}',
                        type: 'get',
                        data:{
                          sending_iec_number: sending_iec_number,
                        },
                        dataType: 'json',
                        success: function (res) {
                            console.log(res);
                         $('#name').val(res.entityName);
                        }
                    });
                });
                 });
    </script>
    <script>
        function matchPassword() {
          var pw1 = $("#password").val();
          var pw2 = $("#newpassword").val();
          if(pw1 != pw2)
          {
            alert("Passwords did not match");
          }
        }
        </script>
@endsection('content')
