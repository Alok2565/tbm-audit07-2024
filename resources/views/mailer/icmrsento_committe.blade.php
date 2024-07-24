{{-- <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>{{ $icmrmailData['title'] }}</h1>
    <p>{{ $icmrmailData['body'] }}</p>

    <p>Sent Mail to committe by Icmr</p>
    <p>Thank you</p>
</body>
</html> --}}

{{-- <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>

    <p>Please check the New Request form Application</p>
    <p>IEC CODE:- {{ $mailData['sending_iec_number']}}</p>
    <p>Thank you</p>
</body>
</html> --}}

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style>
        p span{
            text-align: justify;
        }
    </style>
</head>

<body style="background-color: #022759;">
    <h1>{{ $icmrmailData['title'] }}</h1>
    <p>{{ $icmrmailData['body'] }}</p>
    <div class="container">
        <div class="mail-text" style="background-color: #ffffff; padding:10px;">
            <h3 class="from-name" style="padding: 5px;">Dear Sir/Madam,</h3>
            {{-- <p class="wel-text" style="padding-top: 10px; font-size:15px;">Welcome to Transfer of Human Biological Material (THBM) online portal!</p> --}}

            <p style="padding-top: 10px; font-size:15px;">Transfer of Human Biological Material  application <strong>(Application number ({{ $icmrmailData['app_number'] }}))</strong> is being forwarded to you  for review/comments.</p>
            <p class="text-white" style="padding-top: 10px; font-size:15px;">The Application under reference can be accessed by you by going to the link <a href="http://thbm.hq@icmr.gov.in" target="_blank" rel="noopener noreferrer">thbm.hq@icmr.gov.in</a> and using your user ID and password.</p>
            <p style="padding-top: 10px; font-size:15px;">You are requested to kindly provide your comments within one week positively for taking a decision on the application.</p>
            <p style="padding-top: 10px; font-size:15px;"><span style="font-size: 17px;"><strong>Important Note:</strong> </span> This is a system generated email. Please do not reply to this email.<br/> For any further correspondence may please write at <a href="http://thbm.hq@icmr.gov.in" target="_blank" rel="noopener noreferrer">thbm.hq@icmr.gov.in</a> OR call us at 011- 26589492.
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

