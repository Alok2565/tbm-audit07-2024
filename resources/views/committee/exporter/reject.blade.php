@extends('committee.layouts.admin')
@section('title', 'List of Reject Exporter')
@section('content')
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
                                                <th>Data of Purpose</th>
                                                <!--<th>Hs Code</th>-->
                                                <th>Date of Submission</th>
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
                                                    {{-- <td>{{ $dataExport->receving_recipient_name }}</td> --}}
                                                    {{-- <td>{{ $dataExport->specify_purpose_end_use }}</td> --}}
                                                    <td>
                                                        @php
                                                          $other = 'Others';

                                                          if (!empty($dataExport->specify_purpose_end_use_details)) {
                                                            echo $dataExport->specify_purpose_end_use_details;
                                                          } elseif(empty($dataExport->specify_purpose_end_use)) {
                                                            echo $other;
                                                          } else {
                                                            echo $dataExport->specify_purpose_end_use;
                                                          }
                                                        @endphp
                                                      </td>
                                                    <!--<td>{{ $dataExport->hs_code}}</td>-->
                                                    <td>{{ $dataExport->created_at}}</td>
                                                    <td>@php 
                                                        $id = $dataExport->id.'key2'.'key'.session('key');
                                                        @endphp
                                                        <a
                                                            href="{{ url('committee/exporter/preview') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
 }}"><button
                                                                type="button" class="btn btn-success"><i
                                                                    class="mdi mdi-eye"></i></button></a>
                                                    </td>
                                                    <td>Reject
                                                         <?php //if($dataExport->comm_status =='Reject') { ?>
                                                        
                                                        
                                                        
                                                       
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
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>x
    <script type="text/javascript" src="{{ asset('public/back/assets/js/mode.view.js') }}"></script>
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
