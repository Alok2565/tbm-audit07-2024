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

              </div>
              <form method="POST" action="{{ route('sample.validate_registration') }}">
                @csrf
                @if (\Session::has('success'))
    <div class="alert alert-success">
        <h4>{!! \Session::get('success') !!}</h4>
    </div>
@endif

@endsection('content')