@extends('layouts.main')
@section('title','Home')
@section('content')
    @include('frontend.pages.home_slider')
    <section class="introduction padd-25">
        <div class="container">
            <div class="row intro">
                <div class="col-md-12">
                    {{-- <h1 class="mainHeading">About us</h1>
                    <p class="homePara">This is just a sample text for about us as ICMR is an Apex body in India for formulation, coordination and promotion of biomedical research Conduct, coordinate and implement medical research for the benefit of the Society Translating medical innovations in to products/processes and introducing them in to the public health system</p> --}}
               </div>

            </div>
        </div>
    </section>
@endsection
