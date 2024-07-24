@extends('icmr.layouts.admin')
@section('title', 'Exporter')
@section('content')
    <div class="page-title-box">
        <section class="py-2">
            <div class="container">
                <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Preview Of The Application form for
                        EXPORT of human samples and other biological materials for
                        commercial/contract research</strong><button class="btn btn-primary float-end">
                        <a class="float-end text-white" href="{{ url('icmr/exporter') }}" style="font-weight:600;">Back to
                            Lists</a>
                    </button>
                </p>
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
                                        name="sending_iec_number" onkeypress="return isNumber(event)" maxlength="10">
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
                                        onkeypress="return isAlfa(event)">
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <label for="sending_add_company_institute" class="form-label"><strong>(iv) Address of
                                            the Company/Institution</strong></label>
                                    <input type="text" value="{{ $export_data->sending_add_company_institute }}" class="form-control"
                                        id="sending_add_company_institute" name="sending_add_company_institute">
                                </div>
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="comp_intitute_denied_export_auth_last_3_years" class="form-label"><strong>(v)
                                        Whether the applicant/ company/ institution has been denied import authorization in
                                        last 3 years?</strong></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="comp_institute_denied_export_auth_last_3_years" id="text_yes"
                                                    value="yes" {{($export_data->comp_institute_denied_export_auth_last_3_years != '')? 'checked':''}} disabled/>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value="" type="radio"
                                                    name="comp_institute_denied_export_auth_last_3_years" id="text_no"
                                                    value="no" {{($export_data->comp_institute_denied_export_auth_last_3_years != '')? 'checked':''}} disabled/>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wirtetext_yes" style="{{($export_data->upload_comp_institute_denied_export != '')? '':'display: none;'}}">
                                        @php $path = asset('/public/media/exporter/'); @endphp
                                        <a href="{{ $path }}{{ $export_data->upload_comp_institute_denied_export }}" target="_blank"><label class="form-lable"><strong>View Uploaded documents</strong></label>
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
                                                style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; {{($export_data->comp_institute_denied_export_auth_last_3_years != '')? '':'display: none;'}}">{{ ($export_data->comp_institute_denied_export_auth_last_3_years)??'' }}</textarea>
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
                                        <label for="receving_recipient_design" class="form-label"><strong>(ii) Name of the
                                                Designation</strong></label>
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
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="end_user_receiving_party" id="end_user_yes"
                                                        value="Yes" {{($export_data->end_user_receiving_party != '')? 'checked':''}} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span
                                                            class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="end_user_receiving_party" value="" id="wirtetextEnd_user_yes" maxlength="100" cols="42"
                                                        rows="2" max="100" placeholder="Description of items"
                                                        style="border:1px solid #ddd; border-radius: 5px !important; {{($export_data->end_user_receiving_party != '')? '':'display: none;'}}">{{isset($export_data->end_user_receiving_party)? $export_data->end_user_receiving_party:''}}</textarea>
                                                </div>
                                                <div class="form-check custom-no">
                                                    <input class="form-check-input" type="radio"
                                                        name="end_user_receiving_party" id="end_user_no"
                                                        value="No" {{($export_data->end_user_receiving_party == '')? 'checked':''}} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
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
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(1) Details of biomatrical
                                                to be exported</b></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>(i) Harmonized
                                                System (HS) of Item to be exported</strong></label>
                                                <input type="text" class="form-control hs_code" maxlength="8" id="hs_code"
                                                name="hs_code" value="{{isset($export_data->hs_code)? $export_data->hs_code:''}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>Description of HS Code</strong></label>
                                        <input type="text" class="form-control" name="desc" class="desc" id="desc" value="{{isset($export_data->desc)? $export_data->desc:''}}" readonly>
                                    </div>
                                </div>
                                @php
                                    $a = explode(",", $export_data->nature_biomaterial_exported);
                                    @endphp
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong></label>
                                        <select class="select2 form-control select2-multiple" data-toggle="select2"
                                            multiple="multiple" data-placeholder="Select...">
                                            <option class="multiple_biom" value="whole blood" class="p-1" {{(in_array("whole blood", $a))? 'selected':''}}>
                                                Whole blood</option>
                                            <option class="multiple_biom" value="Serum" class="p-1"
                                                name="natural_biomaterial_exported" {{(in_array("Serum", $a))? 'selected':''}}>Serum</option>
                                            <option class="multiple_biom" value="plasma" class="p-1"
                                                name="natural_biomaterial_exported" {{(in_array("plasma", $a))? 'selected':''}}>Plasma</option>
                                            <option class="multiple_biom" value="urine" class="p-1"
                                                name="natural_biomaterial_exported" {{(in_array("urine", $a))? 'selected':''}}>Urine</option>
                                            <option class="multiple_biom" value="other body fluids" class="p-1"
                                                name="natural_biomaterial_exported" id="otherBodyFluids" {{(in_array("other body fluids", $a))? 'selected':''}}>Other body
                                                fluids</option>
                                            <option class="multiple_biom" value="Tissue/Cell culture" class="p-1"
                                                name="natural_biomaterial_exported" {{(in_array("Tissue/Cell culture", $a))? 'selected':''}}>Tissue/Cell
                                                culture</option>
                                            <option class="multiple_biom" value="Nucleic acid(DNA/RNA" class="p-1"
                                                name="natural_biomaterial_exported" {{(in_array("Nucleic acid(DNA/RNA", $a))? 'selected':''}}>Nucleic
                                                acid(DNA/RNA)</option>
                                            <option id="OtherNatural" name="natural_biomaterial_exported" value="other"
                                                class="p-1" {{(in_array("other", $a))? 'selected':''}}>other
                                                (Please sepcify)
                                            </option>

                                        </select>
                                        <textarea name="natural_biomaterial_exported[]" id="TextotherBodyFluids" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Description of items"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>

                                        <textarea name="natural_biomaterial_exported[]" id="TextNaturalbiomateria" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Description of items"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                            @php
                                    $b = explode(",", $export_data->sample_collected);
                                    @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="sample_collected" class="form-label"><strong>(iii) Where the samples collected?</strong></label>
                                            {{-- <select name="sample_collected[]" id="multiple_custom_list" class="form-control form-select multiple_custom_list custom_list" id="multiple-select-field" data-placeholder="Seletc one or more..." multiple> --}}
                                                <select class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Select...">
                                                <option value="Inpatient hospital facility" name="sample_collected" class="sample_collected_option" {{(in_array("Inpatient hospital facility", $b))? 'selected':''}}>Inpatient hospital facility</option>
                                                <option value="Outpatient hospital facility" name="sample_collected" class="sample_collected_option" {{(in_array("Outpatient hospital facility", $b))? 'selected':''}}>Outpatient hospital facility</option>
                                                <option value="Clinical/ Diagnostic laboratory" name="sample_collected" class="sample_collected_option" {{(in_array("Clinical/ Diagnostic laboratory", $b))? 'selected':''}}>Clinical/ Diagnostic laboratory</option>
                                                <option value="Research laboratory" name="sample_collected" class="sample_collected_option" {{(in_array("Research laboratory", $b))? 'selected':''}}>Research laboratory</option>
                                                <option value="other" name="sample_collected" id="otherSample" {{(in_array("other", $b))? 'selected':''}}>other (Please sepcify)</option>
                                            </select>
                                            <textarea class="mt-2" name="sample_collected[]" id="TextSampleCollected" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="sample_collected" class="form-label mt-2"><strong>(iv) Has consent been taken from the individuals for the exact purpose for which the samples are being exported?</strong></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="samples_being_exported" id="samplesExported_yes" {{($export_data->samples_being_exported != '')? 'checked':''}} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input inline-block" type="radio" name="samples_being_exported" id="samplesExported_no" {{($export_data->samples_being_exported == '')? 'checked':''}} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sample_collected" class="form-label mt-2 TextsamplesExported" style="display: none;"><strong>Provide details</strong></label>
                                                <textarea name="sampes_being_exported" class="TextsamplesExported" id="TextsamplesExported" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exported_number" class="form-label mt-2"><strong>(v) Details of Quantity of samples to be exported</strong></label>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Number</label>
                                                <input type="text" class="form-control" id="exported_number" name="exported_number" value="{{isset($export_data->exported_number)? $export_data->exported_number:''}}" readonly placeholder="Number" maxlength="10" onkeypress="return isNumber(event)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="form-label">Volume of unit</label>
                                                <select class="form-control select2" data-toggle="select2">
                                                    <option value="ml" {{ ($export_data->Quantity_import_vol == 'ml')? 'selected':''; }}>ML</option>
                                                    <option class="l" {{ ($export_data->Quantity_import_vol == 'l')? 'selected':''; }}>L</option>
                                                    {{-- <option>Select</option> --}}
                                                </select>
                                                {{-- <input type="text" class="form-control" id="exported_volume" name="exported_volume" placeholder="Volume" maxlength="10" onkeypress="return isAlfa(event)"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="repeat_samples_envisaged" class="form-label mt-2"><strong>(vi) Whether repeat export of samples is envisaged?</strong></label>
                                            <div class="form-group mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged" id="repeat_export_yes" value="Yes" {{ ($export_data->repeat_samples_envisaged != '')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes <span class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="repeat_samples_envisaged" class="form-label mt-2 wirteRepeat_export" style="{{ ($export_data->repeat_samples_envisaged != '')? '':'display:none'; }}"><strong>Provide details</strong></label>
                                                    <textarea name="repeat_samples_envisaged" class="wirteRepeat_export" id="wirteRepeat_export" maxlength="100" cols="60" rows="2" max="100" placeholder="description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->repeat_samples_envisaged != '')? '':'display:none'; }}">{{ $export_data->repeat_samples_envisaged }}</textarea>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged" id="repeat_export_no" value="No" {{ ($export_data->repeat_samples_envisaged == '')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
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
                                            {{-- <select name="specify_purpose_end_use[]" id="specify_purpose_end_use" class="form-control custom_list" data-placeholder="Seletc one or more..." multiple> --}}
                                                {{-- @foreach($dataExporters as $item)
                                                    <option value="{{ $item->id }}">{{ $item->specify_purpose_end_use }}</option>
                                                @endforeach
                                            </select> --}}
                                            <select class="select2 form-control select2-multiple" data-toggle="select2"
                                                multiple="multiple" data-placeholder="Select..." id="purpose_end_use" name="specify_purpose_end_use[]" disabled>
                                            {{-- <option value="" class="text-muted" style="font-weight: 600;"><strong></strong> --}}
                                            </option>
                                            <option value="Calibration/ Quality assurance" name="specify_purpose_end_use]" {{(in_array("Calibration/ Quality assurance", $c))? 'selected':''}} class="specify_purpose_end_use">Calibration/ Quality assurance</option>
                                            <option value="Clinical Diagnostics/ Testing" name="specify_purpose_end_use" {{(in_array("Clinical Diagnostics/ Testing", $c))? 'selected':''}} class="specify_purpose_end_use">Clinical Diagnostics/ Testing</option>
                                            <option value="Other" name="specify_purpose_end_use" id="specifyOther_end_use" {{(in_array("Other", $c))? 'selected':''}} class="specifyOther_end">other (Please sepcify)</option>

                                        </select>
                                        <textarea name="specify_purpose_end_use[]" readonly id="specifyText_end_use" maxlength="100" cols="72" rows="2" max="100" placeholder="Provide Details" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->specify_purpose_end_use != '')? '':'display:none'; }}">{{ ($export_data->specify_purpose_end_use != '')? $export_data->specify_purpose_end_use:''; }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="samples_used_research_analysis mt-1" class="form-label"><strong>(ii) Whether the samples will be used for any research analysis?</strong></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis" id="research_analysis_yes" value="option1" {{ ($export_data->samples_used_research_analysis != '')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis" id="research_analysis_no" value="option2" {{ ($export_data->samples_used_research_analysis == '')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        @php
                                    $d = explode(",", $export_data->samples_used_research_analysis);
                                    @endphp
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="samples_used_research_analysis[]"  id="research_analysisSelect" class="form-control form-select research_analysisSelect" data-placeholder="Choose anything" style="{{ ($export_data->samples_used_research_analysis != '')? '':'display:none'; }}" disabled>
                                                    <option value="" class="text-muted">Select one</option>
                                                    <option value="Genomic studies/Varinat/SNP analusis" name="" class="samples_used_research_analysis" {{(in_array("Genomic studies/Varinat/SNP analusis", $d))? 'selected':''}}>
                                                        Genomic studies/Varinat/SNP analusis</option>
                                                    <option value="Transcriptom Studies" class="samples_used_research_analysis" {{(in_array("Transcriptom Studies", $d))? 'selected':''}}>Transcriptom Studies</option>
                                                    <option value="Proteomic Studies" class="samples_used_research_analysis" {{(in_array("Proteomic Studies", $d))? 'selected':''}}>Proteomic Studies</option>
                                                    <option value="Metabolomic Studies" class="samples_used_research_analysis" {{(in_array("Metabolomic Studies", $d))? 'selected':''}}>Metabolomic Studies</option>
                                                    <option value="other" class="p-1" id="OtherSamplesAnalysis" {{(in_array("other", $d))? 'selected':''}}>other (Please sepcify)</option>
                                                </select>
                                                <textarea name="samples_used_research_analysis[]" readonly id="wirteSamplesAnalysis" maxlength="100" cols="40" rows="2" max="100" placeholder="Specify Details" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->samples_used_research_analysis != '')? '':'display:none'; }}">{{ ($export_data->samples_used_research_analysis != '')? $export_data->samples_used_research_analysis:''; }}</textarea>
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
                                        {{-- <label for="leftover_samples_store" class=""><strong>(i) Will leftover samples be stored?</strong></label> --}}
                                        <label for="leftover_samples_store" class="form-label"><strong>(i) Will leftover samples be stored?</strong></label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store" id="leftoverSample_yes" value="Yes" {{ ($export_data->leftover_samples_store != '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="leftover_samples_store" class="form-label wirtetextleftover" style="display: none;"><strong>Provide details</strong></label>
                                                        <textarea name="leftover_samples_store" class="wirtetextleftover" id="wirtetextleftover" maxlength="100" cols="65" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($export_data->leftover_samples_store != '')? '':'display:none;'; }}">{{ ($export_data->leftover_samples_store != '')? $export_data->leftover_samples_store:''; }}</textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store" id="leftoverSample_no" value="No" {{ ($export_data->leftover_samples_store == '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        {{-- <label for="purpose_sample_store" class="justify-center"><strong>(ii) Purpose of samples storage</strong></label> --}}
                                        <label for="purpose_sample_store" class="form-label"><strong>(ii) Purpose of samples storage</strong></label>
                                        <select name="purpose_sample_store[]" id="purpose_sample_store" multiple class="form-control form-select mt-1" aria-label=".form-select-lg example">
                                            <option value="" class="text-muted" style="font-weight: 600;"><strong></strong>
                                            </option>
                                            <option value="Retesting purposes" name="purpose_sample_store" class="retesting_purposes" {{ ($export_data->purpose_sample_store == 'Retesting purposes')? 'checked':''; }} disabled>Retesting purposes</option>
                                            <option value="Further analysis" name="purpose_sample_store" id="otherFurther" class="Text_further_analysis" {{ ($export_data->purpose_sample_store == 'Further analysis')? 'checked':''; }} disabled>Further analysis <span class="text-muted">(please specify genetic analysis or any other analysis)</span>
                                            </option>
                                           </select>
                                           <label for="purpose_sample_store" class="form-label wirteotherFurther" style="display: none;"><strong>Provide details</strong></label>
                                           <textarea name="purpose_sample_store[]" class="wirteotherFurther" id="wirteotherFurther" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Description of items" style="display:none; border:1px solid #ddd; border-radius: 5px !important;"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        {{-- <label for="duration_sample_store" class="justify-center"><strong>(iii) Duration of the sample storage</strong></label> --}}
                                        <label for="duration_sample_store" class="form-label"><strong>(iii) Duration of the sample storage</strong></label>

                                        <input type="text" value="{{ ($export_data->duration_sample_store != '')? $export_data->duration_sample_store:''; }}" readonly name="duration_sample_store" id="duration_sample_store" class="form-control mt-2" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        {{-- <label for="facility_sample_store" class="justify-center"><strong>(iv) Facility where samples will be stored</strong></label> --}}
                                        <label for="facility_sample_store" class="form-label"><strong>(iv) Facility where samples will be stored</strong></label>
                                        <input type="text" value="{{ ($export_data->facility_sample_store != '')? $export_data->facility_sample_store:''; }}" readonly name="facility_sample_store" id="facility_sample_store" class="form-control mt-2" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-card-sub-tite text-black">
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
                                        {{-- <label for="national_security_angle" class="justify-between"><strong>(i) Whether the company/institution/department where the material is being exported has any adverse reporting or has figured adversely from a national security angle?</strong></label> --}}
                                        <label for="national_security_angle" class="form-label"><strong>(i) Whether the company/institution/department where the material is being exported has any adverse reporting or has figured adversely from a national security angle?</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="national_security_angle" id="nationalSecurity_yes" value="Yes" {{ ($export_data->national_security_angle != '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="national_security_angle" class="form-label textNationalSecurity" style="display: none;"><strong>Provide details</strong></label>
                                                        <textarea name="national_security_angle" class="textNationalSecurity" id="textNationalSecurity" maxlength="100" cols="65" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="national_security_angle" id="nationalSecurity_no" value="No" {{ ($export_data->national_security_angle == '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
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
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military" id="armyMilitary_yes" value="Yes" {{ ($export_data->foreign_country_army_military != '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foreign_country_army_military" class="form-label armyMilitaryText" style="display: none;"><strong>Provide details</strong></label>
                                                        <textarea name="foreign_country_army_military" class="armyMilitaryText" id="armyMilitaryText" maxlength="100" cols="65" rows="2" max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military" id="armyMilitary_no" value="No" {{ ($export_data->foreign_country_army_military == '')? 'checked':''; }} disabled/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_yes" value="Yes" {{ ($export_data->biomaterial_micro_organisms_approval != '')? 'checked':''; }}>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        <label for="upload_files" name="upload_comp_institute_denied_export" style="display: none;"
                                                class="form-lable biomaterialText"><span class="d-inline-block biomaterialText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        {{-- <label class="justify-center biomaterialText form-label" style="display: none;">Upload  relevant documents if any (Size: 5MB)</label><br/> --}}
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="biomaterial_micro_organisms_approval" class="form-control biomaterialText" id="biomaterialText" style="display:none;">

                                        </div>
                                        @error('biomaterial_micro_organisms_approval')
                                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @enderror
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_no" value="No" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
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
                                    {{-- <div class="form-group mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_yes" value="Yes" {{ ($export_data->ibsc_rcgm_approval_applicable != '')? 'checked':''; }}>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        <label class="justify-center ibscRcgmText" style="display: none;">Upload  relevant documents if any (Size: 5MB)<br/>
                                        <div class="input-group ibscRcgmText" style="width:50%">
                                            <input type="file" name="ibsc_rcgm_approval_applicable" class="form-control ibscRcgmText" id="ibscRcgmText" style="display:none;">
                                        </div>
                                        @error('ibsc_rcgm_approval_applicable')
                                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @enderror
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_no" value="No" {{ ($export_data->ibsc_rcgm_approval_applicable == '')? 'checked':''; }}>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="ibscRcgm_yes" value="Yes" {{ ($export_data->biomaterial_micro_organisms_approval != '')? 'checked':''; }}>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        <label for="upload_files" name="ibsc_rcgm_approval_applicable" style="display: none;"
                                                class="form-lable ibscRcgmText"><span class="d-inline-block ibscRcgmText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="ibsc_rcgm_approval_applicable" class="form-control ibscRcgmText" id="ibscRcgmText" style="display:none;">
                                        </div>
                                        @error('ibsc_rcgm_approval_applicable')
                                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @enderror
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgmText" value="No" {{ ($export_data->ibsc_rcgm_approval_applicable == '')? 'checked':''; }}>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
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
                                    <label class="m-2">I certify that the information provided in this request form is true and
                                        correct to the best of my knowledge, and I hereby declare that the samples
                                        referred to herein will be utilized for the purpose of <br>&nbsp;<input class="form-control costum1" type="text" readonly id="declaration_of_purpose" name="sender_certify_information_provided" value="{{ ($export_data->specify_purpose_end_use != '')? $export_data->specify_purpose_end_use:''}}"><span>only,</span></label>
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
                                    <p class="text-black justify-content-between border-bottom mt-3 m-2">Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply FEMA regulations and other guidelines issued by
                                        RBI regarding foreign transactions.</p>
                                        <div class="row">
                                            <div class="col-md-7">
                                                <label class="p-2">---------------<br>Signature</label>
                                    <p class="p-2">(Authorized signatory on behalf of
                                        organization as per law of company)</p>
                                    </div>
                                        <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                                <label for="" class="form-label m-1"><strong>Upload Certified copy of commercial Contract/Proforma Invoice</strong></label>
                                                <input type="file" name="certified_copy_proforma" id="certified_copy_proforma" class="form-control">
                                            </div>
                                        </div>
                                        </div>

                                    <div class="row">
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
                                echo date('d-m-Y H:i:s'); ?>">
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="col-md-12 mb-5 m-2">
                                        <p>This is to certify that the samples referred to herein being sent to &nbsp;<input type="text" readonly value="{{ ($export_data->sender_name != '')? $export_data->sender_name:''}}" name="recipient_certify_samples_referred">  (Name of Institution) for analyses/investigations will be in the
                                            <br>custody of <input type="text" value="{{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:''}}" name="recipient_name_institution"> and I hereby confirm that they will be utilized for the purpose of <input type="text" readonly id="purpose_of_one" name="recipient_utilized_for_purpose" value="{{ ($export_data->specify_purpose_end_use != '')? $export_data->specify_purpose_end_use:''}}">
                                            only, and I accept full<br> responsibility and control over the usage of these samples. </p>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                                <label for="" class="form-label m-1"><strong>Upload declaration of letter</strong></label>
                                                <input type="file" name="declaration_letter mt-2" id="" class="form-control">
                                            </div>
                                            <p class="p-2" style="color:green"><b>Note:-</b> Please upload declaration of letter with authorized signature.</p>
                                        </div>
                                    <div class="col-md-7">
                                            <div class="upload-download mt-2">
                                                <label for="" class="form-label m-1"><strong>Download declaration letter</strong></label><br>
                                                <a href="{{ asset('assets/backend/images/exporter/declarationby-recipient-of-samples.pdf') }}" class="download-letter-item" target="_blank"><button type="button" class="btn btn-primary mt-1">Download Letter</button></a>
                                    </div>

                                </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="content-for-exp p-2 m-3" style="border: 1px solid #ddd;">
                                        <p>*If samples are to be exported to more than one institution/department, a separate request form should be completed for each recipient.</p>
                                        <p>**Request for storage is necessary if the samples are to be stored.</p>
                                        <p>*** For the export of infectious biological material, IBSC/RCGM approval to be sought as per the Revised Simplified Procedures/ Guidelines on Import, Export and Exchange of GE organisms and products thereof for R&D purpose, 2020 vide DBT OM dated 17.01.2020 and accordingly, form B3, duly filled in every aspect, to be submitted through IBKP portal. (https://ibkp.dbtindia.gov.in/)</p>
                                        <p>****To be completed every time prior to shipping sample.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- </div> --}}
                    {{-- <div class="card"> --}}
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-3 m-2" name="submit" id="btnSubmit"
                                value="submit" style="font-size:17px">Assign to Committee</button>
                        </div>
                    {{-- </div> --}}
            </form>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.sending_iec_number').on('change', function() {
                var sending_iec_number = $('#sending_iec_number').val();
                //alert(sending_iec_number);
                $.ajax({
                    url: '{{ url('imp-exp/exportapi') }}',
                    type: 'get',
                    data: {
                        sending_iec_number: sending_iec_number,
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);
                        $('#sending_applicant_name').val(res.entityName);
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#purpose_end_use').on('change', function() {

                var purpose_end_use = $('#purpose_end_use').val();
                $('#purpose_of_one').val(purpose_end_use);
                $('#declaration_of_purpose').val(purpose_end_use);
                $('#specifyText_end_use').hide();
                if(purpose_end_use == 'Calibration/ Quality assurance'){
                    $('#specifyText_end_use').hide();
                }else if(purpose_end_use == 'Clinical Diagnostics/ Testing'){
                    $('#specifyText_end_use').hide();
                }else if(purpose_end_use == 'Calibration/ Quality assurance,Clinical Diagnostics/ Testing'){
                    $('#specifyText_end_use').hide();
                }else{
                    $('#specifyText_end_use').show();
                }

            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#research_analysisSelect').on('change', function() {

                var purpose_end_use = $('#research_analysisSelect').val();
                $('#wirteSamplesAnalysis').hide();
                if(purpose_end_use == 'other'){
                    $('#wirteSamplesAnalysis').show();
                }else{
                    $('#wirteSamplesAnalysis').hide();
                }

            });
        });
    </script>

    <script>
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

        function isAlfa(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
                return false;
            }
            return true;
        }
    </script>

<script>
    $(document).ready(function() {
       $('.hs_code').on('change', function() {
           var hs_code = $('#hs_code').val();
           //alert(hs_code);
           $.ajax({
               url: '{{ route('exp.hs_code') }}',
               type: 'get',
               data: {
                   hs_code: hs_code,
               },
               dataType: 'json',
               success: function(res) {
                   console.log(res);
                   //alert(res.desc);
                   $('#desc').val(res.desc);
               }
           });
       });
   });
</script>
@endsection
