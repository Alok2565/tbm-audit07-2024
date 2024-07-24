@extends('layouts.main')
@section('title','About us')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-info">
{{ $message }}
</div>
@endif
<section class="containter-xxl section" style="background-image: url({{ url('public/assets/images/bg-bredcrumb.jpg') }});">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="page-title">
                <nav class="py-lg-5 p-5">
                    <h1 class="font-weight-bold" style="color: #132573">About Us</h1>
                </nav>
            </div>

        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="page-title-item">
            <nav class="py-lg-">
            <ol class="breadcrumb m-0 p-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <li class="breadcrumb-item text-white" style="font-weight:700; font-size:17px;"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active" style="color:#132573; font-weight:700; font-size:17px;"><strong>About us</strong></li>
            </ol>
        </nav>
        </div>
    </div>
</section>
		<section class="introduction padd-25">
            <div class="container">
                <div class="row intro">
                    <div class="col-md-12">
                        <h1 class="mainHeading">About us</h1>
                        <!-- <p class="homePara" style="text-align: justify;">Indian Council of Medical Research under Department of Health Research, Ministry of Health and Family Welfare, Government of India has developed an online portal for providing No Objection Certificate (NOC) related to the transfer of human biological material for commercial purposes/ contract research by Indian companies/organizations. </p>
                        <p class="homePara" style="text-align: justify;">This secure online platform enables applicants to obtain the necessary NOC for the export of human biological material for the said purpose.</p>
                        <p class="homePara" style="text-align: justify;">The portal will strengthen interdepartmental synergies and increase efficacy in functioning of GoI Departments/ Agencies involved in the consideration of cases related to transfer of human biological material. This will streamline the regulatory process and ensure transparent and regulated export of human biological material in compliance with national regulations.</p> -->

                         <p class="homePara" style="text-align: justify;">Indian Council of Medical Research under Department of Health Research, Ministry of Health and Family Welfare, Government of India has developed an online portal for providing No Objection Certificate (NOC) related to the transfer of human biological material for commercial purposes/ contract research by Indian companies/organizations. </p>
                        <p class="homePara" style="text-align: justify;">This secure online platform enables applicants to obtain the necessary NOC for the export of human biological material for the said purpose.</p>
                        <p class="homePara" style="text-align: justify;">The portal will strengthen interdepartmental synergies and increase efficacy in functioning of GoI Departments/ Agencies involved in the consideration of cases related to transfer of human biological material. This will streamline the regulatory process and ensure transparent and regulated export of human biological material in compliance with national regulations.</p>
                        <p>Before applying please read the <span style="border-bottom:1px solid #111;"><a href="https://main.icmr.nic.in/node/46876" target="_blank">guidelines</a></span> available on ICMR website.</p>

                    </div>

                </div>
            </div>
        </section>



@endsection('content')

