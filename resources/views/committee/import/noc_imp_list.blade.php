@extends('committee.layouts.admin')
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <div class="table-responsive">
                                        <table id="basic-datatable" class="table table-striped table-hover dt-responsive nowrap w-100 ">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>NOC Number</th>
                                                    <th>IEC Number</th>
                                                    <th>Applicat Name</th>
                                                    <th>Address</th>
                                                    <th>Application Number</th>
                                                    <th>NOC <i class="mdi mdi-download-box"></i></th>
                                                </tr>
                                            </thead>
                                                @php
                                                $i = 1;
                                            @endphp
                                            <tbody>
                                               @foreach ($results as $lists )
                                                <tr>
                                                    <td>{{$lists->id}}</td>
                                                    <td>{{$lists->noc_number}}</td>
                                                    <td>{{$lists->iec_code}}</td>
                                                    <td>{{mb_strimwidth($lists->name_of_applicant, 0,40, '...')}}</td>
                                                    <td>{{$lists->address_company}}</td>
                                                    <td>{{$lists->application_number}}</td>
                                                    <td>
                                                        <a id="show-user" href="{{route('icmr.noc_importer_download',$lists->id)}}"><button
                                                            type="button" class="btn btn-success float-center m-1"><i class="mdi mdi-download-box"></i></button></a>
                                                            {{-- <a id="show-user" href="{{route('icmr.noc_importer_download',$lists->id)}}"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Download</button></a> --}}
                                                        </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> <!-- end preview-->
                            </div> <!-- end tab-content-->

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div>
    </div>
    <div>


@endsection
