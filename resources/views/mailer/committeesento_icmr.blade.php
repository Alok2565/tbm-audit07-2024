{{-- <!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>{{ $commitee_mailData['title'] }}</h1>
    <p>{{ $commitee_mailData['body'] }}</p>

    <p>Revert comments by Committee committee</p>

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
    <h1>{{ $commitee_mailData['title'] }}</h1>
    <p>{{ $commitee_mailData['body'] }}</p>
    <div class="container">
        <div class="mail-text" style="background-color: #ffffff; padding:10px;">
            <h3 class="from-name" style="padding: 5px;">Dear Sir/Madam,</h3>
            {{-- <p class="wel-text" style="padding-top: 10px; font-size:15px;">Welcome to Transfer of Human Biological Material (THBM) online portal!</p> --}}
            <p style="padding-top: 10px; font-size:15px;">The application with Application number <strong>{{ $commitee_mailData['application_number']}}</strong> has been duly considered at ICMR.</p>
            <p style="padding-top: 10px; font-size:15px;">You may kindly login the THBM portal (with your login credentials) to view the decision of your application.</p>
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
