@extends('impexp.layouts.admin')
@section('title', 'NOC of Exporter')
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
                                    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>NOC Number</th>
                                                <!--<th>IEC Number</th>-->
												<th>Application Number</th>
                                                {{-- <th>Applicant Name</th> --}}
                                                <th>Purpose</th>
                                                <th>Date of NOC</th>
                                                <!--<th>Address</th>-->
                                                <th>NOC <i class="mdi mdi-download-box"></i></th>
                                            </tr>
                                        </thead>
                                            @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @if (!empty($results))
                                           @foreach ($results as $lists )
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$lists->noc_number}}</td>
                                               <!-- <td>{{$lists->sending_iec_number}}</td>-->
											   <td>{{$lists->application_number}}</td>
                                                {{-- <td>{{mb_strimwidth($lists->sending_applicant_name, 0,40, '...')}}</td> --}}
                                                <!--<td>{{$lists->sending_address}}</td>-->
                                                {{-- <td>{{$lists->specify_purpose_end_use}}</td> --}}
                                                <td>
                                                    @php
                                                      $other = 'Others';
                                                      if (!empty($lists->specify_purpose_end_use_details)) {
                                                        echo $lists->specify_purpose_end_use_details;
                                                      } elseif(empty($dataExport->specify_purpose_end_use)) {
                                                        echo $other;
                                                      } else {
                                                        echo $lists->specify_purpose_end_use;
                                                      }
                                                    @endphp
                                                  </td>
                                                <!-- <td>{{$lists->updated_at}}</td> -->

                                                <td> @php
                                    $date_format = $lists->created_at;
                                    $deal_date = date('d-m-Y', strtotime($date_format));
                                    @endphp
                                 {{ $deal_date }}
                           </td>

                                                    <td>
                                                        <a id="show-user"
                                                                href="{{ route('impexp.exporter.noc_pdf', $lists->id) }}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#warning-alert-modal{{ $lists->id }}"><button type="button"
                                                                    class="btn btn-success float-center m-1"><i
                                                                        class="mdi mdi-download-box"></i>Export</button></a>

                                                        </td>
                                            </tr>
                                            <!-- Warning Alert Modal -->
                                <div id="warning-alert-modal{{ $lists->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-body p-4">
                                                <div class="text-center">
                                                    <i class="ri-alert-line h1 text-warning"></i>
                                                    <h4 class="mt-2" style="font-size: 25px;">Are You Sure</h4>
                                                    <p class="mt-3" style="font-size: 20px;">You want to download the NOC.</p>
                                                    <a href="{{ route('impexp.exporter.noc_pdf', $lists->id) }}"><button
                                                            class="btn btn-success my-2"
                                                            data-bs-dismiss="modal">Yes</button></a>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                           @endforeach
                                           @endif
                                        </tbody>
                                    </table>
                                </div> <!-- end preview-->

                            </div> <!-- end tab-content-->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div> <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
