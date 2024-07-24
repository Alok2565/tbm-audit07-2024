@extends('layouts.auth')
@section('title','Forgot Password')
@section('content')
<div class="container py-3">
    <div class="row">
      <div class="col-12">
    <div class="codex-authbox">
        <div class="auth-header">
            <div class="auth-icon"><i class="fa fa-unlock-alt"></i></div>
        {{-- <div class="codex-brand">
            <a href="javscript:void(0)">
              <img class="img-fluid light-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo">
            <img class="img-fluid dark-logo" src="{{ asset('assets/images/icmr_logo.png') }}" alt="logo"></a>
          </div> --}}
          <h3>Forgot your password                 </h3>
        {{-- @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
           {{-- {{ Session::get('message') }}
           @php
               echo Session::get('message');
           @endphp --}}

        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible bg-danger text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            @php
               echo Session::get('message');
           @endphp
        </div>
        @endif
      </div>
      <form action="{{ route('forget.password.post') }}" method="POST">
        @csrf
        <div class="form-group mb-0">
          <label class="form-label">{{__('Email Address')}} <span class="text-danger">*</span></label>
          <input type="text" id="email_address" class="form-control @error('email') is_invalid @enderror" autocomplete="off" name="email" placeholder="Email Address">
          @if ($errors->has('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif
        </div>
        <div class="form-group mb-0">
          <button class="btn btn-primary" type="submit"><i class="fa fa-key"></i> Send Reset Link</button>
        </div>
      </form>
    </div>
  </div>
    </div>
</div>
@endsection
