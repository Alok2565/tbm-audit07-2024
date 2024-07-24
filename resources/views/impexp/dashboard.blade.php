@extends('impexp.layouts.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="page-title-box">
		<h3 class="text-dark">Exporter Dashboard</h3>

        <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right"><button class="btn btn-primary float-end mb-2">
                                <a class="float-end text-white" href="{{ url('imp-exp/add-exporter') }}"
                                    style="font-weight:600;">Apply for new NOC</a>
                            </button>
                        </div>
                       
                    </div>
                </div>
            </div>
		<div class="card">
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div style="background-color: #688A22;border-radius: 10px;color:" class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="text-white fw-normal mt-0 text-truncate" title="Campaign Sent"><b>Total Import
                                                Applications</b></h5>
                                        <h3 class="my-2 py-1 text-white">{{$totalImport}}<span class="text-success float-end me-2"><i
                                                    style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                        <p class="mb-0 text-left">
                                        <a href="{{url('imp-exp/import')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
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
                                                    style="font-size:35px;;" class="ri-file-edit-fill text-white"></i></span></h3>
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
                                        <h5 class="text-white fw-normal mt-0 text-truncate" title="Booked Revenue"><b>Import Noc</b>
                                        </h5>
                                        <h3 class="my-2 py-1 text-white"> 0 <span class="text-success float-end me-2"><i
                                                    style="font-size:35px;" class="ri-file-edit-fill text-white"></i></span></h3>
                                        <p class="mb-0 text-left">
                                        <a href="#"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
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
                            <div style="background-color: #688A22;border-radius: 10px;" class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="text-white fw-normal mt-0 text-truncate" title="Campaign Sent"><b>
                                                Applications Submitted</b></h5>
                                        <h3 class="my-2 py-1 text-white"> {{$totalExporter}} <span class="text-success float-end me-2"><i
                                                    style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                        <p class="mb-0 text-left">
                                        <a href="{{url('imp-exp/exporter')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
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
                                                Applications under review</b></h5>
                                        <h3 class="my-2 py-1 text-white"> {{$pendingExporter}} <span class="text-success float-end me-2"><i
                                                    style="font-size:35px; text-white" class="ri-file-edit-fill text-white"></i></span></h3>
                                        <p class="mb-0 text-left">
                                            <a href="{{url('imp-exp/pending-exporter')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                        </p>
                                    </div>

                                </div> <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->

                    <!--<div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body" style="background-color: #D12E00; border-radius: 10px;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="text-white fw-normal mt-0 text-truncate" title="Deals"><b>Reject Export
                                                Application</b></h5>
                                        <h3 class="my-2 py-1 text-white">{{$rejectExporter}} <span class="text-success float-end me-2"><i
                                                    style="font-size:35px;" class="ri-file-excel-fill text-white"></i></span>
                                        </h3>
                                        <p class="mb-0 text-left">
                                            <a href="{{url('imp-exp/reject-exporter')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>-->

                    <div class="col-md-6 col-xl-3">
                        <div class="card">
                            <div class="card-body" style="background-color: #F78800; border-radius: 10px;">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h5 class="text-white fw-normal mt-0 text-truncate" title="Booked Revenue"><b>Decision on Submitted<br> Applications
                                                </b></h5>
                                        <h3 class="my-2 text-white"> {{$noccomplete}} <span class="text-success float-end me-2"><i
                                                    style="font-size:35px;" class="ri-file-edit-fill text-white"></i></span></h3>
                                        <p class="mb-0 text-left">
                                           <a href="{{url('imp-exp/noc-exporter')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                        </p>
                                    </div>

                                </div> <!-- end row-->
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->


                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <div style="background-color: #D12E00; border-radius: 10px;" class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h5 class="text-white fw-normal mt-0 text-truncate" title="Campaign Sent"><b>
                                                    Total Draft Applications</b></h5>
                                            <h3 class="my-2 py-1 text-white"> {{$drafts}} <span class="text-success float-end me-2"><i
                                                        style="font-size:35px;" class="ri-file-list-fill text-white"></i></span></h3>
                                            <p class="mb-0 text-left">
                                            <a href="{{url('imp-exp/exporter/draft')}}"><span class="text-white me-2"><i class="mdi mdi-arrow-right-bold"></i>More Info</span></a>
                                            </p>
                                        </div>

                                    </div> <!-- end row-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>