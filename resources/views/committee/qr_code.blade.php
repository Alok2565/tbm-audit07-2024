@extends('committee.layouts.admin')
@section('content')
<div class="container mt-4">

    <div class="card">
        <div class="card-header">
            <h2>QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->generate('https://cvstatus.icmr.gov.in/') !!}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>QR Code</h2>
        </div>
        <div class="card-body">
            {!! QrCode::size(300)->backgroundColor(255,90,0)->generate('https://cvstatus.icmr.gov.in/') !!}
        </div>
    </div>

</div>
@endsection
