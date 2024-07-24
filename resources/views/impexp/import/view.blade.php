@extends('impexp.layouts.admin')
@section('title', 'List of Importer')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right"><button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ url('imp-exp/add-import') }}"
                                    style="font-weight:600;">Add New Importer</a>
                            </button>
                        </div>
                        <h3 class="page-title text-dark"><strong>List of importer</strong></h3>
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
                                                <th>App. Number</th>
                                                <th>IEC Number</th>
                                                <th>Name of Applicant</th>
                                                <th>Hs Code</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $i = 1;
                                        @endphp
                                        <tbody>
                                            @foreach ($Import as $key => $value)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $value->application_number }} </td>
                                                    <td>{{ $value->iec_number }}</td>
                                                    <td>{{ $value->name_of_applicant }}</td>
                                                    <td>{{ $value->hs_code }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ url('imp-exp/import/preview') }}/{{ $value->id }}"><button
                                                            type="button" class="btn btn-success"><i
                                                                class="mdi mdi-eye"></i></button></a>
                                                       
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
    </div> <!-- content -->
@endsection
