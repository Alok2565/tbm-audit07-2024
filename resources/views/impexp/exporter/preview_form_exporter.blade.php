<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div class="container">
        <h4 class="page-title text-center" style="font-size: 20px; font-weight:600; color:#14468C;text-align:center;font-family: 'Poppins', sans-serif;">Preview of the Application form for Export of Human Biological Material</h4>

        <table style="width:100%">
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;"><strong>PART-A: Basic information</strong></th>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(1) Sending Party</th>
            </tr>

            <tr>
                <th>(i) Importer Exporter Code(IEC Code)</th>
                <th>(ii) Name of the Applicant</th>
                <th>(iii) Designation of the Applicant</th>
            </tr>
            <tr>
                <td>{{ $export_data->sending_iec_number }}</td>
                <td>{{ $export_data->sending_applicant_name }}</td>
                <td>{{ $export_data->sending_applicant_design }}</td>
            </tr>
            <tr>
                <th>(iv) Address of the Company/Institution</th>
                <th colspan="2">(v) Whether the applicant/ company/ institution has been denied import authorization in last 3 years?</th>
            </tr>
            <tr>
                <td>{{ $export_data->sending_add_company_institute }}</td>
                <td colspan="2">{{ $export_data->comp_institute_denied_export_auth_last_3_years != '' ? 'Yes' : '' }} <a href="{{ asset('media/exporter/' . $export_data->upload_comp_institute_denied_export) }}" target="_blank"><label class="form-lable"><strong>View Uploaded
                                documents</strong></label>
                    </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $export_data->comp_institute_denied_export_auth_last_3_years ?? '' }}</td>

            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(2) Receiving Party</th>
            </tr>
            <tr>
                <th>(i) Name of the Recipient</th>
                <th>(ii) Name of theDesignation</th>
                <th>(iii) Address of the Company/Institution</th>
            </tr>
            <tr>
                <td> {{ isset($export_data->receving_recipient_name) ? $export_data->receving_recipient_name : '' }}</td>
                <td>{{ isset($export_data->receving_recipient_design) ? $export_data->receving_recipient_design : '' }}</td>
                <td>{{ isset($export_data->receiving_add_company_institute) ? $export_data->receiving_add_company_institute : '' }}</td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(3) End user</th>
            </tr>
            <tr>
                <th>(i) If other than the receiving party</th>
                <th>(ii) Name of the End user</th>
                <th>(iii) Address of the End user</th>
            </tr>
            <tr>
                <td>{{$export_data->end_user_receiving_party_yes_no}} {{isset($export_data->end_user_receiving_party)? $export_data->end_user_receiving_party:''}}</td>
                <td>{{isset($export_data->end_user_name)? $export_data->end_user_name:''}}</td>
                <td>{{isset($export_data->end_user_address)? $export_data->end_user_address:''}}</td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;"><strong>PART-B: Other Details</strong></th>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(1) Details of Biomaterial to be exported</th>
            </tr>
            <tr>
                <th>(i) Harmonized System (HS) Code of Item to be exported</th>
                <th>Description of HS Code</th>
                <th>(ii) Nature of biomaterial to be exported</th>
            </tr>
            <tr>
                <td>{{isset($export_data->hs_code)? $export_data->hs_code:''}} </td>
                <td>{{isset($export_data->hs_code_description)? $export_data->hs_code_description:''}}</td>
                <td>@php
                    if(!empty($export_data->natural_biomaterial_exported) && $export_data->natural_biomaterial_exported =='Others'){
                    echo $export_data->natural_biomaterial_exported_details;
                    }elseif(!empty($export_data->natural_biomaterial_exported) && $export_data->natural_biomaterial_exported =='Any Tissue/Cells'){
                    echo $export_data->natural_biomaterial_exported_details;
                    }elseif(!empty($export_data->natural_biomaterial_exported) && $export_data->natural_biomaterial_exported =='Other body fluids'){
                    echo $export_data->natural_biomaterial_exported_details;
                    }else {
                    echo $export_data->natural_biomaterial_exported;
                    }
                    @endphp</td>
            </tr>
            <tr>
                <th>(iii)Where were the samples collected?</th>
                <th colspan="2">(iv)Has consent been taken from the individuals for the exact purpose for which the samples are being exported?</th>
            </tr>
            <tr>
                <td>@php
                    if(!empty($export_data->sample_collected) && $export_data->sample_collected == 'Others'){
                    echo $export_data->sample_collected_details;
                    }else {
                    echo $export_data->sample_collected;
                    }
                    @endphp</td>
                <td colspan="2">{{$export_data->samples_being_exported}} &nbsp; {{($export_data->samples_being_exported_details != '')? $export_data->samples_being_exported_details:''}}</td>
            </tr>
            <tr>
                <th>(v)Details of Quantity of samples to be exported</th>
                <th colspan="2">(vi)Whether repeat export of samples is envisaged?</th>
            </tr>
            <tr>
                <td><strong>Total number of samples: </strong>{{isset($export_data->exported_number)? $export_data->exported_number:''}}, <strong>Volume of Each Sample:</strong> {{isset($export_data->vol_of_sample_text)? $export_data->vol_of_sample_text:''}}, {{isset($export_data->exported_volume)? $export_data->exported_volume:''}}</td>
                <td colspan="2">{{ $export_data->repeat_samples_envisaged_yes_no }} &nbsp;{{ $export_data->repeat_samples_envisaged }}</td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(2) Purpose of export of samples</th>
            </tr>
            <tr>
                <th>(i)Specify purpose/ end use</th>
                <th colspan="2">(ii)Whether the samples will be used for any research analysis?</th>
            </tr>
            <tr>
                <td> @php
                    if (!empty($export_data->specify_purpose_end_use) && $export_data->specify_purpose_end_uses =='Others') {
                    echo $export_data->specify_purpose_end_use_details;
                    } else {
                    echo $export_data->specify_purpose_end_use;
                    }
                    @endphp</td>
                <td colspan="2">{{ $export_data->samples_used_research_analysis_yes_no}}
                    &nbsp; @php
                    if(!empty($export_data->samples_used_research_analysis) && $export_data->samples_used_research_analysis == 'Others'){
                    echo $export_data->samples_used_research_analysis_details;
                    }else {
                    echo $export_data->samples_used_research_analysis;
                    }
                    @endphp
                </td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(3) Storage of samples/Leftover samples **</th>
            </tr>
            <tr>
                <th>(i) Will leftover samples be stored?*</th>
                <th colspan="2">(ii) Purpose of samples storage*</th>
            </tr>
            <tr>
                <td>{{ $export_data->leftover_samples_store_yes_no }}
                    &nbsp; {{ ($export_data->leftover_samples_store != '')? $export_data->leftover_samples_store:''; }}
                </td>

                <td colspan="2"> @php
                    if (!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store =='Further analysis') {
                    echo $export_data->purpose_sample_store_details;
                    } else {
                    echo $export_data->purpose_sample_store;
                    }
                    @endphp</td>
            </tr>
            <tr>
                <th>(iii) Duration of the samples storage*</th>
                <th colspan="2">(iv) Facility where samples will be stored*</th>
            </tr>
            <tr>
            <tr>
                <td>{{ ($export_data->duration_sample_store != '')? $export_data->duration_sample_store:''; }}
                </td>

                <td colspan="2">{{ ($export_data->facility_sample_store != '')? $export_data->facility_sample_store:''; }}</td>
            </tr>

            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(4) National security concerns</th>
            </tr>
            <tr>
                <th>(i) Whether the company/institution/department where the material is being exported has any adverse reporting or has figured adversely from a national security angle?*</th>
                <th colspan="2">(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?*</th>
            </tr>
            <tr>
                <td>{{ $export_data->national_security_angle_yes_no }} &nbsp;{{ ($export_data->national_security_angle != '')? $export_data->national_security_angle:''; }}</td>

                <td colspan="2">{{ $export_data->foreign_country_army_military_yes_no }} &nbsp; {{ ($export_data->foreign_country_army_military != '')? $export_data->foreign_country_army_military:''; }}</td>
            </tr>
            <tr>
                <th colspan="3">(iii) If the Biomaterial contains micro-organisms listed in appendix 3 category 2 of list of SCOMET items, has approval been obtained from DGFT?*</th>
            </tr>
            <tr><td colspan="3"> {{ $export_data->biomaterial_micro_organisms_approval}} &nbsp; <a href="{{ asset('media/exporter/'.$export_data->biomaterial_micro_organisms_approval_file) }}" target="_blank"><label class="form-lable"><strong>Click to View</strong></label>
            </a></td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;">(5) IBSC/RCGM approval, as applicable ***</th>
            </tr>
            <tr>
                <th colspan="3">(i) For the export of hazardous micro organisms/genetically engineered organisms or cells has IBSC/RCGM approval been obtained?*</th>
            </tr>
            <tr><td colspan="3">  {{ $export_data->ibsc_rcgm_approval_applicable }}&nbsp; <a href="{{ asset('media/exporter/'.$export_data->ibsc_rcgm_approval_applicable_file) }}" target="_blank"><label class="form-lable"><strong>Click to View </strong></label>
            </a></td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;"><strong>PART -C: Declarations ****</strong></th>
            </tr>
            <tr>
                <th colspan="3">(i) Declaration by the person requesting export/storage of samples (Sender)</th>
            </tr>
            <tr><td colspan="3"><input type="checkbox" class="form-check-input" id="invalidCheck" checked style="width:20px; height:20px; border: 1px solid #022759"> I certify that the information provided in this request form is true and
                correct to the best of my knowledge, and I hereby declare that the samples {{ (!empty($export_data->natural_biomaterial_exported))? $export_data->natural_biomaterial_exported:''}} referred to herein will be utilized for the purpose of {{(!empty($export_data->sender_certify_information_provided))? $export_data->sender_certify_information_provided:''}} only, the samples will not be used for any other purposes.</td>
            </tr>
            <tr>
                <th colspan="3">(ii) Copy of Commercial contract/Proforma invoice</th>
            </tr>
            <tr><td colspan="3"><input type="checkbox" class="form-check-input" id="invalidCheck" checked style="width:20px; height:20px; border: 1px solid #022759">Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply FEMA regulations and other guidelines issued by RBI regarding foreign transactions.</td>
            </tr>
            <tr>
                <th colspan="3" class="title-items" style="font-weight:600; padding-right:2px;"><strong>Declaration by Recipient of samples</strong></th>
            </tr>
            <tr>
                <th colspan="3">Upload duly signed declaration of letter</th>
            </tr>
            <tr><td colspan="3"><a href="{{ asset('media/exporter/'.$export_data->declaration_letter) }}" target="_blank" style="{{ ($export_data->declaration_letter != '')? '':'display:none;' }}"><label class="form-lable"><strong>View Letter</strong></label>
            </a></td>
            </tr>
            <tr><td colspan="3">This is to certify that the samples referred to herein being sent to <b>&nbsp;{{ $export_data->sending_applicant_name }} </b> (Name of Institution) for analyses/investigations will be in the custody of <b> {{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:''}} </b> and I hereby confirm that they will be utilized for the purpose of <b> {{ ($export_data->sender_certify_information_provided != '')? $export_data->sender_certify_information_provided:''}}
            </b>  only, and I accept full responsibility and control over the usage of these samples and this sample will not be used for any other purposes. </td>
            </tr>
        </table>
    </div>
</body>
</html>
