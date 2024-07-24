@extends('icmr.layouts.admin')
@section('title', 'List of Importer')
@section('content')
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h3 class="page-title text-dark"><strong>List of importer</strong></h3>
                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-info alert-dismissible bg-info text-white border-0 fade show" role="alert">

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                    <strong>Success - </strong>{{ session('message') }}
                </div>
            @endif
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
                                                <th>App. Number</th>
                                                <th>IEC Number</th>
                                                <!--th>Name of Applicant</th>
                                                    <th>Hs Code</th-->
                                                <th>View</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($Import as $key => $value)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $value->application_number }}</td>
                                                    <td>{{ $value->iec_number }}</td>
                                                    <!--td>{{ $value->name_of_applicant }}</td-->
                                                    <!--td>{{ $value->hs_code }}</td-->
                                                    <td><a href="{{ url('icmr/preview') }}/{{ $value->id }}"><button
                                                                type="button" class="btn btn-success"><i
                                                                    class="mdi mdi-eye"></i></button></a>
                                                    </td>
                                                    <td>
                                                        <!--<a class="btn btn-info" href="javascript:void(0)" id="show-imp-data" data-url="{{ route('icmr.previewIcmr', $value->id) }}">Assing</a>-->
                                                        @if ($value->icmr_off_status == 0)
                                                            <a href="javascript:coid(0)" id="show-imp-data"
                                                                data-url="{{ route('icmr.assignIcmr', $value->id) }}">
                                                                <button type="button" class="btn btn-info">Assing
                                                                </button></a>
                                                        @elseif($value->icmr_off_status == 1)

                                                            <a href="javascript:void(0)">
                                                              
																	@if ($value->icmr_noc_status == 0)
																	<a href="javascript:void(0)" id="show-imp-data1"
                                                                data-url="{{ route('icmr.commentIcmr', $value->id) }}"><button type="button" class="btn btn-info"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bs-example-modal-lg">Comments</button>
														     </a>
																@else
													
                                                        @endif
														@endif</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
                                        <form action="{{route('icmr.icmr_generate_noc')}}" method="post">
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
                                                        <p class="mt-2" style="font-weight:600; font-size:18px;">Committee Member's Comments</p>
                                                        <div id="comment_id">
														</div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="submit"
                                                    class="btn btn-success">Generate NOC</button>
                                                <button type="button" class="btn btn-light btn-danger"
                                                    data-bs-dismiss="modal">Close</button>

                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div><!-- /.modal -->
                            <!-- Modal -->
							<!--  comment start Modal -->
                            <div class="show_Cardata" id=card_data_view>
                                <div class="modal fade userShowModal" id="userShowModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myLargeModalLabel">
                                                    <p class="text-start"
                                                        style="font-size: 17px; font-weight:600; color:#14468C">
                                                        <strong>List of importer</strong>
                                                    </p>
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form method="post" action="{{ route('icmr.sendRemakrNotification') }}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="import-records">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-0">
                                                                <tr>
                                                                    <th class="form-label">Application Number</th>
                                                                    <th class="form-label">Name of Applicant</th>
                                                                </tr>

                                                                <tr>
                                                                    <td style="color: green" class="application_number"
                                                                        id="application_number">
                                                                        
                                                                    </td>
                                                                    <td style="color: green" class="name_of_applicant"
                                                                        id="name_of_applicant">
                                                                        
                                                                    </td>

                                                                </tr>
                                                                <tr>
                                                                    <th class="form-label">IEC Number</th>
                                                                    <th class="form-label">Address</th>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color: green" class="iec_number"
                                                                        id="iec_number"></td>
                                                                    <td style="color: green" id="hs_code">
                                                                        </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <input type="hidden" id="nameId" value=""
                                                                name="imp_id">

                                                            <label class="form-label">Comette Members</label>
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
                                                                                <input type="checkbox"
                                                                                    value="{{ $memb_list->id }}"
                                                                                    name="comm_id[]">
                                                                                {{ $memb_list->name }}
                                                                            </label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">Comment</label>
                                                                <textarea class="form-control" name="remark"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="submit"
                                                        class="btn btn-success">Submit</button>
                                                    <button type="button" class="btn btn-light btn-danger"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>

                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </div>
                            <!--icmr Comment end-->
                            <!--NOC check--->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('back/assets/js/mode.view.js') }}"></script>
    {{-- {{ $Import->links() }} --}}
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
@endsection
