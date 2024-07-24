@extends('committee.layouts.admin')
@section('title', 'List of Exporter')
@section('content')
<script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <div class="content">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title text-dark"><strong>List of Exporter</strong></h3>
                    </div>
                </div>
                {{-- @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong>Success - </strong>{{ session('message') }}
                    </div>
                @endif --}}
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert"
                    style="background-color: #111C43">
                    <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    <p class="py-3" style="font-size: 18px; font-style:italic">{{ session('message') }}</p>
                    <p><strong>Application Number:</strong> <span
                            style="font-size: 18px; font-style:italic">{{ session('message2') }}</span>
                    </p>
                    <p><strong>Importer-Exporter Code (IEC): </strong><span style="font-size: 18px; font-style:italic">{{ session('message3') }}</span></p>
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
                                                <th>IEC Number</th>
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
                                                    <td>{{ $dataExport->sending_iec_number }}</td>
                                                    <td>{{ $dataExport->sending_applicant_name }}</td>
                                                    {{-- <td>{{ $dataExport->receving_recipient_name }}</td> --}}
                                                    <!--<td>{{ $dataExport->hs_code }}</td>-->
                                                    <td><a
                                                            href="{{ url('committee/exporter/preview') }}/{{ $dataExport->id }}"><button
                                                                type="button" class="btn btn-success"><i
                                                                    class="mdi mdi-eye"></i></button></a>
                                                    </td>
                                                    <td>
                                                            <?php if($dataExport->comm_send_status =='0') { ?>
                                                        <a data-url="{{ url('committee/exporter/exportjson', $dataExport->id) }}"
                                                            class="show_profile btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#multiple-one">Assign to ICMR officer</a>

                                                        <?php } else { ?>
                                                        <a href="javascript:void(0)" class="btn btn-danger">Send</a>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane show active" id="modal-multiple-preview">
                                    <form method="post" action="{{ url('committee/feedback_committ') }}">
                                        {{ csrf_field() }}
                                        <!-- Modal -->
                                        <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="multiple-oneModalLabel">Application being reverted to ICMR.
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <tr>
                                                                    <th class="form-label">Application Number</th>
                                                                    <input type="hidden" name="com_app_num" id="com_app_num" value="">
                                                                    <th class="form-label">Importer-Exporter Code (IEC)</th>
                                                                    <input type="hidden" name="com_iec_num" id="com_iec_num" value="">
                                                                </tr>
                                                                <tr>
                                                                    <td style="color: green" class="application_number"
                                                                        id="modelnumber">

                                                                    </td>
                                                                    <td style="color: green" class="sending_iec_number"
                                                                        id="modeliec">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="form-label">Name of Applicant</th>
                                                                    <th class="form-label">Address of Applicant</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color: green" class="sending_applicant_name"
                                                                        id="modelapp">
                                                                    </td>
                                                                    <td style="color: green" id="modeladdress">

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="table-responsive mt-2">
                                                            <input type="hidden" id="idnname" value="" name="idname">
                                                            <table class="table table-bordered mb-0">
                                                                <tr>
                                                                    <th class="form-label">Decision</th>
                                                                    <th class="form-label">Comment</th>
                                                                    <th class="form-label">Remark</th>
                                                                    
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <select name="comm_status" class="form-control"
                                                                                data-toggle="select2">
                                                                                <option value="Approve">Approve
                                                                                </option>
                                                                                <option value="Reject">Reject
                                                                                </option>
                                                                                <!-- <option value="Calcification">
                                                                                    Calcification</option> -->
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <textarea cols="30" rows="2" name="comments" placeholder="Comment here"></textarea>
                                                                            @if ($errors->has('comments'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->iec_code('comments') }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <input type="text"
                                                                                id="modelremark" name="remark"
                                                                                class="form-control" readonly>
                                                                            @if ($errors->has('remark'))
                                                                                <span
                                                                                    class="text-danger">{{ $errors->iec_code('remark') }}</span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-target="#multiple-two" data-bs-toggle="modal"
                                                            data-bs-dismiss="modal">Submit Continue</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->

                                        </div><!-- /.modal -->

                                        <!-- Modal -->
                                        <div id="multiple-two" class="modal fade" tabindex="-1" role="dialog"
                                            aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <i class="ri-alert-line h1 text-warning"></i>
                                                            <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?</h4>
                                                            <p class="mt-3 text-dark" style="font-size: 20px;">you want to
                                                                sent the comments to ICMR Officer</p>
                                                            <div class="modal-button d-flex">
                                                                <button type="submit" name="submit"
                                                                    class="btn btn-primary col-6"
                                                                    data-bs-target="#multiple-two" data-bs-toggle="modal"
                                                                    data-bs-dismiss="modal">Yes</button>
                                                                <button type="button"
                                                                    class="btn btn-danger col-6 model_close"
                                                                    data-bs-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            {{-- <div class="d-flex flex-wrap gap-2">
                                        <!-- Multiple modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one">Multiple Modal</button>
                                    </div> --}}
                                        </div> <!-- end preview-->
                                    </form>
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
                        $('#com_app_num').val(data.application_number);
                        $('#com_iec_num').val(data.sending_iec_number);
                        $('#com_app_num').val(data.application_number);
                        $('#com_iec_num').val(data.sending_iec_number);
                    });
                });
            });
        </script>
        
    @endsection
