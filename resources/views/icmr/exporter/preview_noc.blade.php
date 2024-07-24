
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Noc Issued Exporter | Transfer of Human Biological Material (THBM)</title>
    <style>
        input,
        select {
            -prince-pdf-form: enable;
        }

        /*
        Define colors and sizing elements used in this template
        */
        :root {
            --font-color: black;
            --highlight-color: #00a5ce;
            --secondary-color: #868f95;
            --header-bg-color: #022759;
            --footer-bg-color: #BFC0C3;
            --table-img-bg-color: #BFC0C3;
            --gap-size: 15px;
        }



        /*
        The body itself has no margin but a padding top & bottom 1cm and left & right 2cm.
        Additionally the default font family, size and color for the document is defined
        here.
        */
        body {
            margin: 0;
            padding: 1cm 2cm;
            color: var(--font-color);
            font-family: 'Poppins', sans-serif;
            font-size: 10pt;
        }

        hr {
            margin: 0.8cm 0;
            height: 0;
            border: 0;
            border-top: 1mm solid var(--highlight-color);
        }

        header {
            height: 3.5cm;
            position: running(header);
            /* background-color:var(--header-bg-color); */
        }

        /*
        For the different sections in the header we use some flexbox and keep space between
        with the justify-content property.
        */
        header .headerSection {
            display: flex;
            height: 4cm;
            align-items: center;
            justify-content: space-between;
        }

        /*
        To move the first sections a little down and have more space between the top of
        the document and the logo/company name we give the section a padding top of 5mm.
        */
        header .headerSection:first-child {
            padding-top: .5cm;
        }

        /*
        Similar we keep some space at the bottom of the header with the padding-bottom
        property.
        */
        header .headerSection:last-child {
            padding-bottom: .5cm;
        }

        /*
        Within the header sections we have defined two DIV elements, and the last one in
        each headerSection element should only take 35% of the headers width.
        */
        header .headerSection div:last-child {
            width: 35%;
            margin-top: 1cm;
        }

        /*
        The last child in the second header section should not be restricted to a 35% width.
        */
        header .headerSection:last-child div:last-child {
            width: auto;
        }

        /*
        For the logo, where we use an SVG image and the company text we also use flexbox
        to align them correctly.
        */
        header .logoAndName {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /*
        The SVG gets set to a fixed size and get 5mm margin right to keep some distance
        to the company name.
        */
        header .logoAndName svg {
            width: 1.5cm;
            height: 1.5cm;
            margin-right: .5cm;
        }


        /*
        All header elements and paragraphs within the HTML HEADER tag get a margin of 0.
        */
        header h1,
        header h2,
        header h3,
        header p {
            margin: 0;
        }

        header h2,
        header h3 {
            text-transform: uppercase;
        }

        header h2 {
            font-size: 120%;
        }


        .qr_code svg {
	    width: 10% !important;
        }
    </style>
</head>

<body>
    <header>
        <div class="headerSection">
            <div class="logoAndName">
                <h1>
                    <h1><img src="{{ asset('public/assets/images/dhr_logo_jpg.jpeg') }}" alt=""
                            style="width: 310px; height: 100px;margin-top: -20px;"></h1>
                </h1>
            </div>
            <div class="logo_left">
                <h1><img src="{{ asset('public/assets/images/icmr_main_logo1.jpg') }}" alt=""
                        style="width: 310px; height: 100px;margin-top: -57px;"></h1>
            </div>
        </div>
    </header>

<br><br>
        <span style="text-align: center; !important;font-size: 25px; ">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>No Objection Certificate (NOC) for Export of Human Biological
            Material</strong></span><br>
   
    <main>
    <br>
        <div class="card-body">
            <div class="card-iec-number">
                <h2 style="font-style: italic;">Application number: <span style="color: #243774;">{{ $results->application_number }}</span></h2>
                <h2 style="font-style: italic;"> Importer Exporter Code (IEC): <span style="color: #243774;">{{ $results->sending_iec_number }}</span></h2>
            </div>
        </div>
    </main>
        <hr />
        <p style="text-align: justify; font-size:15px; line-height:2em">This is to certify that <strong>{{$results->sending_applicant_name}}</strong> has been granted permission to export <strong>{{$results->exported_number}}</strong> samples of <strong>
                        @php
                            if(!empty($results->natural_biomaterial_exported) && $results->natural_biomaterial_exported == 'Others'){
                                echo $results->natural_biomaterial_exported_details??'';
                            }else if(!empty($results->natural_biomaterial_exported) && $results->natural_biomaterial_exported == 'Other body fluids'){
                                echo $results->natural_biomaterial_exported_details??'';
                            }else if(!empty($results->natural_biomaterial_exported) && $results->natural_biomaterial_exported == 'Any Tissue/Cells'){
                                if(!empty($results->natural_biomaterial_exported_details)){
                                    echo $results->natural_biomaterial_exported_details??'';
                                }else{
                                    echo $results->natural_biomaterial_exported_any_tissue_details??'';
                                }
                                //echo (!empty($results->natural_biomaterial_exported_details))?$results->natural_biomaterial_exported_details:$results->natural_biomaterial_exported_any_tissue_details;
                            }else{
                                echo $results->natural_biomaterial_exported;
                            }
                            @endphp
                        </strong>  of <strong> {{$results->vol_of_sample_text}} &nbsp; {{$results->exported_volume}}</strong> each to <strong>{{ $results->receving_recipient_name }}</strong>, <strong>{{ $results->receiving_add_company_institute }}</strong> for the purpose of <strong>@php
                        $other = 'Others';
                        if (!empty($results->specify_purpose_end_use_details)) {
                        echo $results->specify_purpose_end_use_details;
                        } elseif(empty($results->specify_purpose_end_use)) {
                        echo $other;
                        } else {
                        echo $results->specify_purpose_end_use;
                        }
                        @endphp</strong> only. This approval is valid for a period of 90 (Ninety) days with effect from the date of authorization.</p>
        <br/></br>
        <h3><b>Date: {{ date('d-m-Y') }}</b></h3>
        <br/>
        <div class="card-body">
            <div class="card-iec-number">
                <span class="qr_code">{{ $qrcode }}</span>
            {{-- <img src="data:image/png;base64, {!! base64_encode($qrcode) !!} " width="100" height="100"> --}}
            </div>
            <div class="back-button-noc">
                <a href="{{url('icmr/assign-committee-export')}}"><button type="button" class="btn btn-primary" style="float:right; margin-right:80px; margin-top:-50;">Go Back</button></a>
            </div>
            <div class="noc-text">
            <p style="text-align: justify; font-size:15px; line-height:2em; margin-top:10px; color:red;"><span>*</span> This is a computer-generated document. No signature is required. </p>
            </div>
        </div>
       
</body>

</html>
