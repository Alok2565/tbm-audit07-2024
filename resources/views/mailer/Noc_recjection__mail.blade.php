<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        p span {
            text-align: justify;
        }

    </style>
</head>

<body style="background-color: #022759;">
    <h1>{{ $nocRejectMail['title'] }}</h1>
    <p>{{ $nocRejectMail['body'] }}</p>
    <div class="container">
        <div class="mail-text" style="background-color: #ffffff; padding:10px;">
            <h3 class="from-name" style="padding: 5px;">Dear Sir/Madam,</h3>
            {{-- <p style="padding-top: 10px; font-size:15px;">The application with Application number <strong>{{ $commitee_mailData['application_number']}}</strong> has been duly considered at ICMR.</p> --}}
            <p style="padding-top: 10px; font-size:15px;">This is to inform you that your application number <strong>{{ $nocRejectMail['application_number']}}</strong> for grant of No Objection Certificate (NOC) for the export of <strong>{{ $nocRejectMail['exported_number']}}</strong> samples of <strong>@php
                    if(!empty($nocRejectMail['natural_biomaterial_exported']) && $nocRejectMail['natural_biomaterial_exported'] == 'Others') {
                    echo $nocRejectMail['natural_biomaterial_exported_details'];
                    }elseif(!empty($nocRejectMail['natural_biomaterial_exported']) && $nocRejectMail['natural_biomaterial_exported'] == 'Other body fluids') {
                    echo $nocRejectMail['natural_biomaterial_exported_details'];
                    }elseif(!empty($nocRejectMail['natural_biomaterial_exported']) && $nocRejectMail['natural_biomaterial_exported'] == 'Any Tissue/Cells') {
                    echo $nocRejectMail['natural_biomaterial_exported_details'];
                    }else {
                    echo $nocRejectMail['natural_biomaterial_exported'];
                    }
                    @endphp</strong> of <strong>{{ $nocRejectMail['vol_of_sample_text']}}</strong> <strong>{{ $nocRejectMail['exported_volume']}}</strong> each to <strong>{{ $nocRejectMail['receving_recipient_name']}}</strong>, <strong>{{ $nocRejectMail['receiving_add_company_institute']}}</strong> for the purpose of <strong>
                    @php
                    if(!empty($nocRejectMail['specify_purpose_end_use']) && $nocRejectMail['specify_purpose_end_use'] == 'Others') {
                    echo $nocRejectMail['specify_purpose_end_use_details'];
                    }else {
                    echo $nocRejectMail['specify_purpose_end_use'];
                    }
                    @endphp
                </strong> has been reviewed by the THBM Committee, and is Not Approved due to following reason(s):</p>

            <h4 class="from-name" style="padding: 5px; font-size:15px;"><strong>{{ $nocRejectMail['reject_reason'] }}</strong></h4>

            <p style="padding-top: 10px; font-size:15px;">If there are specific concerns or issues that you believe can be addressed, we encourage you to resubmit a fresh application. Please ensure that all necessary details are accurately provided, and any concerns raised are adequately addressed in the resubmitted application.
            </p>


            <div class="row">
                <div class="col-md-3 col-lg-offset-3">
                    <div class="footer-text">
                        <h3 style="padding: 10px;">With regards</h3>
                        <p style="padding-top: 10px;">
                            <span style="font-size: 17px;"><strong>THBM Team</strong></span><br> International Health Division (IHD)<br>
                            Indian Council of Medical Research<br>
                            Department of Health Research<br>
                            Ministry of Health & Family Welfare<br>
                            Government of India<br>
                            V. Ramalingaswami Bhawan, P.O. Box No. 4911<br>
                            Ansari Nagar, New Delhi - 110029, India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
