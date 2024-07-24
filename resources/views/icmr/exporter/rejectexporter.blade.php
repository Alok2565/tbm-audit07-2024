@extends('icmr.layouts.admin')
@section('title', 'List of Reject Applications for Export')
@section('content')
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="page-title-box">
               <h3 class="page-title text-dark"><strong>List of rejected applications for export</strong></h3>
            </div>
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

 @if (session()->has('message'))
 <div class="alert alert-success alert-dismissible text-white border-0 fade show" role="alert" style="background-color: #111C43">
     <button type="button" class="btn-close btn-close-red" data-bs-dismiss="alert" aria-label="Close"></button>
     <p class="py-3" style="font-size: 18px; font-style:italic">{{ session('message') }}</p>
     <p><strong>Application Number:</strong> <span style="font-size: 18px; font-style:italic">{{ session('message2') }}</span>
     </p>
     <p><strong>Importer-Exporter Code (IEC): </strong><span style="font-size: 18px; font-style:italic">{{ session('message3') }}</span></p>
 </div>
 @endif

      {{-- @if (session()->has('message'))
                <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    <strong>Success - </strong>{{ session('message') }}
                </div>
            @endif --}}
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
                                 <th>Data of Purpose</th>
                                 <!--<th>IEC Number</th>
                                 <th>Name of Sender</th>-->
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
                                 <!--<td>{{ $dataExport->sending_iec_number }}</td>
                                 <td>{{ $dataExport->sending_applicant_name }}</td>-->
								 <!-- <th>{{ $dataExport->created_at }}</th> -->
                           <td> @php
                                    $date_format = $dataExport->created_at;
                                    $deal_date = date('d-m-Y', strtotime($date_format));
                                    @endphp
                                 {{ $deal_date }}
                           </td>
                                 <td>
                                 @php 
                                                        $id = $dataExport->id.'key2'.'key'.session('key');
                                                        @endphp
                                    <a href="{{ url('icmr/preview-exp') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
}}"><button
                                        type="button" class="btn btn-success"><i
                                            class="mdi mdi-eye"></i></button></a>
                                </td>
                                 <td>

								    @if($dataExport->status == 0)

                                         @elseif($dataExport->status == 1)
									    <a class="btn btn-warning" href="javascript:void(0)"
                                       data-url="{{ url('icmr/exporter/status', $dataExport->id) }}" onclick="return confirm('Reject Reason:- {{ $dataExport->reject_reason }}');">Reject</a>

								   @endif


								</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
					 <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog"
                                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Comments by Committee Members
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('icmr.icmr_generate_nocexp')}}" method="post">
										@csrf
                                            <div class="modal-body">
											   <input type="hidden" id="nameId1" name="imp_id">
                                                <div class="import-records">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <tr>
                                                                <th class="form-label">Application Number</th>
                                                                <th class="form-label">IEC Number</th>
                                                            </tr>
                                                            <tr>
                                                                <td style="color: green" id="application_number1">

                                                                </td>
                                                                <td style="color: green" id="iec_number1">

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="form-label">Name of Applicant</th>
                                                                <th class="form-label">Adddress</th>
                                                            </tr>
                                                            <tr>
                                                                <td style="color: green" id="name_of_applicant1">

                                                                </td>
                                                                <td style="color: green" id="address1">

                                                                </td>
                                                            </tr>
                                                        </table>

                                                        <div id="comment_id">
														</div>
                                                        {{-- @foreach ($comment as $value )
                                                            {{ $value->name }}
                                                        @endforeach --}}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit"
                                                    class="btn btn-success" onclick="return confirm('Are you sure you want to ganerate the NOC ?. Continue OR OK')">Generate NOC</button>
                                                <button type="button" class="btn btn-light btn-danger"
                                                    data-bs-dismiss="modal">Close</button>

                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div><!-- /.modal -->
                     <!-- Modal -->
                     <div class="show_Cardata" id="card_data_view">
                        <div class="modal fade userShowModal" id="userShowModal" tabindex="-1"
                           aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">
                                       <p class="text-start"
                                          style="font-size: 17px; font-weight:600; color:#14468C">
                                          <strong>List of Exporter</strong>
                                       </p>
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                       aria-label="Close"></button>
                                 </div>
                                 <form method="post" action="{{ route('icmr.sendCommentNotification') }}">
                                    @csrf
                                    <div class="modal-body">
                                       <div class="import-records">
                                          <div class="table-responsive">
                                             <table class="table table-bordered mb-0">
                                                <tr>
                                                   <th class="form-label">Application Number</th>
                                                   <th class="form-label">IEC Number</th>
                                                </tr>
                                                <tr>
                                                   <td style="color: green" class="application_number"
                                                      id="application_number">

                                                   </td>
                                                   <td style="color: green" class="sending_iec_number"
                                                      id="sending_iec_number">

                                                   </td>
                                                </tr>
                                                <tr>
                                                   <th class="form-label">Name of Applicant</th>
                                                   <th class="form-label">Address of Applicant</th>
                                                </tr>
                                                <tr>
                                                   <td style="color: green"
                                                      class="sending_applicant_name"
                                                      id="sending_applicant_name">

                                                   </td>
                                                   <td style="color: green" id="add_comp_inst">

                                                   </td>
                                                </tr>
                                             </table>
                                          </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-lg-12">

                                             <input type="hidden" id="expID" name="exp_id">

                                             <label class="form-label">Committee Members</label>
                                             <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle"
                                                   type="button" id="multiSelectDropdown"
                                                   data-bs-toggle="dropdown" aria-expanded="false">
                                                Select Commette
                                                </button>
                                                <ul class="dropdown-menu p-2"
                                                   aria-labelledby="multiSelectDropdown">
                                                   @foreach ($arrComm as $memb_list)
                                                   <li>
                                                      <label>
                                                      <input type="checkbox" selected
                                                         value="{{ $memb_list->name }}, {{ $memb_list->designation }}, {{ $memb_list->department }}" class="mem_cls" id_value="{{ $memb_list->id }}"
                                                         name="comm_id[]" >
                                                      {{ $memb_list->name }}, {{ $memb_list->designation }}, {{ $memb_list->department }}
                                                      </label>
                                                   </li>
                                                   @endforeach
                                                </ul>
                                             </div>
                                             {{-- <input type="hidden" name="app_number" id="app_number"> --}}
                                          </div>
                                          <input type="text" id="test_id" name="test_id" value="">
                                          <div class="col-lg-12">
                                             <div class="form-group">
                                                <label class="form-label">Comment</label>
                                                <textarea class="form-control" id="validationCustom03" name="remark" required></textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="submit" name="submit"
                                          class="btn btn-success" onclick="return confirm('Are you sure you want to sent the comments to Committee ?.');">Submit</button>
                                       <button type="button" class="btn btn-light btn-danger"
                                          data-bs-dismiss="modal">Close</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript" src="{{ asset('public/back/assets/js/mode.view.js') }}"></script>

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
        if(hidden_val == ''){
            var memberId_value = member_id;
        }else{
            var memberId_value = hidden_val+','+ member_id;
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
