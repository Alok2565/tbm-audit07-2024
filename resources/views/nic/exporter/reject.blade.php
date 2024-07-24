@extends('committee.layouts.admin')
@section('title', 'List of Reject Exporter')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<style>.dropdown-menu.show {margin: 0px -35px !important;}
.float-start.costum1 {margin: -17px 19px 0px 380px;}
.modal-content {width: 85%;max-width: 85%; margin-left: 240px;}
.modal-dialog {max-width: 80% !important;}
    </style>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title text-dark"><strong>List of Exporter</strong></h3>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>Success - </strong>{{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active" id="basic-datatable-preview">
                                    <table id="basic-datatable"
                                        class="table table-striped dt-responsive nowrap w-100 table table-bordered data-table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Application Number</th>
                                                <!--<th>IEC Number</th>-->
                                                <th>Sender Name</th>
                                                <!--<th>Hs Code</th>-->
                                                <th>View</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($dataExporters as $key => $dataExport)
                                                <tr>

                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $dataExport->application_number }}</td>
                                                    <!--<td>{{ $dataExport->sending_iec_number }}</td>-->
                                                    <td>{{ $dataExport->sending_applicant_name }}</td>
                                                    {{-- <td>{{ $dataExport->receving_recipient_name }}</td> --}}
                                                    <!--<td>{{ $dataExport->hs_code }}</td>-->
                                                    <td><a
                                                            href="{{ url('committee/exporter/preview') }}/{{ $dataExport->id }}"><button
                                                                type="button" class="btn btn-success"><i
                                                                    class="mdi mdi-eye"></i></button></a>
                                                    </td>
                                                    <td>
                                                        <?php if($dataExport->comm_status =='Reject') { ?>
                                                        
                                                        <a class="btn btn-warning" href="javascript:void(0)"
														data-url="{{ url('icmr/exporter/status', $dataExport->id) }}" onclick="return confirm('Reject Reason:- {{ $dataExport->comments }}');">Reject</a>
														<?php }?>
                                                        
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Modal -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('back/assets/js/mode.view.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '.show_profile', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#idnname').val(data.id);
                    $('#modelnumber').text(data.application_number);
                    $('#modeliec').text(data.sending_iec_number);
                    $('#modelapp').text(data.sending_applicant_name);
                    $('#modeladdress').text(data.sending_add_company_institute);
                    $('#modelremark').val(data.remark);
                });
            });
        });
    </script>
@endsection
