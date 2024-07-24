@extends('impexp.layouts.admin')
@section('title', 'Add New Importer')
@section('content')
    <section class="py-2">
        <div class="container">
            <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Application form for IMPORT
                    of human samples &
                    other biological materials for commercial/contract research </strong><button
                    class="btn btn-primary float-end">
                    <a class="float-end text-white" href="{{ url('imp-exp/import') }}" style="font-weight:600;">Back to
                        Lists</a>
                </button></p>

        </div>
    </section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <form method="POST" action="{{ url('imp-exp/creates') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card custom-card">
                                    <div class="form-card-tite text-white">
                                        <p class="title-items">PART-A: Basic information</p>
                                    </div>
                                    <div class="form-card-sub-tite text-black">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="sub-title p-1"><span class="text-center p-1"><strong>(1)
                                                            Receiving party</strong></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="impexp_iec_code" class="form-label"><strong>(i) Importer Exporter
                                                    Code (IEC) Number</strong></label>
                                            <input type="text" class="form-control iec_number"
                                                value="{{$Imports->iec_number}}" id="iec_number" name="iec_number"
                                                maxlength="10" readonly>
                                            <span> </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="send_app_name" class="form-label"><strong>(ii) Name of the
                                                    Applicant</strong></label>
                                            <input type="text" class="form-control name_of_applicant"
                                                value="{{$Imports->name_of_applicant}}" id="name_of_applicant" name="name_of_applicant"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="send_app_design" class="form-label"><strong>(iii) Designation of the
                                                    Applicant</strong></label>
                                            <input type="text" class="form-control" value="{{$Imports->name_of_designation}}"
                                                id="name_of_designation" name="name_of_designation"
                                                onkeypress="return isAlfa(event)" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="send_app_design" class="form-label"><strong>(iv) Address of the
                                                    Company/Institution</strong></label>
                                            <input type="text" class="form-control" id="address_company"
                                                name="address_company" value="{{$Imports->address_company}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-8  mt-2">
                                        <label for="comp_intitute_denied_export_auth_last_3_years"
                                            class="form-label"><strong>(v) Whether the applicant/ company/ institution has
                                                been denied import authorization in last 3 years?</strong></label>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="company_denied_import" id="text_yes" value="yes" {{($Imports->company_denied_import == 'yes')? 'checked':''}} disabled/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    </div>

                                                    <div class="form-check form-check-inline custom-no">
                                                        <input class="form-check-input" type="radio"
                                                            name="company_denied_import[]" id="text_no" value="no" {{($Imports->company_denied_import == 'no')? 'checked':''}} disabled/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group wirtetext_yes" style="{{($Imports->company_denied_import == 'yes')? '':'display: none;'}}">
                                                    <label for="upload_files" name="denied_import_upload"
                                                        class="form-lable"><strong>Upload relevant documents, if
                                                            any</strong></label>
                                                    <input type="file" class="form-control" name="">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group wirtetext_yes" style="{{($Imports->company_denied_import == 'yes')? '':'display: none;'}}">
                                                    <label for="upload_files" name="denied_import_upload"
                                                        class="form-lable"><strong>Add Provide details</strong></label>
                                                    <textarea name="company_denied_import[]" class="wirtetext_yes" id="wirtetext_yes" maxlength="100" cols="35"
                                                        rows="2" max="100" placeholder="Description of items"
                                                        style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; {{($Imports->company_denied_import == 'yes')? '':'display: none;'}};" readonly>{{isset($Imports->denied_import_description)? $Imports->denied_import_description:''}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="card">
                                        <div class="form-card-sub-tite text-black">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="sub-title p-1"><span class="text-center p-1"><strong>(2)
                                                                Sending party</strong></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="impexp_iec_code" class="form-label"><strong>(i) Name of the
                                                    Sender</strong></label>
                                            <input type="text" class="form-control" id="name_of_sender"
                                                name="name_of_sender" value="{{isset($Imports->name_of_sender)? $Imports->name:''}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="send_app_name" class="form-label"><strong>(ii) Designation of the
                                                    Sender</strong></label>
                                            <input type="text" class="form-control" id="designation_of_sender"
                                                name="designation_of_sender" value="{{isset($Imports->designation_of_sender)? $Imports->designation_of_sender:''}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="send_app_name" class="form-label"><strong>(iii) Address of the
                                                    Company/Institution</strong></label>
                                            <input type="text" class="form-control" id="address_of_company"
                                                name="address_of_company" value="{{isset($Imports->address_of_company)? $Imports->address_of_company:''}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card custom-card mt-4">
                                    <div class="form-card-tite text-white">
                                        <p class="title-items"><strong>PART-B: Other Details</strong></p>
                                    </div>
                                    <div class="form-card-sub-tite text-black">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="sub-title p-1"><span class="text-center p-1"><strong>(1)
                                                            Details of biomaterial to be imported</strong></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group mt-2">
                                            <label for="send_app_design" class="form-label"><strong>(i) HS code of Item to
                                                    be imported</strong></label>
                                            <input type="text" class="form-control" maxlength="10" id="hs_code"
                                                name="hs_code" value="{{isset($Imports->hs_code)? $Imports->hs_code:'';}}" readonly>
                                        </div>
                                    </div>@php
                                    $a = explode(",", $Imports->nature_biomaterial);
                                    @endphp
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <label for="natural_biomateria_exported"
                                                        class="form-label"><strong>(ii) Nature of biomaterial to be
                                                            imported</strong></label>
                                                    <select class="select2 form-control select2-multiple"
                                                        data-toggle="select2" multiple="multiple"
                                                        data-placeholder="Select..." disabled>
                                                        <option class="multiple_biom" value="whole blood" class="p-1">
                                                            Whole blood</option>
                                                        <option class="multiple_biom" value="Serum" class="p-1"
                                                            name="natural_biomateria_exported" {{(in_array("Serum", $a))? 'selected':''}}>Serum</option>
                                                        <option class="multiple_biom" value="plasma" class="p-1"
                                                            name="natural_biomateria_exported" {{(in_array("plasma", $a))? 'selected':''}}>Plasma</option>
                                                        <option class="multiple_biom" value="urine" class="p-1"
                                                            name="natural_biomateria_exported" {{(in_array("urine", $a))? 'selected':''}}>Urine</option>
                                                        <option class="multiple_biom" value="other body fluids"
                                                            class="p-1" name="natural_biomateria_exported" {{(in_array("other body fluids", $a))? 'selected':''}}>Other body
                                                            fluids</option>
                                                        <option class="multiple_biom" value="Tissue/Cell culture"
                                                            class="p-1" name="natural_biomateria_exported" {{(in_array("Tissue/Cell culture", $a))? 'selected':''}}>Tissue/Cell
                                                            culture</option>
                                                        <option class="multiple_biom" value="Nucleic acid(DNA/RNA"
                                                            class="p-1" name="natural_biomateria_exported" {{(in_array("Nucleic acid(DNA/RNA", $a))? 'selected':''}}>Nucleic
                                                            acid(DNA/RNA)</option>
                                                        <option id="other_select" value="other" class="p-1" {{(in_array("other", $a))? 'selected':''}}>other
                                                            (Please sepcify)
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mt-1">
                                                    <label for="natural_biomateria_exported"
                                                        class="form-label multiple_yes" style="{{(in_array("other body fluids", $a))? '':'display: none;'}}"><strong>Provides Details</strong></label>
                                                <textarea name="nature_biomaterial[]" class="mt-1" id="body_fluids" maxlength="100" cols="40"
                                                    rows="3" max="100" placeholder="Max 100 Words"
                                                    style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array("other body fluids", $a))? '':'display: none;'}}">{{isset($Imports->nature_biomaterial)? $Imports->nature_biomaterial:'';}}</textarea>
                                                <textarea name="nature_biomaterial[]" class="mt-5 multiple_yes" id="multiple_yes" maxlength="100" cols="40"
                                                    rows="3" max="100" placeholder="Description of items"
                                                    style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array("other", $a))? '':'display: none;'}}">{{isset($Imports->nature_biomaterial)? $Imports->nature_biomaterial:'';}}</textarea>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div><!-- end row -->
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="row py-3">
                                        <label for="send_app_design" class="form-label"><strong>(iii) Details of Quantity to be imported</strong></label>
                                        <div class="col-md-6">
                                        <div class="form-group mt-2">
                                        <input type="text" class="form-control" id="Quantity_import_num" name="Quantity_import_num" placeholder="Number" onkeypress="return isNumber(event)" maxlength="10" value="{{ isset($Imports->Quantity_import_num)? $Imports->Quantity_import_num:''; }}">
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <select class="form-control select2" data-toggle="select2">
                                                <option>Select</option>
                                                <option value="ml" {{ ($Imports->Quantity_import_vol == 'ml')? 'selected':''; }}>ML</option>
                                                <option class="l" {{ ($Imports->Quantity_import_vol == 'l')? 'selected':''; }}>L</option>
                                                {{-- <option>Select</option> --}}
                                            </select>
                                        {{-- <input type="text" class="form-control" id="Quantity_import_vol" name="Quantity_import_vol" placeholder="Volume" onkeypress="return isAlfa(event)"> --}}
                                        </div>
                                        </div>
                                         </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-3">
                                                <label for="natural_biomateria_exported" class="form-label"><span><strong>(iv) Whether repeat import of samples is envisaged </strong></span></label>
                                                 <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group mt-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                name="repeat_import" id="envisaged_yes"
                                                                value="yes" {{ ($Imports->repeat_import == 'yes')? 'checked':''; }} disabled/>
                                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline custom-no">
                                                            <input class="form-check-input" type="radio"
                                                                name="repeat_import" id="envisaged_no"
                                                                value="no" {{ ($Imports->repeat_import == 'no')? 'checked':''; }} disabled/>
                                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="natural_biomateria_exported" class="form-label wirteenvisaged_yes" style="{{ ($Imports->repeat_import == 'yes')? '':'display:none'; }}"><span><strong>Provide details</strong></span></label>
                                                        <textarea name="repeat_import[]" class="wirteenvisaged_yes" id="wirteenvisaged_yes" maxlength="100" cols="30" rows="2"
                                                            max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->repeat_import == 'yes')? '':'display:none'; }}"></textarea>
                                                    </div>
                                                </div>
                                           </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-card-sub-tite text-black mt-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="sub-title p-1"><span class="text-center p-1"><strong>(2) Purpose of import of samples</strong></span></div>
                                            </div>
                                        </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <label for="" class="form-label"><strong>(i) Specify purpose/end use</strong></label>
                                                <!--<div class="arrow-icon py-2 mr-3">
                                                        <i class="fa fa-angle-down float-end mt-3 select2-selection select2-selection--multiple" style="position: relative; z-index: 11; font-size: 24px;margin-right: 13px; "></i>
                                                    </div>-->
                                                    {{-- <select name="purpose_end_use[]" id="purposend multiple-select-field" class="form-control form-select" data-placeholder="Please Select" aria-label=".form-select-lg example" multiple> --}}
                                                        <select class="select2 form-control select2-multiple"
                                                        data-toggle="select2" multiple="multiple"
                                                        data-placeholder="Select...">
                                                        <option class="enduser" value="Calibration/Quality assurance" class="p-1">
                                                            Calibration/Quality assurance</option>
                                                        <option class="enduser" value="Clinical Diagnostics/Testing" class="p-1"
                                                            name="">Clinical Diagnostics/Testing</option>
                                                            <option id="purposeend" value="other" class="p-1">other
                                                                (Please sepcify)
                                                            </option>
                                                </select>
                                                    <!--<select name="purpose_end_use[]" class="form-control form-select mt-5" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                                        <option class="enduser" value="Calibration/Quality assurance" >Calibration/Quality assurance</option>
                                                    <option class="enduser" value="Clinical Diagnostics/Testing">Clinical Diagnostics/Testing</option>
                                                    <option class="other_enduser">Others (please specify)</option>
                                                    {{-- <option id="purposeend" value="" class="other_enduser">Others (please specify)</option> --}}
                                                 </select>-->
                                         </div>
                                    </div>
                                    <div class="col-md-6 pt-4">
                                        <textarea name="purpose_end_use[]" id="enduser_yes" maxlength="100" cols="45" rows="3"max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                                <div class="form-card-sub-tite text-black mt-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="sub-title p-1 "><span class="text-center p-1"><strong>(3) Biosafety Concerns</strong></span></div>
                                        </div>
                                    </div>
                             </div>
                             <div class="row">
                                <h4 class="mt-3"><strong>(i) Whether the material to be imported contains any of the following:</strong></h4>
                                <div class="col-md-6">
                                    <p class="grid"><span><i class="ri-checkbox-blank-circle-fill" style="font-size: 12px; text-align:justify;"></i> <strong>Infectious biological agents capable of causing illness in humans</strong></span></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="biosafety_infectious"
                                                        id="infectious_yes" value="yes" {{ ($Imports->biosafety_infectious == 'yes')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>
                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input" type="radio" name="biosafety_infectious[]"
                                                        id="infectious_no" value="no" {{ ($Imports->biosafety_infectious == 'no')? 'checked':''; }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="biosafety_infectious" class="label-form infectiousBox" style="{{ ($Imports->biosafety_infectious == 'yes')? '':'display:none;' }}"><strong>Add Provide details</strong></label>
                                                <textarea name="biosafety_infectious[]" class="infectiousBox" id="infectiousBox" class="infectiousBox" maxlength="100" cols="45" rows="2"max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->biosafety_infectious == 'yes')? '':'display:none;' }};"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p class="grid"><span><i class="ri-checkbox-blank-circle-fill" style="font-size: 12px; text-align:justify;"></i> <strong>Materials known or reasonably expected to contain an infectious biological agent</strong></span></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="biosafety_materials"
                                                        id="materials_yes" value="yes" {{ ($Imports->biosafety_materials == 'yes')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <textarea name="biosafety_materials" id="enduser_yes" maxlength="100" cols="45" rows="2"max="100"
                                        placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->biosafety_materials == 'yes')? '':'display:none;' }}"></textarea>
                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input" type="radio" name="biosafety_materials[]"
                                                        id="materials_no" value="no" {{ ($Imports->biosafety_materials == 'no')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="biosafety_materials" class="label-form materialsText_yes" style="{{ ($Imports->biosafety_materials == 'yes')? '':'display:none;' }}"><strong>Provide details</strong></label>
                                                <textarea name="biosafety_materials[]" class="materialsText_yes" id="materialsText_yes" maxlength="100" cols="45" rows="2"
                                                    max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->biosafety_materials == 'yes')? '':'display:none;' }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p class="grid"><span><i class="ri-checkbox-blank-circle-fill" style="font-size: 12px; text-align:justify;"></i> <strong>Vectors of human disease</strong> </span></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="biosafety_vectors"
                                                        id="vectors_yes" value="yes" {{ ($Imports->biosafety_vectors == 'yes')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input" type="radio" name="biosafety_vectors[]"
                                                        id="vectors_no" value="no" {{ ($Imports->biosafety_vectors == 'no')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="biosafety_vectors" class="label-form vectorsText_yes" style="{{ ($Imports->biosafety_vectors == 'yes')? '':'display:none;' }}"><strong>Provide details</strong></label>
                                                <textarea name="biosafety_vectors[]" class="vectorsText_yes" id="vectorsText_yes" maxlength="100" cols="45" rows="2"
                                                    max="100" placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->biosafety_vectors == 'yes')? '':'display:none;' }}"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <p class="grid"><span><i class="ri-checkbox-blank-circle-fill" style="font-size: 12px; text-align:justify;"></i> <strong>Nucleic acids encoding sections or fragments of infectious viruses capable of producing the infectious virus</strong></span></p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="biosafety_nucleic"
                                                        id="nucleic_yes" value="yes" {{ ($Imports->biosafety_nucleic == 'yes')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input" type="radio" name="biosafety_nucleic"
                                                        id="nucleic_no" value="no" {{ ($Imports->biosafety_nucleic == 'no')? 'checked':'' }} disabled/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="biosafety_nucleic" class="label-form nucleicText_yes" style="{{ ($Imports->biosafety_nucleic == 'yes')? '':'display:none;' }}"><strong>Add Provide details</strong></label>
                                                <textarea name="biosafety_nucleic[]" class="nucleicText_yes" id="nucleicText_yes" maxlength="100" cols="45" rows="2"
                                                    max="100" placeholder="Description of item" style="border:1px solid #ddd; border-radius: 5px !important; {{ ($Imports->biosafety_nucleic == 'yes')? '':'display:none;' }};"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-card-sub-tite text-black mt-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="sub-title p-1 "><span class="text-center p-1"><strong>(4) IBSC/RCGM approval, as applicable**</strong></span></div>
                                    </div>
                                </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p><strong>For the import of infectious biological material, has IBSC/RCGM approval been obtained?</strong></p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-3">
                                    <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="biological_material" id="ibsc_yes"
                                                    value="yes" {{ ($Imports->biological_material == 'yes')? 'checked':'' }} disabled/>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline custom-no">
                                                <input class="form-check-input" type="radio"
                                                    name="biological_material" id="ibsc_no"
                                                    value="no" {{ ($Imports->biological_material == 'no')? 'checked':'' }} disabled/>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" style="{{ ($Imports->biological_material == 'yes')? '':'display:none;' }}" id="ibsc_approval_yes">
                                         <label for="send_app_design" class="form-label">Uploads Details.</label>
                                        <input type="file" class="form-control" name="biological_material">
                                        </div>
                                    </div>
                               </div>
                                </div>
                            </div>
                        </div>
                        <div class="card custom-card mt-4">
                            <div class="form-card-tite text-white">
                                <p class="title-items">PART - C: Declaration</p>
                            </div>
                        </div>
                        <div class="row">

                            <div class="row mb-3 m-1" style="border: 1px solid #ddd;">
                                <p><span>......................</span><br>Signature</p>
                                <p>(Authorized signatory on behalf of organization as per law of company)</p>
                                <div class="col-md-6">
                                   <div class="form-group mt-2">
                                      <label for="impexp_iec_code" class="form-label"><strong>Name:</strong></label>
                                      <input type="text" class="form-control" id="name" name="name" value="{{ isset($Imports->name)? $Imports->name:'' }}" readonly>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group mt-2">
                                         <label for="impexp_iec_code" class="form-label"><strong>Designation:</strong></label>
                                         <input type="text" class="form-control" id="designation" name="designation" value="{{ isset($Imports->designation)? $Imports->designation:'' }}" readonly>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2 mb-3">
                                         <label for="impexp_iec_code" class="form-label"><strong>Address:</strong></label>
                                         <input type="text" class="form-control" id="address" name="address" value="{{ isset($Imports->address)? $Imports->address:'' }}" readonly>
                                     </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2 mb-3">
                                        <label for="impexp_iec_code" class="form-label"><strong>Date:</strong></label>
                                        <input type="text" class="form-control" value="{{ isset($Imports->dates)? $Imports->dates:'' }}" readonly id="dates" name="dates">
                                    </div>
                               </div>
                            </div>
                        </div>
                        <div class="row ml-2" style="border: 1px solid #ddd;">
                            <div class="col-md-12">
                                <div class="content-for-exp">
                                    <p style="text-align:justify;">*If samples are to be exported to more than one institution/department, a separate request form should be completed for each recipient.</p>
                                    <p style="text-align:justify;">**Request for storage is necessary if the samples are to be stored.</p>
                                    <p style="text-align:justify;">*** For the export of infectious biological material, IBSC/RCGM approval to be sought as per the Revised Simplified Procedures/ Guidelines on Import, Export and Exchange of GE organisms and products thereof for R&D purpose, 2020 vide DBT OM dated 17.01.2020 and accordingly, form B3, duly filled in every aspect, to be submitted through IBKP portal. (https://ibkp.dbtindia.gov.in/)</p>
                                    <p style="text-align:justify;">****To be completed every time prior to shipping sample.</p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary mt-3 mb-3" name="submit"
                            id="btnSubmit" value="submit" style="font-size:17px">submit</button>
                            </div>
                        </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
