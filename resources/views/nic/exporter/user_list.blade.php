@extends('nic.layouts.admin')
@section('title', 'List of Applications for Export')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h3 class="page-title text-dark"><strong>List of User</strong></h3>
            </div>
        </div>
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
                                        <th>Name</th>
                                        <th>IEC Number</th>
                                        <th>City</th>
                                        <th>States</th>
                                        <th>Date of Submission</th>
                                       
                                    </tr>
                                </thead>
                                @php
                                $i = 1;
                                @endphp
                                <tbody>
                                    @foreach ($ImpExpUse as $key => $dataExport)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $dataExport->name }}</td>
                                        <td>{{ $dataExport->iec_code }}</td>
                                        <td>{{ $dataExport->city }}</td>
                                        <td>{{ $dataExport->states }}</td>
                                        <td>{{ $dataExport->created_at }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection
