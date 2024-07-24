@extends('nic.layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="page-title-box">
        <h3 class="text-dark">Nic Dashboard</h3>
        <div class="card">
            <div class="card-body">
        {{-- <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div style="background-color: #688A22;border-radius: 10px;" class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="fw-normal mt-0 text-truncate text-white" title="Campaign Sent"><strong>Total
                                        Import Application</strong></h5>
                                <h3 class="my-2 py-1 text-white"> {{$totalImport}}<span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                <a href="{{url('nic/import')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #67707F; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="New Leads"><b>Pending Import
                                        Application</b></h5>
                                <h3 class="my-2 py-1 text-white"> 0 <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-edit-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #D12E00; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Deals"><b>Reject Import
                                        Application</b></h5>
                                <h3 class="my-2 py-1 text-white"> 0 <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-excel-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #F78800; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Booked Revenue"><b>Pending Import
                                        Noc</b></h5>
                                <h3 class="my-2 py-1 text-white"> 0 <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-edit-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                <span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> --}}
        <div class="row">
		<div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #00d11a94; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Deals"><b>Total Exporters Registered</b></h5>
                                <h3 class="my-2 py-1 text-white"> {{$totaluser}} <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <a href="{{url('nic/user-list')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div style="background-color: #688A22;border-radius: 10px;" class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Campaign Sent"><b>
                                        Total Applications Received</b></h5>
                                <h3 class="my-2 py-1 text-white"> {{$totalExporter}}  <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                <a href="{{url('nic/exporter')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #67707F; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                
                                            <h5 class="text-white fw-normal mt-0 text-truncate" title="New Leads"><b>
                                        Applications Pending at ICMR</b></h5>
                                <h3 class="text-white">0 <span class="text-success float-end"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                            
                                <p class="mb-0 text-left">
                                     <a href="javascript:void(0)"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

			
			<div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #00d197; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Deals"><b>
                                        Applications Pending at Committee</b></h5>
                                <h3 class="my-2 text-white"> {{$assigncommiteeExporter}} <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <a href="javascript:void(0)"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #F78800; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Booked Revenue"><b>
                                Total NOC Issued</b></h5>
                                <h3 class="my-2 py-1 text-white"> {{$totalNocIssued}} <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <a href="javascript:void(0)"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body" style="background-color: #D12E00; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-white fw-normal mt-0 text-truncate" title="Deals"><b>Total Applications Rejected</b></h5>
                                <h3 class="my-2 py-1 text-white"> {{$rejectExporter}} <span class="text-success float-end me-2"><i
                                            style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                <p class="mb-0 text-left">
                                    <a href="javascript:void(0)"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                </p>
                            </div>

                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
			
        </div>
            </div>
        </div>
    </div>

@endsection
