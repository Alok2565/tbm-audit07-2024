@extends('impexp.layouts.admin')
@section('title', 'List of Reject Applications for Export')
@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                       
                        <h3 class="page-title text-dark"><strong>List of Reject Applications for Export</strong></h3>
                    </div>
                </div>
            </div>
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success - </strong> {{ session('message') }}
            </div>
            @endif
            {{-- @if (session()->has('message'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Success!</strong> {{ session('message') }}
                    </div>

                @endif --}}
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
                                                <th>Application Number</th>
                                                {{-- <th>Recipient Name</th> --}}
                                                <th>Purpose</th>
                                                <!--<th>Hs Code</th>-->
												<th>Date Submission</th>
                                                <th>Action</th>
												<th>Reason Reject</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ( $dataExporters as $dataExport )
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
                                                    {{-- <td>{{ $dataExport->hs_code}}</td> --}}
													 <td>{{ $dataExport->created_at }}</th>

                                                    <td>
                                                    @php 
                                                        $id = $dataExport->id.'key2'.'key'.session('key');
                                                        @endphp
													    <a href="{{ url('imp-exp/exporter/preview') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt($id)
 }}" target="_blank"><button
                                                            type="button" class="btn btn-success"><i
                                                                class="mdi mdi-eye"></i></button></a>
													    
													</td>
													<td>
													 <a class="btn btn-warning" href="javascript:void(0)"
														data-url="{{ url('icmr/exporter/status', $dataExport->id) }}" onclick="return confirm('Reject Reason:- {{ $dataExport->reject_reason }}');">Reject</a>
									   
													<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">View</button>
													
													
														<div class="modal" id="myModal">
														  <div class="modal-dialog">
															<div class="modal-content">

															  
															  <div class="modal-header">
																<h4 class="modal-title">Reject Comment</h4>
																<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
															  </div>

															 
															  <div class="modal-body">
																<p>Reject Reason:-</p>
															  </div>
															</div>
														  </div>
														</div>-->
													
													
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
@endsection
