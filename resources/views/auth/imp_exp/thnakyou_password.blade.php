@extends('layouts.auth')
@section('title','Thankyou')
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
                <!--<h5 class="justify-content-between" style="color: #000;">Please click the password Generation link sent to your email Id to Complete the Registation Process</h5>-->
              </div>
              <form method="POST" action="">
                @csrf
                @if (\Session::has('success'))
                    <div class="alert alert-success" style="font-size: 17px; text-align:center;">
                        {{-- <ul>
                            <li class="font-20">{!! \Session::get('success') !!}</li>
                        </ul>--}}
                        <h4>{!! \Session::get('success') !!}</h4>
                        <p class="text">To Login: <button class="btn btn-primary"><a href="{{route('imp-exp.login')}}" style="color:#fff;"> Click Here </a></button></p>
                    </div>
                @endif

@endsection('content')
