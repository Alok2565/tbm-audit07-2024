@extends('icmr.layouts.admin')
@section('title', 'NOC of Importer')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title text-dark"><strong>List of NOC</strong></h3>
                    </div>
                </div>
            </div>
            <!-- @if (session()->has('message'))
                <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    <strong>Success - </strong>{{ session('message') }}
                </div>
            @endif -->
            <style>
            .alert-success {
                width: 50%;
                position: absolute;
                z-index: 11;
                left: 25%;
                height: auto;
                box-shadow: 2px 3px 10px 0px rgba(0, 0, 0, 0.5);
            }

        </style>
            @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert" style="background-color: #111C43">
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
        <p class="py-3" style="font-size: 18px; font-style:italic">{{ session('message') }}</p>
        <p><strong>Application Number:</strong> <span style="font-size: 18px; font-style:italic">{{ session('message2') }}</span>
        </p>
        <p><strong>IEC Code: </strong><span style="font-size: 18px; font-style:italic">{{ session('message3') }}</span></p>
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
                                                <th>NOC Number</th>
                                                <!--<th>IEC Number</th>-->
												<th>Application Number</th>
                                                <th>Applicant Name</th>
                                                <!--<th>Address</th>-->
                                                <th>NOC <i class="mdi mdi-download-box"></i></th>
                                            </tr>
                                        </thead>
                                            @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                           @foreach ($results as $lists )
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$lists->noc_number}}</td>
                                               <!-- <td>{{$lists->sending_iec_number}}</td>-->
											   <td>{{$lists->application_number}}</td>
                                                <td>{{mb_strimwidth($lists->sending_applicant_name, 0,40, '...')}}</td>
                                                <!--<td>{{$lists->sending_address}}</td>-->

                                                <td>
                                                    <a id="show-user" href="{{route('icmr.noc_exporter_download',$lists->id)}}" onclick="return confirm('Are you sure you want to download NOC ?., please continu.');"><button
                                                        type="button" class="btn btn-success float-center m-1"><i class="mdi mdi-download-box"></i></button></a>
                                                        {{-- <a id="show-user" href="{{route('icmr.noc_importer_download',$lists->id)}}"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Download</button></a> --}}
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
    </div> <!-- content -->
@endsection
