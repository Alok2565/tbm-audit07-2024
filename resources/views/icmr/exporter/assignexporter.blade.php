@extends('icmr.layouts.admin')
@section('title', 'List of Assign Committee Applications for Export')
@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="page-title-box">
               <h3 class="page-title text-dark"><strong>List of Applications for Export</strong></h3>
            </div>
         </div>
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
                                 <!--<th>IEC Number</th>
                                 <th>Name of Sender</th>-->
                                 <th>Data of the Purpose</th>
								 <th>Date of submission</th>
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
                                 <!--<td>{{ $dataExport->sending_iec_number }}</td>
                                 <td>{{ $dataExport->sending_applicant_name }}</td>-->
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
								 <!-- <th>{{ $dataExport->created_at }}</th> -->
                                 <td> @php
                                    $date_format = $dataExport->created_at;
                                    $deal_date = date('d-m-Y', strtotime($date_format));
                                    @endphp
                                 {{ $deal_date }}
                           </td>
                                 <td>
                                 @php 
                                                        $id = $dataExport->id.'key3'.'key'.session('key');
                                                        @endphp
                                    <a href="{{ url('icmr/preview-exp') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
 }}"><button
                                        type="button" class="btn btn-success"><i
                                            class="mdi mdi-eye"></i></button></a>
                                </td>
                                <td>
  
								    @if($dataExport->icmr_off_status == 0)

                                         @elseif($dataExport->icmr_off_status == 1)
									   <!-- <a href="javascript:void(0)" id="show-exp-data2"
                                            data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}"><button type="button" class="btn btn-info"
                                            data-bs-toggle="modal"
                                            data-bs-target="#bs-example-modal-lg">Comments</button>
										</a> -->
                              {{-- <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one1">Decision</a> --}}
                              <!-- <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', $dataExport->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one1">View Comments</a> -->
                              <a href="javascript:void(0)" id="show-exp-data2" data-url="{{ route('icmr.commentsIcmr', \Illuminate\Support\Facades\Crypt::encrypt($dataExport->id)) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#multiple-one1">View Comments</a>
								   @endif
								</td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>


                     <div class="tab-pane show active" id="modal-multiple-preview">
                            <form action="{{route('icmr.icmr_generate_nocexp')}}" method="post">
                                @csrf
                            <!-- Modal -->
                            <div id="multiple-one1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="multiple-oneModalLabel">Comments by Committee Members</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="nameId1" name="imp_id">

                                            <input type="hidden" id="impexpID" name="impexpID">

                                                <div class="import-records">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered mb-0">
                                                            <tr>
                                                                <th class="form-label">Application Number</th>
                                                                <input type="hidden" name="app_number" id="app_number">
                                                                <th class="form-label">IEC Number</th>
                                                            </tr>
                                                            <tr>
                                                                <td style="color: green" id="application_number1">

                                                                </td>
                                                                <td style="color: green" id="iec_number1">

                                                                </td>
                                                                <input type="hidden" name="iec_number12" id="iec_number12" />
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
                                                        <p class="mt-2" style="font-weight:600; font-size:18px;"> Check and review by ICMR</p>
                                                        <div id="comment_id">
														</div>


                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
											<button type="submit" name="submit" value="preview" class="btn btn-primary">Preview NOC</button>
                                            <button type="button" class="btn btn-primary" data-bs-target="#multiple-two1" data-bs-toggle="modal" data-bs-dismiss="modal">Generate NOC</button>
											<button type="button" class="btn btn-danger" data-bs-target="#multiple-two2" data-bs-toggle="modal" data-bs-dismiss="modal">Reject NOC</button>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <!-- Modal -->
                            <div id="multiple-two1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-twoModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <i class="ri-alert-line h1 text-warning"></i>
                                                <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?
                                                </h4>
                                                <p class="mt-3 text-dark" style="font-size: 20px;">You want to generate the NOC.</p>
                                                <div class="modal-button d-flex">
                                                    <button type="submit" name="submit" class="btn btn-primary col-6" data-bs-target="#multiple-two1" data-bs-toggle="modal" data-bs-dismiss="modal">Yes</button>
                                                    <button type="button" class="btn btn-danger col-6 model_close" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
							</div> <!-- end preview-->

							<div id="multiple-two2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-two2ModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <i class="ri-alert-line h1 text-warning"></i>
                                                <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?
                                                </h4>
                                                <p class="mt-3 text-dark" style="font-size: 20px;">You want to reject the application.</p>
                                            </div>
                                               <div class="form-group mb-2">
                                                <label for="reject_reason" class="label-form"><span class="reject_reason_text">Rejection Reason</span> <span class="text-danger">*</span></label>
                                                <textarea class="form-control" name="reject_reason" id="reject_reason" cols="30" rows="2" maxlength="100" placeholder="Please write the rejection reason."></textarea>
                                               </div>
                                                <div class="modal-button d-flex gap-2">
                                                    <button id="submit_reason" type="submit1" name="submit1" value="submit1" class="btn btn-primary col-6" data-bs-target="#multiple-two2" data-bs-toggle="modal" data-bs-dismiss="modal" disabled>Yes</button>
                                                    <button type="button" class="btn btn-danger col-6 model_close" data-bs-dismiss="modal">No</button>
                                                </div>
                                                <p><span class="text-danger">*</span>&nbsp;<span class="text-danger">Please write the 100 character maxmimum.</span></p>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
							</div>
                        </form>
                        <script>
                        $('#reject_reason').keyup(function () {

                                    var value = $('#reject_reason').val();
                                    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;

                                    $('#submit_reason').prop("disabled", true);
                                    if(value == '' ){
                                        //$('.show_record').attr("disabled");
                                        $('#submit_reason').prop("disabled", true);
                                    }else if(format.test(value)){
                                        $('#submit_reason').prop("disabled", true);
                                    }
                                    else if(value.length >= 10){
                                        $('#submit_reason').prop("disabled", false);
                                    }
                                    else{

                                        //$('.show_record').removeAttr("disabled");
                                        //$('#submit_reason').prop("disabled", false);
                                    }
                                });
                        </script>
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
