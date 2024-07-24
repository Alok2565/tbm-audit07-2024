@extends('layouts.auth')
@section('title','Registration')
@section('content')
<section class="py-50">
<style>
.codex-authbox .btn {margin-block-start: 0px;}
</style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="codex-authbox register mt-4 mb-4">
                    <div class="auth-header">
                        <div class="codex-brand">
                            <a href="javscript:void(0)">
                                <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo" />
                                <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo" />
                            </a>
                        </div>
                        {{-- <h4 class="justify-content-between" style="color: #000;">Registration form for Exporter</h4> --}}
                        <h4 class="justify-content-between" style="color: #000;">Registration form for Applicant</h4>
                    </div>
                    <form method="POST" action="{{ route('sample.validate_registration') }}">
                        @csrf
                            {{-- {{ App\Models\ImpExpUse::getIecCodeById(1) }} --}}
                                <div class="form-group">
                                    <label class="form-label">{{ __('Importer-Exporter Code (IEC)') }} <span style="font-size: x-large;color:red;">*</span></label>
                                    <input id="iec_code" type="text" class="form-control iec_code @error('iec_code') is-invalid @enderror" name="iec_code" value="{{ old('iec_code') }}" required autocomplete="off" autofocus maxlength="10" onkeyup="validate()"/>

									@if($errors->has('iec_code'))
                                    <span class="text-danger">{{ $errors->first('iec_code') }}</span>
                                    @endif
                                    <span class="text-danger" id="no_record_msg"><strong>The entered IEC is invalid.</strong></span>
                                    <!-- <span class="text-danger" style="display:none" id="record_exist">Use another IEC number.</span> -->
                                    <span class="text-danger" style="display:none" id="record_exist">The IEC already exist.</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group d-flex">
                                            <button id="show_record" disabled class="btn btn-primary btn-sm m-1 show_hide_btn" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Submit') }}</button>
                                             <button id="reset_data" class="btn btn-primary btn-sm m-1 show_hide_btn" type="reset"><i class="fa fa-paper-plane"></i> {{ __('Reset') }}</button>
                                        </div>
                                </div>
                                <div style="margin-top:-22px;" id="show_hide_form">
                                    <div class="row">
                                    <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" readonly onkeyup="validate()"/>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                </div>
							</div>
							<div class="row">
                                <div class="col-md-6">
								<div class="form-group">
									<label class="form-label">{{ __('Name of Contact Person ') }} <span style="font-size: x-large;color:red;">*</span></label>
									<input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="off" onkeyup="validate();"/>
									@if($errors->has('department'))
									<span class="text-danger">{{ $errors->first('department') }}</span>

									@endif
								</div>
							</div>

                                    <div class="col-md-6">
									<div class="form-group">
										<label class="form-label">{{ __('Designation of Contact Person') }}<span style="font-size: x-large;color:red;">*</span></label>
										<input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="off" onkeyup="validate()"/>

										@if($errors->has('designation'))
										<span class="text-danger">{{ $errors->first('designation') }}</span>
										@endif
									</div>
								</div>
							</div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Address') }}</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="off" readonly onkeyup="validate();"/>
                                    @if($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Address 2') }}</label>

                                    <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror" name="address2" value="{{ old('address2') }}" required autocomplete="off" readonly onkeyup="validate();"/>
                                    @if($errors->has('address2'))
                                    <span class="text-danger">{{ $errors->first('address2') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">{{ __('City') }}</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="off" readonly onkeyup="validate();"/>

                            @if($errors->has('city'))
                            <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
                            <label class="form-label">{{ __('State') }}</label>
                            <input id="states" type="text" class="form-control @error('states') is-invalid @enderror" name="states" value="{{ old('states') }}" required autocomplete="off" readonly onkeyup="validate();"/>

                            @if($errors->has('states'))
                            <span class="text-danger">{{ $errors->first('states') }}</span>
                            @endif
                        </div>
						</div>
						<div class="row">
						  <div class="col-md-6">
							<div class="form-group">
									<label class="form-label">{{ __('Pincode') }}</label>
									<input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" required autocomplete="off" readonly onkeyup="validate();"/>

									@if($errors->has('pincode'))
									<span class="text-danger">{{ $errors->first('pincode') }}</span>
									@endif
							</div>
						</div>
						<div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" onkeyup="validate();"/>
                            @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
					</div>
					</div>
					<div class="row">
					  <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="mobile_number">{{ __('Mobile Number') }}</label>
                            <div class="input-group group-input">
                                <input id="mobile_number" type="text" maxlength="10" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" autocomplete="off" readonly required pattern="[6789][0-9]{9}"/>
                                @if($errors->has('mobile_number'))
                                <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                                @endif
                            </div>
                        </div>
						<span style="color:red;">* Please fill the all mandatory Input Fields</span>
						</div>
						<div class="col-md-6">
                        <label class="form-label" for="captcha">{{ __('Enter Captcha') }} <span style="font-size: x-large;color:red;">*</span></label>
                         <div class="form-group mb-4">
                            <input id="captcha" type="text" class="form-control @error('captcha') is-invalid @enderror" placeholder="Enter Captcha" name="captcha" autocomplete="off">
                        </div>
                                  @if($errors->has('captcha'))
                                    <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                @endif
							<div class="form-group">
								<div class="captcha d-inline-flex d-flex">
									<span>{!! captcha_img() !!}</span>
									<button type="button" class="btn btn-danger" class="reload" id="reload">
										&#x21bb;
									</button>
								</div>
							</div>
						</div>

                        <!-- <div class="form-group">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button>
                        </div>
                                </div>
                        <h6 class="mt-2" style="color: #8392a5;">Already have an account? <a class="text-primary" href="{{route('imp-exp.login')}}">login in here</a></h6> -->
                        <div class="form-group">
                            {{-- <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button> --}}
                            <button id="register" type="button" disabled class="btn btn-primary mt-3 m-2" data-bs-toggle="modal" data-bs-target="#multiple-one"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button>
                        </div>

                                </div>
                        <div class="tab-pane show active" id="modal-multiple-preview">
                            <!-- Modal -->
                            <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <i class="fa-classic fas fa-seal-exclamation fa-fw fa-xl"></i>
                                                <h4 class="mt-2 py-3 " style="font-size: 25px;">Are you Sure ?</h4>
                                                <p class="mt-3 text-dark" style="font-size: 20px;">You want to Register on the THBM Portal.</p>
                                               <p class="d-flex"> <button class="btn btn-primary" type="submit" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-paper-plane"></i> {{ __('Yes') }}</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button></p>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script>
function validate() {
    var nameElement = document.getElementById('name');
    var departmentElement = document.getElementById('department');
    var designationElement = document.getElementById('designation');
    var addressElement = document.getElementById('address');
    //var address2Element = document.getElementById('address2');
    var cityElement = document.getElementById('city');
    var statesElement = document.getElementById('states');
    var pincodeElement = document.getElementById('pincode');
    var emailElement = document.getElementById('email');
    var mobile_numberElement = document.getElementById('mobile_number');

    if (nameElement) {
        nameElement.value = nameElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (departmentElement) {
        departmentElement.value = departmentElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (designationElement) {
        designationElement.value = designationElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (addressElement) {
        addressElement.value = addressElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (cityElement) {
        cityElement.value = cityElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (statesElement) {
        statesElement.value = statesElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (pincodeElement) {
        pincodeElement.value = pincodeElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (emailElement) {
        emailElement.value = emailElement.value.replace(/[^a-zA-Z0-9@ .]+/g, '');
    }
    if (mobile_numberElement) {
        mobile_numberElement.value = mobile_numberElement.value.replace(/[^a-zA-Z0-9@]+/g, '');
    }
}

</script>
<script>
   $(document).ready(function () {
        $('#show_hide_form').hide();
        $('#no_record_msg').hide();
        $('#reset_data').click(function(){
            $('#iec_code').prop('readonly', false);
            $('#no_record_msg').hide ();
			$('#show_hide_form').hide();
            $('#record_exist').hide();
        });
   });
</script>
<script type="text/javascript">
    $(document).ready(function () {
              $('#show_record').on('click', function () {
                   var sending_iec_number = $('#iec_code').val();
                   //alert(sending_iec_number);
				   if(sending_iec_number != ''){
                   $.ajax({
                       url: '{{url('imp-exp/impexpapi') }}',
                       type: 'get',
                       data:{
                         sending_iec_number: sending_iec_number,
                       },
                       dataType: 'json',
                       success: function (res) {
                        if(res.error == 'record_not_found')
                        {
                            $('#show_hide_form').hide();
                            $('#no_record_msg').show();
                            $('#record_exist').hide();
                            $('#iec_code').prop('readonly', true);
                        }else if(res.error == 'record_exist'){
                            $('#show_hide_form').hide();
                            $('#record_exist').show();
                        }else{

                             $('#show_hide_form').show();
                             $('#no_record_msg').hide();
                             $('.show_hide_btn').hide();
                             $('#record_exist').hide();
                             $('#iec_code').prop('readonly', true);
                        }
                           console.log(res);
                        $('#name').val(res.entityName);
                        $('#address').val(res.addressLine1);
                        $('#address2').val(res.addressLine2);
                        $('#city').val(res.city);
                        $('#states').val(res.state);
                        $('#pincode').val(res.pin);
						$('#mobile_number').val(res.contactNo);
						//$('#email').val(res.email);
                       }
                   });
				   }
               });
                });


</script>
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: '{{route('impexp_register.reloadCaptcha')}}',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>

	<script type="text/javascript">
        $('#iec_code').keyup(function () {
			var value = $('#iec_code').val();
			var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;


			if(value == '' ){
				$('#show_record').prop("disabled", true);
			}else if(format.test(value)){
				$('#show_record').prop("disabled", true);
			}else if(value.length !== 10){
				$('#show_record').prop("disabled", true);
			}else{

				$('#show_record').prop("disabled", false);
			}
        });

		 $('#email, #department, #designation ,#captcha').keyup(function () {
			var department = $('#department').val();
			var designation = $('#designation').val();
			var email = $('#email').val();
			var captcha = $('#captcha').val();

			if(department == '' || designation == '' || email == ''|| captcha == ''){
				//$('.show_record').attr("disabled");
				$('#register').prop("disabled", true);
			}else{

				//$('.show_record').removeAttr("disabled");
				$('#register').prop("disabled", false);
			}
        });
    </script>
	 <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        // function isAlfa(evt) {
        //     evt = (evt) ? evt : window.event;
        //     var charCode = (evt.which) ? evt.which : evt.keyCode;
        //     if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        //         return false;
        //     }
        //     return true;
        // }
    </script>

 @endsection('content')