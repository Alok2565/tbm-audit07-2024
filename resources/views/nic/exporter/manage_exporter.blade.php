@extends('icmr.layouts.admin')
@section('content')
<style>
li.select2-search.select2-search--inline {
    margin-left: 16px;
}
</style>
<section class="mb-5 py-2">
    <div class="container">
        <p class="text-start" style="font-size: 16px; font-weight:600; color:#14468C"><strong>Application form for EXPORT of human samples and other biological materials for commercial/contract research Exporter Human Samples</strong></p>

        <button class="btn btn-primary float-end">
            <a class="float-end text-white" href="{{ url('imp-exp/exporter') }}" style="font-weight:600;">Back to Lists</a>
        </button>
    </div>
</section>
<section class="exporter-section mt-3">
    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <div class="container">
        <form class="py-3 mb-5" action="{{ route('exporter.manage_exporter_process') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card custom-card">
                <div class="form-card-tite text-white">
                    <p class="title-items" style="font-weight: 600">PART-A: Basic information</p>
                </div>
                <div class="form-card-sub-tite text-black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><b>(1) Sending Party</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="sending_iec_number" class="form-label">(i) Importer Exporter Code (IEC) Number</label>
                        <input type="text" value="{{ $sending_iec_number }}" class="form-control sending_iec_number" id="sending_iec_number" name="sending_iec_number">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="sending_applicant_name" class="form-label">(ii) Name of the Applicant</label>
                        <input type="text" value="{{ $sending_applicant_name }}" class="form-control" id="sending_applicant_name" name="sending_applicant_name" readonly>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="sending_applicant_design" class="form-label">(iii)Designation</label>
                        <input type="text" value="{{ $sending_applicant_design }}" class="form-control" id="sending_applicant_design" name="sending_applicant_design">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="sending_add_company_institute" class="form-label">(iv) Address of the
                            Company/Institution</label>
                        <input type="text" value="{{ $sending_add_company_institute }}" class="form-control" id="sending_add_company_institute" name="sending_add_company_institute">
                    </div>
                </div>
                <div class="col-md-8 mt-3">
                    <label for="comp_institute_denied_export_auth_last_3_years" class="">(v) Whether the applicant/
                        company/institution has been denied export authorization in last 3 years?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="comp_institute_denied_export_auth_last_3_years" id="text_yes" value="yes"/>
                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span class="text-muted">(If yes, provide details)</span></label>
                                </div>
									<div class="form-check form-check-inline">
                                        <input class="form-check-input" value="" type="radio" name="comp_institute_denied_export_auth_last_3_years" id="text_no" value="no" />
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea name="comp_institute_denied_export_auth_last_3_years" id="wirtetext_yes" maxlength="100" cols="45" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;">{{ $comp_institute_denied_export_auth_last_3_years }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card custom-card mt-3">
                <div class="form-card-sub-tite text-black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><b>(2) Receving Party</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="receving_recipient_name" class="form-label">(i) Name of the Recipient</label>
                        <input type="text" value="{{ $receving_recipient_name }}" class="form-control" id="receving_recipient_name" name="receving_recipient_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="receving_recipient_design" class="form-label">(ii) Name of the Designation</label>
                        <input type="text" value="{{ $receving_recipient_design }}" class="form-control" id="receving_recipient_design" name="receving_recipient_design">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-2">
                        <label for="receiving_add_company_institute" class="form-label">(iii) Address of the
                            Company/Institution</label>
                        <input type="text" value="{{ $receiving_add_company_institute }}" class="form-control" id="receiving_add_company_institute" name="receiving_add_company_institute">
                    </div>
                </div>
            </div>
            <div class="form-card-sub-tite text-black mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1"><b>(3) End user</b></label></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mt-3">
                    <label for="end_user_receiving_party" class="justify-between">(i) If other
                        than the receiving party</label>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="end_user_receiving_party" id="end_user_yes" value="Yes" />
                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span class="text-muted">(If yes, provide details)</span></label>
                                </div>
                                <div class="form-group">
                                    <textarea name="end_user_receiving_party" id="wirtetextEnd_user_yes" maxlength="100" cols="42" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                </div>
                                <div class="form-check custom-no">
                                    <input class="form-check-input" type="radio" name="end_user_receiving_party" id="end_user_no" value="No" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <label for="end_user_name" class="form-label">(ii) Name of the End user</label>
                        <input type="text" value="{{ $end_user_name }}" class="form-control" id="end_user_name" name="end_user_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group mt-3">
                        <label for="end_user_address" class="form-label">(iii) Address of the End user</label>
                        <input type="text" value="{{ $end_user_address }}" class="form-control" id="end_user_address" name="end_user_address">
                    </div>
                </div>
            </div>
            <div class="card custom-card mt-3">
                <div class="form-card-tite text-white">
                    <p class="title-items" style="font-weight: 600">PART-B: Other Details</p>
                </div>
                <div class="form-card-sub-tite text-black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><b>(1) Details of biomatrical to
                                        be exported</b></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="hs_code_item_exported" class="form-label">(i) Harmonized System (HS) code of Item
                            to be
                            exported</label>
                        <input type="text" value="{{ $hs_code_item_exported }}" class="form-control" id="hs_code_item_exported" name="hs_code_item_exported">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">

                        <label for="natural_biomaterial_exported" class="form-label"><span>(ii) Nature of biomaterial
                                to be exported </span></label>
                                <div class="arrow-icon py-2 mr-3">
                                    <i class="fa fa-angle-down float-end mt-3 select2-selection select2-selection--multiple" style="position: relative; z-index: 11; font-size: 24px;margin-right: 13px; "></i>
                                </div>
                        <select name="natural_biomaterial_exported[]" class="form-control form-select custom_list" id="multiple-select-field" data-placeholder="Choose one or more..." multiple>
                            {{-- <option value="0">Select</option>
                            @foreach ($natural_biomaterial as $dataExporters )
                            @if($natural_biomaterial_exported == $dataExporters->id )
                            <option selected value="{{ $dataExporters->id  }}"></option>
                            @else
                            <option value="{{ $dataExporters->id  }}">
                            @endif
                            {{ $dataExporters->natural_biomaterial_exported }}
                            </option>
                            @endforeach --}}
                            {{-- <option value="0">Select</option>
                            @foreach ($natural_biomaterial as $dataExporter)
                                <option value="{{ $dataExporter->id }}"
                                    @if(is_array($natural_biomaterial_exported) && in_array($dataExporter->id, $natural_biomaterial_exported))
                                        selected
                                    @endif
                                >
                                    {{ $dataExporter->natural_biomaterial_exported }}
                                </option>
                            @endforeach --}}
                                <option value="whole blood" name="natural_biomaterial_exported">Whole blood</option>
                                <option value="Sperm" name="natural_biomaterial_exported">Sperm</option>
                                <option value="Plasma" name="natural_biomaterial_exported">Plasma</option>
                                <option value="urine" name="natural_biomaterial_exported">Urine</option>
                                <option value="Other body fluids" name="natural_biomaterial_exported" id="otherBodyFluids">Other body fluids (Please specify)</option>
                                <option value="tissue" name="natural_biomaterial_exported">Tissue</option>
                                <option value="nucleic acid (BNA/RNA)" name="natural_biomaterial_exported">Nucleic acid (BNA/RNA)</option>
                                <option value="other" name="natural_biomaterial_exported"id="OtherNatural">other (Please sepcify)</option>
                                <textarea name="natural_biomaterial_exported[]" id="TextotherBodyFluids" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Other body fluids (Please specify)" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            <textarea name="natural_biomaterial_exported[]" id="TextNaturalbiomateria" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="other (Please sepcify)" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            </select>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="sample_collected" class="form-label"><span>(iii) Where were the samples collected?</span></label>
                                <div class="arrow-icon py-2 mr-3">
                                    <i class="fa fa-angle-down float-end mt-3 select2-selection select2-selection--multiple" style="position: relative; z-index: 11; font-size: 24px;margin-right: 13px; "></i>
                                </div>

                            <select name="sample_collected[]" id="" class="form-control form-select custom_list" id="multiple-select-field" data-placeholder="Choose one or more..." multiple>
                                {{-- <option class="text-muted" value="">Choose one or more...</option> --}}
                                <option value="Inpatient hospital facility" name="sample_collected">Inpatient hospital facility</option>
                                <option value="Outpatient hospital facility" name="sample_collected">Outpatient hospital facility</option>
                                <option value="Clinical/ Diagnostic laboratory" name="sample_collected">Clinical/ Diagnostic laboratory</option>
                                <option value="Research laboratory" name="sample_collected">Research laboratory</option>
                                <option value="other" name="sample_collected" class="p-1" id="otherSample">other (Please sepcify)</option>
                                <textarea name="sample_collected[]" id="TextSampleCollected" maxlength="100" cols="60" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="samples_being_exported" class="mt-2 py-2">(iv) Has consent been taken from the
                        individuals
                        for the exact purpose for which the samples are being exported?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="samples_being_exported" id="samplesExported_yes" value="Yes" />
                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span class="text-muted">(If yes, provide details)</span></label>
                                </div>
                                <div class="form-group">
                                    <textarea name="samples_being_exported" id="TextsamplesExported" maxlength="100" cols="60" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                </div>
                                <div class="form-check custom-no">
                                    <input class="form-check-input" type="radio" name="samples_being_exported" id="samplesExported_no" value="No" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-8">
                            <div class="form-group">
                                <textarea name="sampes_being_exported" id="TextsamplesExported" maxlength="100" cols="44" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="exported_number" class="justify-center mt-2">(v)<span> Details of Quantity of samples to be exported</span></label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="exported_number" class="form-label">Number</label>
                                <input type="text" class="form-control" id="exported_number" name="exported_number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="exported_volume" class="form-label">Volumn</label>
                                <input type="text" class="form-control" id="exported_volume" name="exported_volume">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="repeat_samples_envisaged" class="mt-2">(v) Whether repeat export of samples is
                        envisaged?</label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged" id="repeat_export_yes" value="Yes" />
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-group">
                                    <textarea name="repeat_samples_envisaged" id="wirteRepeat_export" maxlength="100" cols="60" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged" id="repeat_export_no" value="No" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-8">
                            <div class="form-group">
                                <textarea name="repeat_sampes_envisaged" id="wirteRepeat_export" maxlength="100" cols="44" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="form-card-sub-tite text-black mt-3 py-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1"><b>(2) Purpose of export of samples</b></span></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="specify_purpose_end_use" class="form-label"><span>(i) Specify purpose/ end use
                            </span></label>
                            <select name="specify_purpose_end_use[]" id="specify_purpose_end_use" class="form-control custom_list" data-placeholder="Choose anything" multiple>
                                {{-- @foreach($dataExporters as $item)
                                    <option value="{{ $item->id }}">{{ $item->specify_purpose_end_use }}</option>
                                @endforeach
                            </select> --}}
                            <option value="" class="text-muted" style="font-weight: 600;"><strong></strong>
                            </option>
                            <option value="Calibration/ Quality assurance" name="specify_purpose_end_use]" class="specify_purpose_end_use">Calibration/ Quality assurance</option>
                            <option value="Clinical Diagnostics/ Testing" name="specify_purpose_end_use" class="specify_purpose_end_use">Clinical Diagnostics/ Testing</option>
                            <option value="Other" name="specify_purpose_end_use" id="specifyOther_end_use" class="specifyOther_end">other (Please sepcify)</option>
                            <textarea name="specify_purpose_end_use[]" id="specifyText_end_use" maxlength="100" cols="72" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="samples_used_research_analysis" class="mt-3">(ii) Whether the samples will be used for any research analysis?</label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis" id="research_analysis_yes" value="option1" />
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>

                                <div class="form-check form-check-inline custom-no">
                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis" id="research_analysis_no" value="option2" />
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="samples_used_research_analysis[]"  id="research_analysisSelect" class="form-control form-select research_analysisSelect" data-placeholder="Choose anything" style="display: none;" multiple>
                                    {{-- <select name="samples_used_research_analysis[]" id="research_analysisSelect" class="form-control form-select custom_list"data-placeholder="Choose anything" multiple style="display: none;"> --}}
                                    <option value="" class="text-muted" style="font-weight: 600;">
                                        <strong></strong>
                                    </option>

                                    <option value="Genomic studies/Varinat/SNP analusis" name="" class="samples_used_research_analysis">
                                        Genomic studies/Varinat/SNP analusis</option>
                                    <option value="Transcriptom Studies" class="samples_used_research_analysis">Transcriptom Studies</option>
                                    <option value="Proteomic Studies" class="samples_used_research_analysis">Proteomic Studies</option>
                                    <option value="Metabolomic Studies" class="samples_used_research_analysis">Metabolomic Studies</option>
                                    <option value="other" class="p-1" id="OtherSamplesAnalysis">other (Please
                                        sepcify)</option>
                                    <textarea name="samples_used_research_analysis[]" id="wirteSamplesAnalysis" maxlength="100" cols="40" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-card-sub-tite text-black mt-3 py-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1"><b>(3) Storage of samples/Leftover
                                    samples </b></span><span class="justify-between" style="color:#14468C; font-size:15px">**</span></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="leftover_samples_store" class=""><span>(i) Will leftover samples be stored?
                            </span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="leftover_samples_store" id="leftoverSample_yes" value="Yes" />
                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="leftover_samples_store" id="wirtetextleftover" maxlength="100" cols="65" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                    <div class="form-check custom-no">
                                        <input class="form-check-input" type="radio" name="leftover_samples_store" id="leftoverSample_no" value="No" />
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="purpose_sample_store" class="justify-center"><span>(ii) Purpose of samples
                                storage</span></label>
                        <select name="purpose_sample_store[]" id="purpose_sample_store" multiple class="form-control form-select mt-1" aria-label=".form-select-lg example">
                            <option value="" class="text-muted" style="font-weight: 600;"><strong></strong>
                            </option>
                            <option value="Retesting purposes" name="purpose_sample_store" class="retesting_purposes">Retesting purposes</option>
                            <option value="" name="purpose_sample_store" id="otherFurther" class="Text_further_analysis">Further analysis <span class="text-muted">(Please specify genetic analysis or any other analysis)</span>
                            </option>
                            <textarea name="purpose_sample_store[]" id="wirteotherFurther" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important;"></textarea>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="duration_sample_store" class="justify-center"><span>(iii) Duration of the sample
                                storage</span></label>
                        <input type="text" value="" name="duration_sample_store" id="duration_sample_store" class="form-control mt-2" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="facility_sample_store" class="justify-center"><span>(iv) Facility where samples
                                will be stored</span></label>
                        <input type="text" value="" name="facility_sample_store" id="facility_sample_store" class="form-control mt-2" placeholder="">
                    </div>
                </div>
            </div>
            <div class="form-card-sub-tite text-black mt-3 py-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1"><b>(4) National security
                                    concerns</b></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="national_security_angle" class="justify-between"><span>(i) Whether the
                                company/institution/departmentM where the material is being exported has any adverse
                                reporting or has figured adversely from a national security angle?
                            </span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="national_security_angle" id="nationalSecurity_yes" value="Yes" />
                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="national_security_angle" id="textNationalSecurity" maxlength="100" cols="65" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                    <div class="form-check custom-no">
                                        <input class="form-check-input" type="radio" name="national_security_angle" id="nationalSecurity_no" value="No" />
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-2">
                        <label for="foreign_country_army_military" class="justify-between"><span>(ii) Whether the
                                company/institution/department where the material is being exported is a subsidiary of a
                                foreign country's army/military?
                            </span></label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="foreign_country_army_military" id="armyMilitary_yes" value="Yes" />
                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="foreign_country_army_military" id="armyMilitaryText" maxlength="100" cols="65" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                    <div class="form-check custom-no">
                                        <input class="form-check-input" type="radio" name="foreign_country_army_military" id="armyMilitary_no" value="No" />
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="biomaterial_micro_organisms_approval" class="justify-center mt-3"><span>(iii) If the
                        Biomaterial contains micro-organisms listed in appendix 3 category 2 of list of SCOMET items,
                        has approval been obtained from DGFT?</span></label>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_yes" value="" />
                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                        </div>
                        <label class="justify-center biomaterialText" style="display: none;">Upload Details (.PDF only | Size:50 KB)<span style="color:red">&nbsp;*</span></label><br/>
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
            <div class="form-card-sub-tite text-black mt-3 py-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1"><b><span>(5) IBSC/RCGM approval, as
                                        applicable</span> <span class="justify-between" style="color:#14468C; font-size:15px">***</span></b>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="ibsc_rcgm_approval_applicable" class="justify-center mt-3"><span>(i) For the export of
                        infectious biological material, has IBSC/RCGM approval been obtained?</span></label>
                <div class="col-md-6">
                    <div class="form-group mt-2">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_yes" value="" />
                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                        </div>
                        <label class="justify-center ibscRcgmText" style="display: none;">Upload Details (.PDF only | Size:50 KB)<span style="color:red">&nbsp;*</span></label><br/>
                        <div class="input-group ibscRcgmText" style="width:50%">
                            <input type="file" name="ibsc_rcgm_approval_applicable" class="form-control ibscRcgmText" id="ibscRcgmText" style="display:none;">
                        </div>
                        @error('ibsc_rcgm_approval_applicable')
                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                        @enderror
                        <div class="form-check custom-no">
                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_no" value="No" />
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-card mt-3">
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

                                   <!--<div class="col-md-6">
                                        <div class="border-1">
                                            <div class="sub-title p-1"><span class="text-center p-1"><b>(i)
                                                Declaration by Recipient of samples</b></span>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                        <div class="border">
                            <div class="row">
                                <div class="col-md-12 mb-5 m-1">
                                    <label>I certify that the information provided in this request form is true and
                                        correct to the best of my knowledge, and I hereby declare that the samples
                                        referred to herein will be utilized for the purpose of <br><input class="float-start form-control costum1" type="text" name="sender_certify_information_provided"><span>only,</span></label>
                                    <div class="form-card-sub-tite text-black mt-3 py-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="sub-title p-1"><span class="text-center p-1"><b>(ii) Copy of Commercial contract/Proforma invoice </b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-black justify-content-between border-bottom">Certified copy of
                                        commercial
                                        contract/Proforma invoice is enclosed.
                                        Further I undertake to comply FCRA/FEMA
                                        regulations and other guidelines issued by
                                        RBI regarding foreign transactions.</p>

                                    <label class="p-2"><input type="text" name="sender_signature" class="form-control"><br>Signature</label>
                                    <p class="p-2">(Authorized signatory on behalf of
                                        organization as per law of company)</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_name" class="justify-center">Name</label>
                                                <input type="text" value="" name="sender_name" id="sender_name" class="form-control mt-2 " placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_designation" class="justify-center">Designation</label>
                                                <input type="text" value="" name="sender_designation" id="sender_designation" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_address" class="justify-center">Address</label>
                                                <input type="text" value="" name="sender_address" id="sender_address" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_date" class="justify-center">Date</label>
                                                <input type="date" value="" name="sender_date" id="sender_date" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--<div class="col-md-6 mb-5" style="">
                                    <p class="pr-2">This is to certify that the samples referred to herein being
                                        sent to<input class="float-end form-control" style="width: 170px;" type="text" name="recipient_certify_samples_referred">
                                    </p>
                                    <p>(Name of Institution) for analyses/investigations will be in the custody of
                                        <input class="float-start form-control" style="width: 270px;" type="text" name="recipient_name_institution"><br>&nbsp; &nbsp;,and I hereby confirm
                                        that they will be <br><br>utilized for the purpose of <input class="float-end form-control" style="width: 270px;margin-right: 26%;" type="text" name="recipient_utilized_for_purpose"><br><br>only, and I accept full
                                        responsibility and control over the usage of these samples.</p>
                                        <hr class="mt-5">
                                    <label class="p-2"><input type="text" name="recipient_signature" class="form-control"><br>Signature</label>
                                    <p class="p-2">(Authorized signatory on behalf of
                                        organization as per law of company)</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="recipient_name" class="justify-center">Name</label>
                                                <input type="text" value="" name="recipient_name" id="recipient_name" class="form-control mt-2 " placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="recipient_designation" class="justify-center">Designation</label>
                                                <input type="text" value="" name="recipient_designation" id="recipient_designation" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="recipient_address" class="justify-center">Address</label>
                                                <input type="text" value="" name="recipient_address" id="recipient_address" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="recipient_date" class="justify-center">Date</label>
                                                <input type="date" value="" name="recipient_date" id="recipient_date" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>-->


                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12">
                    @if ($id>1)
                    <button type="submit" class="btn btn-primary mt-3" name="submit" id="btnSubmit" value="submit" style="font-size:17px">Update</button>
                     @else
                    <button type="submit" class="btn btn-primary mt-3" name="submit" id="btnSubmit" value="submit" style="font-size:17px">submit</button>
                    @endif

                </div>
                <input type="hidden" name="id" value="{{ $id }}">
        </form>
    </div>
</section>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript">
 $(document).ready(function () {
           $('.sending_iec_number').on('change', function () {
                var sending_iec_number = $('#sending_iec_number').val();
                //alert(sending_iec_number);
                $.ajax({
                    url: '{{url('imp-exp/exportapi') }}',
                    type: 'get',
					data:{
					  sending_iec_number: sending_iec_number,
					},
					dataType: 'json',
                    success: function (res) {
                        console.log(res);
					 $('#sending_applicant_name').val(res.entityName);
                    }
                });
            });
			 });
</script>
@endsection
