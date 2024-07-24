@extends('layouts.auth')
@section('title','Registration')
@section('content')
<section class="py-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="codex-authbox register mt-4 mb-4">
                    <div class="auth-header">
                        <div class="codex-brand">
                            <a href="javscript:void(0)">
                                <img class="img-fluid light-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo" />
                                <img class="img-fluid dark-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo" />
                            </a>
                        </div>
                        <h4 class="justify-content-between" style="color: #000;">Registration form for importer/exporter</h4>
                    </div>
                    <form method="POST" action="{{ route('sample.validate_registration') }}">
                        @csrf

                                <div class="form-group">
                                    <label class="form-label">{{ __('Importer Exporter Number (IEC)') }}</label>
                                    <input id="iec_code" type="text" class="form-control iec_code @error('iec_code') is-invalid @enderror" name="iec_code" value="{{ old('iec_code') }}" required autocomplete="iec_code" autofocus />
                                    @if($errors->has('iec_code'))
                                    <span class="text-danger">{{ $errors->first('iec_code') }}</span>
                                    @endif
                                    <span class="text-danger" id="no_record_msg">No Record Found</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex">
                                            <button id="show_record" class="btn btn-primary btn-sm m-1 show_hide_btn" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Submit') }}</button>
                                             <button id="reset_data" class="btn btn-primary btn-sm m-1 show_hide_btn" type="reset"><i class="fa fa-paper-plane"></i> {{ __('Reset') }}</button>
                                        </div>
                                </div>
                                <div id="show_hide_form">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" readonly name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->name('name') }}</span>
                                    @endif
                                </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Address') }}</label>
                                    <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>

                                    @if($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-label" for="pincode">Pincode</label>
                              <input class="form-control pincode" name="pincode" id="pincode" type="text" value="" >
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label class="form-label" for="state">State</label>
                            <input class="form-control state" name="state" id="state" type="text" value="" >
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="form-label" for="district">District</label>
                          <input class="form-control district" name="district" id="district" type="text" value="" >
                      </div>
                    </div>

                      </div> -->
                        <!-- <div class="form-group">
                            <label class="form-label">{{ __('Designation') }}</label>
                            <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" />

                            @if($errors->has('designation'))
                            <span class="text-danger">{{ $errors->first('designation') }}</span>
                            @endif
                        </div> -->
                        <div class="form-group">
                            <label class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mobile_number">{{ __('Mobile Number') }}</label>
                            <div class="input-group group-input">
                                <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" required autocomplete="new-password" />
                                @if($errors->has('mobile_number'))
                                <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button>
                        </div>
                                </div>
                        <h6 class="mt-2" style="color: #8392a5;">Already have an account? <a class="text-primary" href="{{route('imp-exp.login')}}">login in here</a></h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<script>
   $(document).ready(function () {
        $('#show_hide_form').hide();
        $('#no_record_msg').hide();
        $('#reset_data').click(function(){
            $('#iec_code').prop('readonly', false);
            $('#no_record_msg').hide ();
        });
   });
</script>
<script type="text/javascript">
    $(document).ready(function () {
              $('.iec_code').on('change', function () {
                   var sending_iec_number = $('#iec_code').val();
                   //alert(sending_iec_number);
                   $.ajax({
                       url: '{{url('imp-exp/exportapi') }}',
                       type: 'get',
                       data:{
                         sending_iec_number: sending_iec_number,
                       },
                       dataType: 'json',
                       success: function (res) {
                        if(res.entityName == undefined)
                        {
                            $('#show_hide_form').hide();
                            $('#no_record_msg').show();
                            $('#iec_code').prop('readonly', true);
                        }else{

                             $('#show_hide_form').show();
                             $('#no_record_msg').hide();
                             $('.show_hide_btn').hide();
                             $('#iec_code').prop('readonly', true);
                        }
                           console.log(res);
                        $('#name').val(res.entityName);
                       }
                   });
               });
                });


</script>

 @endsection('content')
