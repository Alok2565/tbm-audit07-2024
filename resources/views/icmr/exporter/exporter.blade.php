@extends('icmr.layouts.admin')
@section('title', 'List of Applications for Export')
@section('content')
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title text-dark"><strong>List of Applications for Export</strong></h3>
            </div>
        </div>
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
    </div>
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert" style="background-color: #111C43">
        <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
        <p class="py-3" style="font-size: 18px; font-style:italic">{{ session('message') }}</p>
        <p><strong>Application Number:</strong> <span style="font-size: 18px; font-style:italic">{{ session('message2') }}</span>
        </p>
        <p><strong>Importer-Exporter Code (IEC): </strong><span style="font-size: 18px; font-style:italic">{{ session('message3') }}</span></p>
    </div>
    @endif
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
                                        <th>Data of Purpose</th>
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
                                        <!-- <td>{{ $dataExport->updated_at }}</td> -->
                                        <td> @php
                                    $date_format = $dataExport->created_at;
                                    $deal_date = date('d-m-Y', strtotime($date_format));
                                    @endphp
                                 {{ $deal_date }}
                           </td>
                                        <td>
                                        @php 
                                                        $id = $dataExport->id.'key1'.'key'.session('key');
                                                        @endphp
                                            <a href="{{ url('icmr/preview-exp') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
 }}"><button type="button" class="btn btn-success"><i class="mdi mdi-eye"></i></button></a>

                                        </td>
                                        <!-- <td>
                                            @if ($dataExport->icmr_off_status == 0)
                                            {{-- <a class="btn btn-info" href="javascript:void(0)" id="show-exp-data"
                                       data-url="{{ route('icmr.exporterjson', $dataExport->id) }}">Assign to Committee</a> --}}

                                            <a type="button" class="btn btn-info" href="javascript:void(0)" id="show-exp-data" data-url="{{ route('icmr.exporterjson', $dataExport->id) }}" data-bs-toggle="modal" data-bs-target="#multiple-one">Assign
                                                to Committee</a>
                                            @elseif($dataExport->icmr_off_status == 1)
                                            @if ($dataExport->icmr_noc_status == 0)
                                            {{-- <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}"><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Comments</button>
                                            </a> --}}
                                            <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one1">Appoved Comments</a>
                                            @else
                                            @endif
                                            @endif
                                        </td> -->
                                        <td>

                                            @if($dataExport->status == 0)
                                            <!-- <a class="btn btn-warning" href="{{ url('icmr/exporter/status', $dataExport->id) }}" data-url="{{ url('icmr/exporter/status', $dataExport->id) }}" onclick="return confirm('Are you sure you want to Reject this Application Number:- {{ $dataExport->application_number }}');">Reject</a> -->
                                            @elseif($dataExport->status == 1)

                                            @endif
                                            @if($dataExport->icmr_off_status == 0)
                                            <!-- <a class="btn btn-info" href="javascript:void(0)" id="show-exp-data"
                                                   data-url="{{ route('icmr.exporterjson', $dataExport->id) }}">Assign to Committee</a> -->
                                            <a type="button" class="btn btn-info" href="javascript:void(0)" id="show-exp-data" data-url="{{ route('icmr.exporterjson', $dataExport->id) }}" data-bs-toggle="modal" data-bs-target="#multiple-one">Assign to Committee</a>
                                            @elseif($dataExport->icmr_off_status == 1)

                                            @if ($dataExport->icmr_noc_status == 0)
                                            <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}"><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bs-example-modal-lg">Send</button>
                                            </a>
                                            @else

                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane show active" id="modal-multiple-preview">
                            <form method="post" action="{{ route('icmr.sendCommentNotification') }}">
                                @csrf
                                <!-- Modal -->
                                <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" id="myLargeModalLabel">
                                            <div class="modal-header">
                                                <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C">
                                                    <strong>Application to assign to committee members</strong>
                                                </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- <h5 class="mt-0">Text in a modal1</h5>
                                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p> --}}

                                                <div class="modal-body">
                                                    <div class="import-records">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <tr>
                                                                    <th class="form-label">Application Number</th>
                                                                    <input type="hidden" name="app_number" id="app_number" value="">
                                                                    <th class="form-label">Importer-Exporter Code (IEC)</th>
                                                                    <input type="hidden" name="iec_number" id="iec_number" value="">
                                                                </tr>
                                                                <tr>
                                                                    <td style="color: green" class="application_number" id="application_number">

                                                                    </td>
                                                                    <td style="color: green" class="sending_iec_number" id="sending_iec_number">

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th class="form-label">Name of Applicant</th>

                                                                    <th class="form-label">Address of Applicant</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color: green" class="sending_applicant_name" id="sending_applicant_name">
                                                                    </td>
                                                                    <td style="color: green" id="add_comp_inst">

                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <style>
                                                        table tr th td {
                                                            border: 1px solid #ddd;
                                                        }

                                                        tr,
                                                        td {
                                                            border: 1px solid #ddd;
                                                        }

                                                        th,
                                                        td {
                                                            padding: 5px;
                                                        }

                                                    </style>
                                                    <div class="row">
                                                        <div class="col-lg-12">

                                                            <input type="hidden" id="expID" name="exp_id">

                                                            <label class="btn btn-primary mt-2 mb-2" id="select_commettee_member">Click to Select
                                                                Committee Members <span class="text" style="font-size:17px; color:red;">*</span></label>
                                                            <div class="table-responsive">
                                                                <table id="committee_member_table_id" class="table text-nowrap table-sm" style="border:1px solid #ddd; display: none;">
                                                                    {{-- <table class="table table-centered table-striped dt-responsive nowrap w-100" id="committee_member_table_id"> --}}
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col" class="d-flex">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input" type="checkbox"  value="0" id="flexCheckIndeterminate">
                                                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                                                    </label>
                                                                                </div>
                                                                                # Name
                                                                            </th>
                                                                            {{-- <th># Name</th> --}}
                                                                            <th scope="col">Designation</th>
                                                                            <th scope="col">Department</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($arrComm as $memb_list)
                                                                        <tr>
                                                                            <td scope="row">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input commiittee_member_checkbox" type="checkbox" name="comm_id[]" value="{{ $memb_list->id }}" id="checkebox-sm">
                                                                                    <label class="form-check-label check_comm" for="checkebox-sm">
                                                                                        {{ $memb_list->name }}
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td>{{ $memb_list->designation }}
                                                                            </td>
                                                                            <td>{{ $memb_list->department }}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach

                                                                        {{-- @foreach ($arrComm as $memb_list)
                                                                        <tr>
                                                                            <td scope="row">
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input commiittee_member_checkbox" type="checkbox" name="comm_id[]" value="{{ $memb_list->id }}" id="checkebox-sm" required>
                                                                        <label class="form-check-label" for="checkebox-sm">
                                                                            {{ $memb_list->name }}
                                                                        </label>
                                                            </div>
                                                            </td>
                                                            <td>{{ $memb_list->designation }}
                                                            </td>
                                                            <td>{{ $memb_list->department }}
                                                            </td>
                                                            </tr>
                                                            @endforeach --}}
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="test_id" name="test_id" value="">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Comment <span class="text-danger">*</span></label>
                                                            <textarea class="form-control" id="validationCustom03" name="remark" required maxlength="1000"></textarea>
                                                        </div>

                                                    </div>
                                                    <p><span class="text-danger">*</span>&nbsp;<span class="text-danger">Please write the 1000 character max.</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="submi_comment" class="btn btn-primary" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal" disabled>Submit Continue</button>
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
                                            <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?
                                            </h4>
                                            <p class="mt-3 text-dark" style="font-size: 20px;">you want to assign the application to the committee members</p>
                                            <div class="modal-button d-flex">
                                                <button type="submit" name="submit" class="btn btn-primary col-6" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                                                <button type="button" class="btn btn-danger col-6 model_close" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div> <!-- end preview-->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>

<script type="text/javascript" src="{{ asset('public/back/assets/js/mode.view.js') }}"></script>
<script>
$('#validationCustom03').keyup(function () {
    var data = '';
       $("input[name='comm_id[]']:checked").each( function () {
         data += $(this).val()+', ';
        });
//alert(data);
        var value = $('#validationCustom03').val();
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

        $('#submi_comment').prop("disabled", true);
        if(value == '' || data == ''){
            //$('.show_record').attr("disabled");
            $('#submi_comment').prop("disabled", true);
        }else if(format.test(value) || data == ''){
            $('#submi_comment').prop("disabled", true);
        }
        else if(value.length <= 9 || data == ''){
            $('#submi_comment').prop("disabled", true);
        }else{
            $('#submi_comment').prop("disabled", false);
        }
    });

    $('.commiittee_member_checkbox').change(function () {
    var data = '';
       $("input[name='comm_id[]']:checked").each( function () {
         data += $(this).val()+', ';
        });
        var value = $('#validationCustom03').val();
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

        $('#submi_comment').prop("disabled", true);
        if(value == '' || data == ''){
            //$('.show_record').attr("disabled");
            $('#submi_comment').prop("disabled", true);
        }else if(format.test(value) || data == ''){
            $('#submi_comment').prop("disabled", true);
        }
        else if(value.length <= 9 || data == ''){
            $('#submi_comment').prop("disabled", true);
        }else{
            $('#submi_comment').prop("disabled", false);
        }
    });

    $('#flexCheckIndeterminate').change(function () {
    var data = '';
       $("input[name='comm_id[]']:checked").each( function () {
         data += $(this).val()+', ';
        });
        var value = $('#validationCustom03').val();
        var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
        $('#submi_comment').prop("disabled", true);
        if(value == '' || data != ''){
            //$('.show_record').attr("disabled");
            $('#submi_comment').prop("disabled", true);
        }else if(format.test(value) || data != ''){
            $('#submi_comment').prop("disabled", true);
        }
        else if(value.length <= 9 || data != ''){
            $('#submi_comment').prop("disabled", true);
        }else{
            $('#submi_comment').prop("disabled", false);
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#select_commettee_member').click(function() {
            //alert('Hi');
            $('#committee_member_table_id').show();
            $('.commiittee_member_checkbox').prop('checked', false);
        });
        $('.model_close').click(function() {
            //alert('Hi');
            $('#committee_member_table_id').hide();
            $('.commiittee_member_checkbox').prop('checked', false);
        });


    });

</script>
<script>
    const chBoxes =
        document.querySelectorAll('.dropdown-menu input[type="checkbox"]');
    const dpBtn =
        document.getElementById('multiSelectDropdown');
    let mySelectedListItems = [];

    function handleCB() {
        mySelectedListItems = [];
        let mySelectedListItemsText = '';

        chBoxes.forEach((checkbox) => {
            if (checkbox.checked) {
                mySelectedListItems.push(checkbox.value);
                mySelectedListItemsText += checkbox.value + ', ';
            }
        });

        dpBtn.innerText =
            mySelectedListItems.length > 0 ?
            mySelectedListItemsText.slice(0, -2) : 'Select Commette';
    }

    chBoxes.forEach((checkbox) => {
        checkbox.addEventListener('change', handleCB);
    });

</script>

<script>
    $(document).ready(function() {
        $(".mem_cls").click(function() {
            //alert('Hi');
            var member_id = $(this).attr("id_value");
            var hidden_val = $("#test_id").val();
            if (hidden_val == '') {
                var memberId_value = member_id;
            } else {
                var memberId_value = hidden_val + ',' + member_id;
            }

            $('#test_id').val(memberId_value);
            var hidden_val1 = $("#test_id").val();
            //alert(hidden_val1);
            let selectedMembers = [];
            $(".mem_cls").each(function() {
                if ($(this).is(":checked")) {
                    selectedMembers.push($(this).val());
                }
            });
            console.log("Selected members:", selectedMembers);
        });
    });

</script>
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
@endsection
