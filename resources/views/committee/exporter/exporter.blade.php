@extends('committee.layouts.admin')
@section('title', 'List of Exporter')
@section('content')
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
        <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert" style="background-color: #111C43">
            <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
            <p class="py-3" style="font-size: 18px; font-style:italic">{{ session('message') }}</p>
            <p><strong>Application Number:</strong> <span style="font-size: 18px; font-style:italic">{{ session('message2') }}</span>
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
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100 table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Application Number</th>
                                        {{-- <th>Recipient Name</th> --}}
                                        <th>data of Purpose</th>
                                        <!--<th>Hs Code</th>-->
                                        <th>ICMR Comment</th>
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
                                            <td>{{ $dataExport->remark}}</td>
                                            @php 
                                                        $id = $dataExport->id.'key1'.'key'.session('key');
                                                        @endphp
                                        <td><a href="{{ url('committee/exporter/preview') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
 }}"><button type="button" class="btn btn-success"><i class="mdi mdi-eye"></i></button></a>
                                        </td>
                                        <td>
                                            <?php if($dataExport->comm_send_status =='0') { ?>
                                            {{-- <a data-url="{{ url('committee/exporter/exportjson', $dataExport->id) }}"
                                            class="show_profile btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#multiple-one">Assign to ICMR officer</a> --}}
                                            <a data-url="{{ url('committee/exporter/exportjson', $dataExport->id) }}" class="show_profile btn btn-info" data-bs-toggle="modal" data-bs-target="#multiple-one">Comment sent to ICMR</a>

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
                                <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="multiple-oneModalLabel">Application being reverted to ICMR.
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                                            <td style="color: green" class="application_number" id="modelnumber">

                                                            </td>
                                                            <td style="color: green" class="sending_iec_number" id="modeliec">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="form-label">Name of Applicant</th>
                                                            <th class="form-label">Address of Applicant</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="color: green" class="sending_applicant_name" id="modelapp">
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
                                                            <th class="form-label">Decision <span class="text-danger">*</span></th>
                                                            <th class="form-label">Comment <span class="text-danger">*</span></th>
                                                            <th class="form-label">ICMR Remark</th>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    {{-- <select name="comm_status" class="form-control" data-toggle="select"> --}}
                                                                    <select name="comm_status" id="inputState" class="form-control form-select">
                                                                        <option value="">Select decision </option>
                                                                        <option value="Approve">Approve</option>
                                                                        <option value="Reject">Reject</option>
                                                                        <!-- <option value="Calcification"> Calcification</option> -->
                                                                    </select>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="form-group">
                                                                    <textarea id="committee_comments" cols="30" rows="2" name="comments" placeholder="Comment here" maxlength="1000"></textarea>
                                                                </div>
                                                              <p><span class="text-danger">*</span>&nbsp;<span class="text-danger">Please write the 1000 character max.</span></p>

                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <textarea type="text" id="modelremark" name="remark" class="form-control" readonly></textarea>
                                                                    @if ($errors->has('remark'))
                                                                    <span class="text-danger">{{ $errors->iec_code('remark') }}</span>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="submit_continue" class="btn btn-primary" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal" disabled>Submit Continue</button>
                                            </div>

                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->

                                </div><!-- /.modal -->

                                <!-- Modal -->
                                <div id="multiple-two" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <i class="ri-alert-line h1 text-warning"></i>
                                                    <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?</h4>
                                                    <p class="mt-3 text-dark" style="font-size: 20px;">you want to
                                                        sent the comments to ICMR Officer</p>
                                                    <div class="modal-button d-flex">
                                                        <button type="submit" name="submit" class="btn btn-primary col-6" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                                                        <button type="button" class="btn btn-danger col-6 model_close" data-bs-dismiss="modal">No</button>
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
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/back/assets/js/mode.view.js') }}"></script>
<script>
    $('#committee_comments').keyup(function () {
                var value = $('#inputState').val();
                var comment_value = $('#committee_comments').val();
                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

                $('#submit_continue').prop("disabled", true);
                if(comment_value == '' || value == ''){
                    //$('.show_record').attr("disabled");
                    $('#submit_continue').prop("disabled", true);
                }else if(format.test(comment_value)){
                    $('#submit_continue').prop("disabled", true);
                }
                else if(comment_value.length >= 10){
                    $('#submit_continue').prop("disabled", false);
                }
                else{

                    //$('.show_record').removeAttr("disabled");
                    //$('#submit_reason').prop("disabled", false);
                }
            });

            $('#inputState').change(function () {
                var value = $('#inputState').val();
                var comment_value = $('#committee_comments').val();
                var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

                $('#submit_continue').prop("disabled", true);
                if(comment_value == '' || value == ''){
                    //$('.show_record').attr("disabled");
                    $('#submit_continue').prop("disabled", true);
                }else if(format.test(comment_value)){
                    $('#submit_continue').prop("disabled", true);
                }
                else if(comment_value.length >= 10){
                    $('#submit_continue').prop("disabled", false);
                }
                else{
                    //$('.show_record').removeAttr("disabled");
                    //$('#submit_reason').prop("disabled", false);
                }
            });
    </script>
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
