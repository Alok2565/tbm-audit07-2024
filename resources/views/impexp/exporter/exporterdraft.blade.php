@extends('impexp.layouts.admin')
@section('title', 'Application Draft')
@section('content')
        <div class="container-fluid">
        <style>
    .alert-success {
    width: 50%;
    position: absolute;
    z-index: 11;
    left: 25%;
    height: auto;
    box-shadow: 2px 3px 10px 0px rgba(0,0,0,0.5);
}
</style>
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <!-- <button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ url('imp-exp/add-exporter') }}"
                                    style="font-weight:600;">Add New Request for NOC</a>
                            </button> -->
                        </div>
                        <h3 class="page-title text-dark"><strong>List of Applications Drafts</strong></h3>
                    </div>
                </div>
            </div>
            <!-- @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success - </strong> {{ session('message') }}
            </div>
            @endif
            {{-- @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Success!</strong> {{ session('message') }}
                    </div>

                @endif --}} -->
                @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert" style="background-color:#022759;">
                <button  type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="py-3"  style="font-style:italic"><strong></strong> {{ session('message') }}</p>
                <p><strong>Application Number:</strong> <span  style="font-size: 18px; font-style:italic">{{ Session('message1') }}</span></p>
                <p><strong>Importer-Exporter Code (IEC): </strong><span  style="font-size: 18px; font-style:italic">{{ Session('message2') }}</span></p>
               <!-- <p class="py-3" style="font-style:italic">The Application submitted successfully. Please check The Mail.</p> -->
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Application Number</th>
                                                {{-- <th>Recipient Name</th> --}}
                                                <th>Purpose</th>
                                                <!--<th>Hs Code</th>-->
                                                <th>Date of Submission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ( $dataExporters as $dataExport )
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $dataExport->application_number }}</td>
                                                    {{-- <td>{{ $dataExport->receving_recipient_name }}</td> --}}
                                                    <td>{{ $dataExport->specify_purpose_end_use }}</td>
                                                    <!--<td>{{ $dataExport->hs_code}}</td>-->
                                                    <td>{{ $dataExport->created_at}}</td>

                                                    <td>
													    <a href="{{ url('imp-exp/add-exporter') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($dataExport->id)
 }}"><button
                                                            type="button" class="btn btn-success"><i
                                                                class=""></i>Continue</button></a>
													    
													</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->
@endsection
