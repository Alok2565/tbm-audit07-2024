<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noc Issued Exporter | Transfer of Human Biological Material (THBM)</title>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: 'Poppins', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        label {
            font-family: 'Poppins', sans-serif;
        }

        hr {
            margin: 0.8cm 0;
            height: 0;
            border: 0;
            border-top: 1mm solid #00a5ce;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-card-tite">

                        <div class="noc-head-title"><span><strong><img src="{{ asset('assets/images/dhr_logo_jpg.jpg') }}" alt="dhr_logo"></strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span><img src="{{ asset('assets/images/icmr_main_logo1.jpg') }}" alt="icmr_logo"
                                style="width: 380px; height: 130px;margin-top: -57px;">
                            </span>
                        </div>

                    </div>
                    <h2 class="card-header bg-light" style="text-align: center; font-weight:600;color:#222222;">
                        <strong>No Objection Certificate (NOC) for Export of Human Biological Material</strong></h2>
                    <div class="card-body">
                        <div class="card-iec-number">

                            <span class="app_num" style="font-style: italic;">Application Number: <span style="color: #243774;">{{ $results->application_number }}</span></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="noc-num" style="font-style: italic;">NOC NUmber: <span style="color: #243774;">{{ $results->noc_number }}</span></span><br>
                            <span class="iec_num" style="font-style: italic;"> Importer Exporter Code (IEC): <span style="color: #243774;">{{ $results->sending_iec_number }}</span></span>

                        </div>
                    </div>
                    <hr>
                    <div class="card-content-item" style="line-height: 2em; margin-top: 5px;">
                        {{-- <p style="text-align: justify; font-size:15px; line-height:2em">This is to certify that <strong>{{$results->sending_applicant_name}}</strong> (Name of the applicant and company) has been granted permission to export <strong>{{$results->exported_number}}</strong> (number of samples) samples of <strong>{{ $results->natural_biomaterial_exported }}</strong> (biomaterial to be exported) of <strong>{{$results->exported_volume}}</strong> each (volume of each sample)to <strong>{{ $results->receving_recipient_name }}</strong>, <strong>{{ $results->receiving_add_company_institute }}</strong> (Name and Company of recipient) in <strong>{{ $results->receving_recipient_design }}</strong> (Country of Destination) for the purpose of <strong>{{ $results->purpose_sample_store }}</strong> (Description of the type(s) of investigations or analyses to be conducted on the samples) only. This approval is valid for a period of 90 (Ninety) days with effect from the date of authorization.</p> --}}
                        <p style="text-align: justify; font-size:15px; line-height:2em">This is to certify that <strong>{{$results->sending_applicant_name}}</strong> (Name of the applicant and company) has been granted permission to export <strong>{{$results->exported_number}}</strong> (number of samples) samples of <strong>{{ $results->natural_biomaterial_exported }}</strong> (biomaterial to be exported) of <strong>
                            {{$results->vol_of_sample_text}}&nbsp;{{$results->exported_volume}}</strong> each (volume of each samples) to <strong>{{ $results->receving_recipient_name }}</strong>, <strong>{{ $results->receiving_add_company_institute }}</strong> (Name and Company of recipient) in <strong>{{ $results->receving_recipient_design }}</strong> (Country of Destination) for the purpose of <strong>{{ $results->purpose_sample_store }}</strong> (Description of the type(s) of investigations or analyses to be conducted on the samples) only. This approval is valid for a period of 90 (Ninety) days with effect from the date of authorization.</p>
                    </div>
                </div>
                <h3><b>Date: {{ date('Y-m-d') }}</b></h3>
                <br/></br>
                <div class="card-body">
                    <div class="card-iec-number">
                    <img src="data:image/png;base64, {!! base64_encode($qrcode) !!} " width="100" height="100">
                    </div>
                </div>
                <div class="noc-text">
            <p style="text-align: justify; font-size:15px; line-height:2em; margin-top:10px;"><span>*</span> This is a computer-generated document. No signature is required. </p>
            </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
</body>

</html>
