<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exporter Form Application</title>
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


        .form-card-tite.text-white {
            background-color: #14468C;

        }

        .title-items {
            margin-top: 10px;
        }

        .form-card-sub-tite.text-black {
            background-color: gainsboro;
        }

        .form-card-sub-tite.text-black {
            background-color: #bbdefba3;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-box">
                    <h4 class="page-title text-center"
                        style="font-size: 20px; font-weight:600; color:#14468C;text-align:center;">Preview of the
                        Application form for Export of Human Biological Material</h4>
                </div>
            </div>
        </div>
        <section class="exporter-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-card-tite text-white">
                        <p class="title-items" style="font-weight:600; color:#fff; padding-right:2px;"><strong>PART-A:
                                Basic information</strong></p>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1" style="font-weight: 500;color:#111;padding:5px;"><span
                                            class="text-center p-1"><strong>(1) Sending Party</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="border:2px solid #ddd;">
                        <table class="table" style="border: 2px;">
                            <tr style="border: 2px solid #ddd;">
                                <th style="width: 33.33% text-align:center;"><strong>(i) Importer Exporter Code(IEC
                                        Number)</strong></th>
                                <th style="width: 33.33%; text-align:center;">(ii) Name of the Applicant</strong></th>
                                <th style="width: 33.33%; text-align:center;"><strong>(iii) Designation of the
                                        Applicant</strong></th>
                            </tr>
                            <tr>
                                <td style="width: 33.33%; text-align:center;">{{ $export_data->sending_iec_number }}
                                </td>
                                <td style="width: 33.33%; text-align:center;">{{ $export_data->sending_applicant_name }}
                                </td>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ $export_data->sending_applicant_design }}</td>
                            </tr>
                            <tr>
                                <th style="width: 33.33% text-align:center;"><strong>(iv) Address of the
                                        Company/Institution</strong></th>
                                <th colspan="2" style="width: 33.33% text-align:center;"><strong>(v)
                                        Whether the applicant/ company/ institution has been denied import authorization
                                        in
                                        last 3 years?</strong></th>
                            </tr>
                            <tr>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ $export_data->sending_add_company_institute }}</td>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ $export_data->comp_institute_denied_export_auth_last_3_years != '' ? 'checked' : '' }}
                                </td>
                                <td style="width: 33.33%; text-align:center;"><a
                                        href="{{ asset('media/exporter/' . $export_data->upload_comp_institute_denied_export) }}"
                                        target="_blank"><label class="form-lable"><strong>View Uploaded
                                                documents</strong></label>
                                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $export_data->comp_institute_denied_export_auth_last_3_years ?? '' }}
                                </td>
                            </tr>
                        </table>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1" style="font-weight: 500;color:#111; padding:5px;"><span
                                            class="text-center p-1"><strong>(2) Receiving Party</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table" style="border: 2px;">
                            <tr>
                                <th style="width: 33.33% text-align:center;">(i) Name of the
                                        Recipient</strong></th>
                                <th style="width: 33.33% text-align:center;">(ii) Name of the
                                        Designation</strong></th>
                                <th style="width: 33.33% text-align:center;">(iii) Address of the
                                        Company/Institution</strong></th>

                            </tr>
                            <tr>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ isset($export_data->receving_recipient_name) ? $export_data->receving_recipient_name : '' }}
                                </td>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ isset($export_data->receving_recipient_design) ? $export_data->receving_recipient_design : '' }}
                                </td>
                                <td style="width: 33.33%; text-align:center;">
                                    {{ isset($export_data->receiving_add_company_institute) ? $export_data->receiving_add_company_institute : '' }}
                                </td>
                            </tr>
                        </table>
                    </div><!--main table div--->
                </div>
        </section>
    </div>
</body>

</html>
