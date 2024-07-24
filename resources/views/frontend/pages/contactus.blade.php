@extends('layouts.main')
@section('title','Contact us')
@section('content')
{{-- @if($message = Session::get('success'))
<div class="alert alert-info">
{{ $message }}
</div>
@endif --}}
<section class="containter-xxl section" style="background-image: url({{ url('public/assets/images/bg-bredcrumb.jpg') }});">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="page-title">
                <nav class="py-lg-5 p-5">
                    <h1 class="font-weight-bold" style="color: #132573">Contact us</h1>
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
                <li class="breadcrumb-item active" style="color:#132573; font-weight:700; font-size:17px;"><strong>Contact us</strong></li>
            </ol>
        </nav>
        </div>
    </div>
</section>
		<section class="introduction padd-25">
            <div class="container">
                <div class="row intro">
                    <div class="col-md-12">
                        <h1 class="mainHeading">Contact us</h1>
                        <p style="text-align:justify;"><span>Transfer of Human Biological Material Secretariat</span><br/> 
                        <span>International Health Division</span><br/><span>Indian Council of Medical Research</span><br>
                        <span>V. Ramalingaswami Bhawan, P.O. Box No. 4911</span><br>
                        <span>Ansari Nagar, New Delhi - 110029, India</span>
                    </p>
                        <p style="text-align:justify;"> Email ID : thbm[dot]hq[at]icmr[dot]gov[dot]in</p>
                        <p style="text-align:justify;">Phone Number: 011-26588755</p>
                    </div>

                </div>
            </div>
        </section>

@endsection('content')

