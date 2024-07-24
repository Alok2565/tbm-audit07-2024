@extends('committee.layouts.admin')
@section('title', 'Preview Exporter')
@section('content')
    <div class="page-title-box">
        <section class="py-2">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ul class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ url('imp-exp/exporter') }}" style="font-weight:600;">Back to
                                    Lists</a>
                            </button></li>
                        </ul>
                    </div>
                    <h4 class="page-title text-center" style="font-size: 20px; font-weight:600; color:#14468C">Preview of the Application form for Export of Human Biological Material</h4>
                </div>
            </div>

        </section>
        <section class="exporter-section">

            <form class="py-1 mb-5" action="{{ route('exporter.manage_exporter_process') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card ">
                    <div class="form-card-tite text-white">
                        <p class="title-items" style="font-weight: 600"><strong>PART-A: Basic information</strong></p>
                    </div>
                    <div class="form-card-sub-tite text-black">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sub-title p-1" style="font-weight: 600"><span
                                        class="text-center p-1"><strong>(1) Sending Party</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sending_iec_number" class="form-label"><strong>(i) Importer Exporter Code
                                            (IEC Number)</strong></label>
                                    <input type="text" value="{{ $export_data->sending_iec_number }}"
                                        class="form-control sending_iec_number" id="sending_iec_number"
                                        name="sending_iec_number" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sending_applicant_name" class="form-label"><strong>(ii) Name of the
                                            Applicant</strong></label>
                                    <input type="text" value="{{ $export_data->sending_applicant_name }}" class="form-control"
                                        id="sending_applicant_name" name="sending_applicant_name" readonly
                                        onkeypress="return isAlfa(event)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sending_applicant_design" class="form-label"><strong>(iii) Designation of
                                            the Applicant</strong></label>
                                    <input type="text" value="{{ $export_data->sending_applicant_design }}" class="form-control"
                                        id="sending_applicant_design" name="sending_applicant_design"
                                        readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <label for="sending_add_company_institute" class="form-label"><strong>(iv) Address of
                                            the Company/Institution</strong></label>
                                    <input type="text" value="{{ $export_data->sending_add_company_institute }}" class="form-control"
                                        id="sending_add_company_institute" name="sending_add_company_institute" readonly>
                                </div>
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="comp_intitute_denied_export_auth_last_3_years" class="form-label"><strong>(v)
                                        Whether the applicant/ company/ institution has been denied import authorization in
                                        last 3 years?</strong></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">{{ $export_data->denied_export_auth_last_3_years_yes_no }}

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wirtetext_yes" style="{{($export_data->upload_comp_institute_denied_export != '')? '':'display: none;'}}">
                                        <a href="{{ asset('media/exporter/'.$export_data->upload_comp_institute_denied_export) }}" target="_blank"><label class="form-lable"><strong>View Uploaded documents</strong></label>
                                                        </a>

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="comp_institute_denied_export_auth_last_3_years"
                                                class="form-lable wirtetext_yes" style="{{($export_data->comp_institute_denied_export_auth_last_3_years != '')? '':'display: none;'}}">Provide
                                                details</label>
                                            <textarea name="comp_institute_denied_export_auth_last_3_years" class="wirtetext_yes" id="wirtetext_yes"
                                                maxlength="100" cols="35" rows="2" max="100" placeholder="Description of items"
                                                style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; {{($export_data->comp_institute_denied_export_auth_last_3_years != '')? '':'display: none;'}}" readonly>{{ ($export_data->comp_institute_denied_export_auth_last_3_years)??'' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(2) Receiving
                                                Party</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receving_recipient_name" class="form-label"><strong>(i) Name of the
                                                Recipient</strong></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_name" name="receving_recipient_name"
                                            onkeypress="return isAlfa(event)" value="{{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receving_recipient_design" class="form-label"><strong>(ii) Designation of Recipient</strong></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_design" name="receving_recipient_design"
                                            onkeypress="return isAlfa(event)" value="{{isset($export_data->receving_recipient_design)? $export_data->receving_recipient_design:''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receiving_add_company_institute" class="form-label"><strong>(iii)
                                                Address of the Company/Institution</strong></label>
                                        <input type="text" class="form-control"
                                            id="receiving_add_company_institute" name="receiving_add_company_institute" value="{{isset($export_data->receiving_add_company_institute)? $export_data->receiving_add_company_institute:''}}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-sub-tite text-black mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(3) End
                                                user</b></label></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label for="end_user_receiving_party" class="justify-between"><strong>(i) If other
                                            than the receiving party</strong></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mt-2">
                                            {{$export_data->end_user_receiving_party_yes_no}}

                                                <div class="form-group">
                                                    <textarea name="end_user_receiving_party" value="" id="wirtetextEnd_user_yes" maxlength="100" cols="42"
                                                        rows="2" max="100" placeholder="Description of items"
                                                        style="border:1px solid #ddd; border-radius: 5px !important; {{($export_data->end_user_receiving_party != '')? '':'display: none;'}}" readonly>{{isset($export_data->end_user_receiving_party)? $export_data->end_user_receiving_party:''}}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="end_user_name" class="form-label"><strong>(ii) Name of the End
                                                user</strong></label>
                                        <input type="text" value="{{isset($export_data->end_user_name)? $export_data->end_user_name:''}}" readonly class="form-control" id="end_user_name"
                                            name="end_user_name" onkeypress="return isAlfa(event)">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="end_user_address" class="form-label"><strong>(iii) Address of the End
                                                user</strong></label>
                                        <input type="text" value="{{isset($export_data->end_user_address)? $export_data->end_user_address:''}}" readonly class="form-control" id="end_user_address"
                                            name="end_user_address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-tite text-white">
                            <p class="title-items" style="font-weight: 600">PART-B: Other Details</p>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(1) Details of Biomaterial to be exported</b></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>(i) Harmonized System (HS) Code of Item to be exported</strong></label>
                                                <input type="text" class="form-control hs_code" maxlength="8" id="hs_code"
                                                name="hs_code" value="{{isset($export_data->hs_code)? $export_data->hs_code:''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>Description of HS Code</strong></label>
                                        <input type="text" class="form-control" name="desc" class="desc" id="desc" value="{{isset($export_data->hs_code_description)? $export_data->hs_code_description:''}}" readonly>
                                    </div>
                                </div>
                                @php
                                    $a = explode(",", $export_data->natural_biomaterial_exported);
                                    @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong></label><br>

                                        <ul>
                                        @php
                                        if(!empty($a)){
                                            foreach($a as $value1){
                                                @endphp
                                                <li>{{ $value1 }}</li>
                                                @php
                                            }
                                        }
                                        @endphp
                                    </ul>

                                        <textarea name="natural_biomaterial_exported[]" id="TextotherBodyFluids" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Description of items"
                                            style="border:1px solid #ddd; border-radius: 5px !important; {{($export_data->natural_biomaterial_exported_details != '')? '':'display: none;'}}" readonly>{{isset($export_data->natural_biomaterial_exported_details)? $export_data->natural_biomaterial_exported_details:''}}</textarea>

                                        <textarea name="natural_biomaterial_exported[]" id="TextNaturalbiomateria" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Description of items"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;" readonly></textarea>
                                    </div>
                                </div>
                            </div>
                            @php
                                    $b = explode(",", $export_data->sample_collected);
                                    @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="sample_collected" class="form-label"><strong>(iii) Where were the samples collected?</strong></label><br>
                                        <ul>
                                        @php
                                        if(!empty($b)){
                                            foreach($b as $value2){
                                                @endphp
                                                <li>{{ $value2 }}</li>
                                                @php
                                            }
                                        }
                                        @endphp
                                    </ul>

                                            <textarea class="mt-2" name="sample_collected[]" id="TextSampleCollected" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{($export_data->sample_collected_details != '')? '':'display: none;'}}" readonly>{{isset($export_data->sample_collected_details)? $export_data->sample_collected_details:''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="sample_collected" class="form-label mt-2"><strong>(iv) Has consent been taken from the individuals for the exact purpose for which the samples are being exported?</strong></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            {{$export_data->samples_being_exported}}

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sample_collected" class="form-label mt-2 TextsamplesExported" style="display: none;"><strong>Provide details</strong></label>
                                                <textarea name="sampes_being_exported" class="TextsamplesExported" id="TextsamplesExported" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{($export_data->samples_being_exported_details != '')? '':'display: none;'}}" readonly>{{($export_data->samples_being_exported_details != '')? $export_data->samples_being_exported_details:''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exported_number" class="form-label mt-2"><strong>(v) Details of Quantity of samples to be exported</strong></label>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Total number of samples</label>
                                                <input type="text" class="form-control" id="exported_number" name="exported_number" value="{{isset($export_data->exported_number)? $export_data->exported_number:''}}" readonly >
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <label for="" class="form-label text-center">Volume of each sample</label>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="vol_of_sample_text" name="vol_of_sample_text" value="{{isset($export_data->vol_of_sample_text)? $export_data->vol_of_sample_text:''}}" readonly >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exported_volume" name="exported_volume" value="{{isset($export_data->exported_volume)? $export_data->exported_volume:''}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="repeat_samples_envisaged" class="form-label mt-2"><strong>(vi) Whether repeat export of samples is envisaged?</strong></label><br>
                                    {{ $export_data->repeat_samples_envisaged_yes_no }}

                                    <div class="form-group mt-2">

                                                <div class="form-group">
                                                    <label for="repeat_samples_envisaged" class="form-label mt-2 wirteRepeat_export" style="{{ ($export_data->repeat_samples_envisaged != '')? '':'display:none'; }}"><strong></strong></label>
                                                    <textarea name="repeat_samples_envisaged" class="wirteRepeat_export" id="wirteRepeat_export" maxlength="100" cols="60" rows="2" max="100" placeholder="description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->repeat_samples_envisaged != '')? '':'display:none'; }}" readonly>{{ $export_data->repeat_samples_envisaged }}</textarea>
                                                </div>

                                </div>
                            </div>
                        </div><!--card body-->
                    </div><!--card-->
                    {{-- <div class="card"> --}}
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(2) Purpose of export of samples</b></span></div>
                                </div>
                            </div>
                        </div>
                        @php
                                    $c = explode(",", $export_data->specify_purpose_end_use);
                                    @endphp
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specify_purpose_end_use" class="form-label"><strong>(i) Specify purpose/ end use</strong></label>
                                        <ul>
                                        @php
                                        if(!empty($c)){
                                            foreach($c as $value3){
                                                @endphp
                                                <li>{{ $value3 }}</li>
                                                @php
                                            }
                                        }
                                        @endphp
                                    </ul>

                                        <textarea name="specify_purpose_end_use[]" readonly id="specifyText_end_use" maxlength="100" cols="72" rows="2" max="100" placeholder="Provide Details" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->specify_purpose_end_use_details != '')? '':'display:none'; }}">{{ ($export_data->specify_purpose_end_use_details != '')? $export_data->specify_purpose_end_use_details:''; }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="samples_used_research_analysis mt-1" class="form-label"><strong>(ii) Whether the samples will be used for any research analysis?</strong></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            {{ $export_data->samples_used_research_analysis_yes_no}}

                                            </div>
                                        </div>
                                        @php
                                    $d = explode(",", $export_data->samples_used_research_analysis);
                                    @endphp
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <ul>
                                        @php
                                        if(!empty($d)){
                                            foreach($d as $value4){
                                                @endphp
                                                <li>{{ $value4 }}</li>
                                                @php
                                            }
                                        }
                                        @endphp
                                    </ul>


                                                <textarea name="samples_used_research_analysis[]" readonly id="wirteSamplesAnalysis" maxlength="100" cols="40" rows="2" max="100" placeholder="Specify Details" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->samples_used_research_analysis_details != '')? '':'display:none'; }}">{{ ($export_data->samples_used_research_analysis_details != '')? $export_data->samples_used_research_analysis:''; }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><strong>(3) Storage of samples/Leftover samples </strong><span class="justify-between" style="color:#14468C; font-size:15px">**</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">

                                        <label for="leftover_samples_store" class="form-label"><strong>(i) Will leftover samples be stored?</strong></label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                {{ $export_data->leftover_samples_store_yes_no }}

                                                    <div class="form-group">
                                                        <label for="leftover_samples_store" class="form-label wirtetextleftover" style="{{ ($export_data->leftover_samples_store != '')? '':'display:none;'; }}"><strong> Details</strong></label>
                                                        <textarea name="leftover_samples_store" class="wirtetextleftover" id="wirtetextleftover" maxlength="100" cols="65" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->leftover_samples_store != '')? '':'display:none;'; }}" readonly>{{ ($export_data->leftover_samples_store != '')? $export_data->leftover_samples_store:''; }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">

                                        <label for="purpose_sample_store" class="form-label"><strong>(ii) Purpose of samples storage</strong></label>

                                        @php
                                    $d1 = explode(",", $export_data->purpose_sample_store);
                                    @endphp
                                        <div class="col-md-8">
                                            <div class="form-group">
                                            <ul>
                                        @php
                                        if(!empty($d1)){
                                            foreach($d1 as $value41){
                                                @endphp
                                                <li>{{ $value41 }}</li>
                                                @php
                                            }
                                        }
                                        @endphp
                                    </ul>


                                           <label for="purpose_sample_store" class="form-label wirteotherFurther" style="{{ ($export_data->purpose_sample_store_details != '')? '':'display:none'; }}"><strong>Details</strong></label>
                                           <textarea name="purpose_sample_store" class="wirteotherFurther" id="wirteotherFurther" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->purpose_sample_store_details != '')? '':'display:none;' }}" readonly>{{$export_data->purpose_sample_store_details}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">

                                        <label for="duration_sample_store" class="form-label"><strong>(iii) Duration of the sample storage</strong></label>

                                        <input type="text" value="{{ ($export_data->duration_sample_store != '')? $export_data->duration_sample_store:''; }}" readonly name="duration_sample_store" id="duration_sample_store" class="form-control mt-2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">

                                        <label for="facility_sample_store" class="form-label"><strong>(iv) Facility where samples will be stored</strong></label>
                                        <input type="text" value="{{ ($export_data->facility_sample_store != '')? $export_data->facility_sample_store:''; }}" readonly name="facility_sample_store" id="facility_sample_store" class="form-control mt-2" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-sub-tite text-black mt-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(4) National security concerns</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">

                                        <label for="national_security_angle" class="form-label"><strong>(i) Whether the company/institution/department where the material is being exported has any adverse reporting or has figured adversely from a national security angle?</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                {{ $export_data->national_security_angle_yes_no }}

                                                    <div class="form-group">
                                                        <label for="national_security_angle" class="form-label textNationalSecurity" style="{{ ($export_data->national_security_angle != '')? '':'display:none'; }}"><strong>Details</strong></label>
                                                        <textarea name="national_security_angle" class="textNationalSecurity" id="textNationalSecurity" maxlength="100" cols="65" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->national_security_angle != '')? '':'display:none;'; }}" readonly>{{ ($export_data->national_security_angle != '')? $export_data->national_security_angle:''; }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        {{-- <label for="foreign_country_army_military" class="justify-between"><strong>(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?</strong></label> --}}
                                        <label for="foreign_country_army_military" class="form-label"><strong>(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                {{ $export_data->foreign_country_army_military_yes_no }}

                                                    <div class="form-group">
                                                        <label for="foreign_country_army_military" class="form-label armyMilitaryText" style="{{ ($export_data->foreign_country_army_military != '')? '':'display:none;'; }}"><strong>Details</strong></label>
                                                        <textarea name="foreign_country_army_military" class="armyMilitaryText" id="armyMilitaryText" maxlength="100" cols="65" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->foreign_country_army_military != '')? '':'display:none;'; }}" readonly>{{ ($export_data->foreign_country_army_military != '')? $export_data->foreign_country_army_military:''; }}</textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="biomaterial_micro_organisms_approval" class="form-label mt-2"><strong>(iii) If the Biomaterial contains micro-organisms listed in appendix 3 category 2 of list of SCOMET items, has approval been obtained from DGFT?</strong></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    {{ $export_data->biomaterial_micro_organisms_approval}}


                                        <div class="input-group" style="width:50%; {{ ($export_data->biomaterial_micro_organisms_approval_file != '')? '':'display:none;' }}"><a href="{{ asset('media/exporter/'.$export_data->biomaterial_micro_organisms_approval_file) }}" target="_blank"><label class="form-lable"><strong>Click to View</strong></label>
                                                        </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b><span>(5) IBSC/RCGM approval, as applicable</span> <span class="justify-between" style="color:#14468C; font-size:15px">***</span></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label for="ibsc_rcgm_approval_applicable" class="form-label"><strong>(i) For the export of infectious biological material, has IBSC/RCGM approval been obtained?</strong></label>
                                <div class="col-md-6">

                                    <div class="form-group">
                                    {{ $export_data->ibsc_rcgm_approval_applicable }}

                                        <label for="upload_files" name="ibsc_rcgm_approval_applicable" style="display: none;"
                                                class="form-lable ibscRcgmText"><span class="d-inline-block ibscRcgmText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        <div class="input-group" style="width:50%; {{ ($export_data->ibsc_rcgm_approval_applicable_file != '')? '':'display:none;' }}">
                                            <input type="file" name="ibsc_rcgm_approval_applicable" class="form-control ibscRcgmText" id="ibscRcgmText" style="display:none;">
                                            <a href="{{ asset('media/exporter/'.$export_data->ibsc_rcgm_approval_applicable_file) }}" target="_blank"><label class="form-lable"><strong>Click to View </strong></label>
                                                        </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-tite text-white">
                            <p class="title-items" style="font-weight: 600">PART -C: Declarations ****</p>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="d-flex custom-border">
                                    <div class="col-md-12">
                                        <div class="border-1">
                                            <div class="sub-title p-1"><span class="text-center p-1"><b>(i)
                                                Declaration by the person requesting export/storage of samples (Sender)</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="m-2">  <label class="m-2 form-check-label" for="invalidCheck"> <input type="checkbox" class="form-check-input" id="invalidCheck" checked style="width:20px; height:20px; border: 1px solid #022759"> <span class="text-danger">*</span> I certify that the information provided in this request form is true and
                                        correct to the best of my knowledge, and I hereby declare that the samples <strong><span id="sample_show_in_declaration_id">{{ (!empty($export_data->natural_biomaterial_exported))? $export_data->natural_biomaterial_exported:''}}</span></strong>
                                        referred to herein will be utilized for the purpose of <strong><span> {{(!empty($export_data->specify_purpose_end_use))? $export_data->specify_purpose_end_use:''}} </span></strong>only, the samples will not be used for any other purposes.</span></label>
                                        <div class="form-card-sub-tite text-black mt-3">
                                            <div class="row">
                                                <div class="d-flex custom-border">
                                                    <div class="col-md-12">
                                                        <div class="border-1">
                                                            <div class="sub-title p-1"><span class="text-center p-1"><b>(ii) Copy of Commercial contract/Proforma invoice</b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <p class="justify-content-between border-bottom mt-3 m-2"><label class="form-check-label" for="invalidCheck"> <input type="checkbox" class="form-check-input" id="invalidCheck" checked style="width:20px; height:20px; border: 1px solid #022759"> <span class="text-danger">*</span> Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply FEMA regulations and other guidelines issued by
                                        RBI regarding foreign transactions.</label></p>
                                        <div class="row">
                                            <div class="col-md-7">
                                    {{-- <p class="p-2">(Authorized signatory on behalf of
                                        organization as per law of company)</p> --}}
                                    </div>
                                        <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                                <label for="" class="form-label m-1"><strong>Upload Certified copy of commercial Contract/Proforma Invoice</strong></label>
                                                <a href="{{ asset('media/exporter/'.$export_data->certified_copy_proforma) }}" target="_blank" style="{{ ($export_data->certified_copy_proforma != '')? '':'display:none;' }}"><label class="form-lable"><strong>View Invoice</strong></label>
                                                        </a>
                                            </div>
                                        </div>
                                        </div>

                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_name" class="justify-center form-label"><strong>Name</strong></label>
                                                <input type="text" readonly value="{{ ($export_data->sender_name != '')? $export_data->sender_name:''}}" name="sender_name" id="sender_name" class="form-control mt-2 " placeholder="" onkeypress="return isAlfa(event)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_designation" class="justify-center form-label"><strong>Designation</strong></label>
                                                <input type="text" readonly value="{{ ($export_data->sender_designation != '')? $export_data->sender_designation:''}}" name="sender_designation" id="sender_designation" class="form-control mt-2" placeholder="" onkeypress="return isAlfa(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_address" class="justify-center form-label"><strong>Address</strong></label>
                                                <input type="text" readonly value="{{ ($export_data->sender_address != '')? $export_data->sender_address:''}}" name="sender_address" id="sender_address" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_date" class="justify-center form-label"><strong>Date</strong></label>
                                                <input type="text"  name="sender_date" id="sender_date" class="form-control mt-2" readonly value="<?php date_default_timezone_set('Asia/Calcutta');
                                //echo date('d-m-Y H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <div class="form-card-sub-tite text-black mt-3">
                                        <div class="row">
                                            <div class="d-flex custom-border">
                                                <div class="col-md-12">
                                                    <div class="border-1">
                                                        <div class="sub-title p-1"><span class="text-center p-1"><b>Declaration by Recipient of samples</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                                {{-- <label for="" class="form-label m-1"><strong>Upload declaration of letter</strong></label><br> --}}
                                                <label for="" class="form-label m-1"><strong>Upload duly signed declaration of letter</strong></label><br>
                                                <a href="{{ asset('media/exporter/'.$export_data->declaration_letter) }}" target="_blank" style="{{ ($export_data->declaration_letter != '')? '':'display:none;' }}"><label class="form-lable"><strong>View Letter</strong></label>
                                                        </a>
                                            </div>
                                            <p class="p-2" style="color:green"><b>Note:-</b> Please upload declaration of letter with authorized signature.</p>
                                        </div>
                                   <!-- <div class="col-md-7">
                                             <div class="upload-download mt-2">
                                                <label for="" class="form-label m-1"><strong>Download declaration letter</strong></label><br>
                                                <a href="{{ asset('assets/backend/images/exporter/declarationby-recipient-of-samples.pdf') }}" class="download-letter-item" target="_blank"><button type="button" class="btn btn-primary mt-1">Download Letter</button></a>
                                    </div>

                                </div>-->
                                </div>
                                    <div class="col-md-12 mb-5 m-2">
                                        <p>This is to certify that the samples referred to herein being sent to <b>&nbsp;{{ ($export_data->sender_name != '')? $export_data->sender_name:''}} </b> (Name of Institution) for analyses/investigations will be in the
                                            <br>custody of <b> {{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:''}} </b> and I hereby confirm that they will be utilized for the purpose of <b> {{ ($export_data->specify_purpose_end_use != '')? $export_data->specify_purpose_end_use:''}}
                                    </b>  only, and I accept full<br> responsibility and control over the usage of these samples and this sample will not be used for any other purposes. </p>
                                    </div>

                                <div class="col-md-12">
                                    <div class="content-for-exp p-2 m-3" style="border: 1px solid #ddd;">
                                        <p>*If samples are to be exported to more than one institution/department, a separate request form should be completed for each recipient.</p>
                                        <p>**Request for storage is necessary if the samples are to be stored.</p>
                                        <p>*** For the export of infectious biological material, IBSC/RCGM approval to be sought as per the Revised Simplified Procedures/ Guidelines on Import, Export and Exchange of GE organisms and products thereof for R&D purpose, 2020 vide DBT OM dated 17.01.2020 and accordingly, form B3, duly filled in every aspect, to be submitted through IBKP portal. (https://ibkp.dbtindia.gov.in/)</p>
                                        <p>****To be completed every time prior to shipping sample.</p>
                                    </div>
                                </div>
                                {{-- <div class="col-md-12">
                                <button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ url('imp-exp/exporter/preview_pdf/'.$export_data->id) }}" style="font-weight:600;">Download PDF</a>
                            </button></div> --}}
                            </div>
                        </div>
                    </div>


            </form>
        </section>
    </div>

@endsection
