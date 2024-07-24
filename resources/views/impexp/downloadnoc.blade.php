@extends('impexp.layouts.admin')
@section('content')
<section class="exporter-section mt-3">
    <div class="container">
	<h2 class="py-2 px-2 text-center text-dark">For Office use only</h2>

            <div class="card custom-card">
                <div class="form-card-tite text-white">
                    <p class="title-items" style="font-weight: 600">NOC for Export<a target="_blank" style="float: inline-end;" href="{{ asset('assets/backend/images/export.pdf') }}"><button class="btn btn float-right" style="color:white">Download <i class="mdi mdi-download-box" style="font-size: 20px;"></i></button></a></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <p>This is to certify that----------------------------------------- (Name of the applicant and company) has been granted permission to export ------------------------------(Number and Description of the Samples) to -------------------(Name and Company of recipient) in----------------------------------------(Country of Destination) for the purpose of -----------------------------------------------------------------(Description of the type(s) of investigations or analysis to be conducted on the samples). This approval is valid for a period of 90 (Ninety) days with effect from the date of authorization.</p>
                    </div>
                </div>
            </div>



    </div>
</section>
<section class="exporter-section mt-3">
    <div class="container">
	<h2 class="py-2 px-2 text-center text-dark">For Office use only</h2>

            <div class="card custom-card">
                <div class="form-card-tite text-white">
                    <p class="title-items" style="font-weight: 600">NOC for Import<a target="_blank" style="float: inline-end;" href="{{ asset('assets/backend/images/import.pdf') }}"><button class="btn btn float-right" style="color:white">Download <i class="mdi mdi-download-box" style="font-size: 20px;"></i></button></a></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group mt-2">
                        <p>This is to certify that----------------------------------------- (Name of the applicant and company)has been granted permission to import ------------------------------(Number and Description of
                            the Samples) from -------------------(Name and Company of sendre) in----------------------------------------(Country of Destination) for the purpose of -----------------------------------------------------------------(Description of the type(s) of investigations or analyses, as mentioned in this application, to be conducted on the samples). This approval is valid for a period of 90 (Ninety) days with effect from the date of
                            authorization.</p>
                    </div>
                </div>
            </div>



    </div>
</section>
@endsection
