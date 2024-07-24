{{-- @extends('layouts.auth') --}}
@extends('admin.layouts.admin')
@section('title','Registration')
@section('content')
<section class="py-50">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="codex-authbox register mt-4 mb-4">
                        <div class="auth-header">
                            {{-- <div class="codex-brand">
                            <a href="javscript:void(0)">
                                <img class="img-fluid light-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo">
                            <img class="img-fluid dark-logo" src="{{ asset('public/assets/images/icmr_logo.png') }}" alt="logo"></a>
                            </div> --}}
                            <h3 class="justify-content-between text-center" style="color: #000; text-transform:initial !important;">Registration form for ICMR Officers</h3>
                        </div>
                      <form method="POST" action="{{ route('icmr.validate_registration') }}">
                        @csrf
                        <div class="form-group">
                          <label class="form-label">{{ __('Name') }}</label>
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                          @if($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Address') }}</label>
                                    <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>

                                    @if ($errors->has('address'))
                                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                                      @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="form-label">{{ __('Designation') }}</label>
                          <input id="email" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation">
                         @if ($errors->has('designation'))
                            <span class="text-danger text-left">{{ $errors->first('designation') }}</span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="form-label">{{ __('Name of Department') }}</label>
                          <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="department">
                          @if ($errors->has('department'))
                            <span class="text-danger text-left">{{ $errors->first('department') }}</span>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="form-label">{{ __('Email Id') }}</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                         @if ($errors->has('email'))
                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                           @endif
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="mobile_number">{{ __('Mobile Number') }}</label>
                            <div class="input-group group-input">
                                <input id="mobile_number" type="number" maxlength="10" class="form-control @error('mobile_number') is-invalid @enderror" value="{{ old('mobile_number') }}"name="mobile_number" required pattern="[6789][0-9]{9}"/>
                                @if ($errors->has('mobile_number'))
                                    <span class="text-danger text-left">{{ $errors->first('mobile_number') }}</span>
                                 @endif
                            </div>
                        </div>
                        <!-- <div class="form-group">
                          <button class="btn btn-primary mt-2" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button>
                        </div>
                        {{-- <h6 class="mt-2" style="color: #8392a5;">Already have an account? <a class="text-primary" href="{{route('icmr.login')}}">login in here</a></h6> --}} -->
                        <div class="form-group">
                            {{-- <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button> --}}
                            <button type="button" class="btn btn-primary mt-3 m-2" data-bs-toggle="modal" data-bs-target="#multiple-one"><i class="fa fa-paper-plane"></i> {{ __('Register') }}</button>
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
                                                <h4 class="mt-2 py-3" style="font-size: 25px;">Are you Sure ?</h4>
                                                <p class="mt-3 text-dark" style="font-size: 20px;">You want to Register with ICMR for TBM Portal</p>
                                                <button class="btn btn-primary" type="submit" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fa fa-paper-plane"></i> {{ __('Yes') }}</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('No') }}</button>
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
        </div>
      </div>
    </section>

@endsection('content')
