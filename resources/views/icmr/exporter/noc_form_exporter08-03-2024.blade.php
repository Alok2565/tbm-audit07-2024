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
    </style>
</head>

<body>
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <h2 class="card-header bg-light" style="text-align: center; font-weight:600;color:#022759;">
                    <strong>Transfer of Human Biological Material (THBM)</strong></h2>
                <div class="card-body">
                    <!--div class="card-title" style="text-align: center; font-weight:600;color:#022759;"><h3><strong>For Official Use only</strong></h3></div-->
                    <div class="form-card-tite" style="background-color: #022759; color:#fff; padding:15px;">

                        <div class="noc-head-title"><span style="font-weight:600; font-size:17px;"><strong>NOC For
                                    Exporter</strong></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                style="font-weight:600; font-size:15px;"> <strong>NOC Number:</strong>
                            </span>&nbsp;<span
                                style="font-weight:600; font-size:15px;"><strong>{{ $results->noc_number }}</strong></span>
                        </div>

                    </div>
                    <div class="card-content-item" style="line-height: 2em; margin-top: 10px;">
                        <p style="text-align: justify;">
                            This is to certify that <strong>{{$results->sending_applicant_name}}</strong>, <strong>{{$results->sending_address}}</strong> (Name of the applicant and company)
                            has been granted permission to export <strong>{{$results->exported_number}}</strong>, <strong>{{$results->exported_volume}}</strong> (Number and Description of
                            the Samples) to <strong>{{$results->receving_recipient_name}}</strong>, <strong>{{$results->receving_recipient_design}}</strong> (Name and Company of recipient) in <strong>{{$results->sending_address}}</strong> (Country of Destination) for the purpose of <strong>{{$results->sample_collected}}</strong> (Description of the type(s) of investigations or analyses to be conducted on the samples). This approval is valid for a period of 90 (Ninety) days with effect from the date of authorization.
                        </p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-iec-number">
                        <p><strong>IEC Number :</strong> <span>{{ $results->sending_iec_number }}</span></p>
                        <p><strong>Application Number : </strong><span>{{ $results->application_number }}</span></p>
                    </div>
                </div>
                <div class="card-body" style="float:right; margin-right:80px; margin-top:-50;">
                    <div class="card-iec-number">
                    <img src="data:image/png;base64, {!! base64_encode($qrcode) !!} " width="100" height="100">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
