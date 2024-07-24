@extends('layouts.auth')
@section('title','Generate Password')
@section('content')
<section class="py-50">
      <div class="container">
      <style>
    .alert-success {
    --ct-alert-color: #0ac58f;
    --ct-alert-bg: rgba(10, 207, 151, 0.18);
    --ct-alert-border-color: rgba(10, 207, 151, 0.25);
    width: 50%;
    position: absolute;
    z-index: 11;
    left: 25%;
    height: auto;
    box-shadow: 2px 3px 10px 0px rgba(0,0,0,0.5);
}
</style>
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
                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
                    <p style="font-size: 17px; text-align:center;"><strong>Success - </strong> {{ session('success') }}</p>
                    <h5 class="mt-2" style="color:#fff; font-style:italic">Please Login Continue :<a class="text-justify;" style="color: red" href="{{route('imp-exp.login')}}"> &nbsp;Login Here </a></h5>
                </div>
                @endif
              </div>
              <form method="POST" action="{{ route('password.save-password') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">{{ __('Exporter Code (IEC)') }}</label>
                    <input id="iec_code" type="text" class="form-control iec_code @error('iec_code') is-invalid @enderror" name="iec_code" value="{{ $iec_code }}" required autocomplete="iec_code" autofocus readonly>
                    @if($errors->has('iec_code'))
                          <span class="text-danger">{{ $errors->first('iec_code') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <div class="input-group group-input">
                      <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" autocomplete="off" placeholder="Enter Your Password" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$"><span class="input-group-text toggle-show fa fa-eye"></span>

                    </div>
                    @if($errors->has('password'))
                         <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                  </div>
                  <div class="form-group">
                    <label class="form-label" for="confirm_password">{{ __('confirm password') }}</label>
                    <div class="input-group group-input">
                      <input class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" type="password" autocomplete="off" id="confirm_password" placeholder="Re Enter Your Password" required="" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,24}$"><span class="input-group-text toggle-show fa fa-eye"></span>

                    </div>
                    @if($errors->has('confirm_password'))
                      <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                     @endif
                  </div>
                
                <div class="form-group">
                    

                  <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Generate Password') }}</button> 
                </div>
                <div class="tab-pane show active" id="modal-multiple-preview">
                    <!-- Modal -->
                    <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="text-center">
                                        <i class="fa-classic fas fa-seal-exclamation fa-fw fa-xl"></i>
                                        <!-- <h4 class="mt-2 py-3" style="font-size: 25px;">Are you Sure ?</h4> -->
                                        <p class="mt-3 text-warning" style="font-size: 20px;">Password Generated Successfully..</p>
                                        <button class="btn btn-primary" type="submit" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-paper-plane"></i> {{ __('Yes, Please Continue') }}</button>
                                        {{-- <button type="submit" class="btn btn-primary" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal">Yes, Submit Please</button> --}}
                                        {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button> --}}
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div> <!-- end preview-->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
     $(document).ready(function () {
               $('.iec_code').on('change', function () {
                    var sending_iec_number = $('#iec_code').val();
                    //alert(sending_iec_number);
                    $.ajax({
                        url: '{{url('admin/exportapi')}}',
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
