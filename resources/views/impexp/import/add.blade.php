@extends('impexp.layouts.admin')
@section('title', 'Add New Importer')
@section('content')
    <section class="py-2">
        <div class="container">
            <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Application form for IMPORT
                    of human samples &
                    other biological materials for commercial/contract research</strong><button
                    class="btn btn-primary float-end">
                    <a class="float-end text-white" href="{{ url('imp-exp/import') }}" style="font-weight:600;">Back</a>
                </button></p>

        </div>
    </section>
    <section>
        <form method="POST" action="{{ url('imp-exp/creates') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
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
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="impexp_iec_code" class="form-label"><strong>(i) Importer Exporter
                                        Code (IEC) Number</strong></label>
                                <input type="text" class="form-control iec_number" value="{{ $ieccode->iec_code }}"
                                    id="iec_number" name="iec_number" maxlength="10">
                                <span> </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send_app_name" class="form-label"><strong>(ii) Name of the
                                        Applicant</strong></label>
                                <input type="text" class="form-control name_of_applicant" value="{{ $ieccode->name }}"
                                    id="name_of_applicant" name="name_of_applicant" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send_app_design" class="form-label"><strong>(iii) Designation of the
                                        Applicant</strong></label>
                                <input type="text" class="form-control" value="{{ $ieccode->designation }}"
                                    id="name_of_designation" name="name_of_designation" onkeypress="return isAlfa(event)">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <div class="form-group mt-2">
                                <label for="send_app_design" class="form-label"><strong>(iv) Address of the
                                        Company/Institution</strong></label>
                                <input type="text" class="form-control" id="address_company" name="address_company">
                            </div>
                        </div>
                        <div class="col-md-8  mt-2">
                            <label for="comp_intitute_denied_export_auth_last_3_years" class="form-label"><strong>(v)
                                    Whether the applicant/ company/ institution has
                                    been denied import authorization in last 3 years?</strong></label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="company_denied_import[]"
                                                id="text_yes" value="" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="company_denied_import[]"
                                                id="text_no" value="No" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group wirtetext_yes" style="display: none;">
                                        <label for="upload_files" name="denied_import_upload" class="form-lable"><span
                                                class="d-inline-block" tabindex="0" data-bs-toggle="tooltip"
                                                data-bs-title="Max. Size 5MB (.PDF)">
                                                <strong>Upload relevant documents, if any</strong>
                                            </span></label>
                                        <input type="file" class="form-control" name="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group wirtetext_yes" style="display: none;">
                                        <label for="upload_files" name="denied_import_upload"
                                            class="form-lable"><strong>Provide details</strong></label>
                                        <textarea name="company_denied_import[]" class="wirtetext_yes" id="wirtetext_yes" maxlength="100" cols="35"
                                            rows="2" max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="form-card-sub-tite text-black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><strong>(2)
                                        Sending party</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="impexp_iec_code" class="form-label"><strong>(i) Name of the
                                        Sender</strong></label>
                                <input type="text" class="form-control" id="name_of_sender" name="name_of_sender">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send_app_name" class="form-label"><strong>(ii) Designation of the
                                        Sender</strong></label>
                                <input type="text" class="form-control" id="designation_of_sender"
                                    name="designation_of_sender">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="send_app_name" class="form-label"><strong>(iii) Address of the
                                        Company/Institution</strong></label>
                                <input type="text" class="form-control" id="address_of_company"
                                    name="address_of_company">
                            </div>
                        </div>
                    </div><!--end row--->
                </div>
                <div class="form-card-tite text-white">
                    <p class="title-items"><strong>PART-B: Other Details</strong></p>
                </div>
                <div class="form-card-sub-tite text-black">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><strong>(1)Details of biomaterial to
                                        be imported</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label"><strong>(i) HS code of Item to
                                        be imported</strong></label>
                                <input type="text" class="form-control hs_code" maxlength="8" id="hs_code"
                                    name="hs_code">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label"><strong>Description of HS Code</strong></label>
                                <input type="text" class="form-control" name="desc" class="desc" id="desc" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="natural_biomateria_exported" class="form-label"><strong>(ii) Nature of
                                        biomaterial to be
                                        imported</strong></label>
                                <select class="select2 form-control select2-multiple" data-toggle="select2"
                                    multiple="multiple" data-placeholder="Select...">
                                    <option class="multiple_biom" value="whole blood" class="p-1">
                                        Whole blood</option>
                                    <option class="multiple_biom" value="Serum" class="p-1"
                                        name="natural_biomateria_exported">Serum</option>
                                    <option class="multiple_biom" value="plasma" class="p-1"
                                        name="natural_biomateria_exported">Plasma</option>
                                    <option class="multiple_biom" value="urine" class="p-1"
                                        name="natural_biomateria_exported">Urine</option>
                                    <option class="multiple_biom" value="other body fluids" class="p-1"
                                        name="natural_biomateria_exported">Other body
                                        fluids</option>
                                    <option class="multiple_biom" value="Tissue/Cell culture" class="p-1"
                                        name="natural_biomateria_exported">Tissue/Cell
                                        culture</option>
                                    <option class="multiple_biom" value="Nucleic acid(DNA/RNA" class="p-1"
                                        name="natural_biomateria_exported">Nucleic
                                        acid(DNA/RNA)</option>
                                    <option id="other_select" value="other" class="p-1">other
                                        (Please sepcify)
                                    </option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="natural_biomateria_exported" class="form-label body_fluids"
                                    style="display: none;"><strong>Provide details</strong></label>
                                <textarea name="nature_biomaterial[]" class="body_fluids" id="body_fluids" maxlength="100" cols="45"
                                    rows="2" max="100" placeholder="Add details"
                                    style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>

                                <label for="natural_biomateria_exported" class="form-label multiple_yes"
                                    style="display: none;"><strong>Provide details</strong></label>
                                <textarea name="nature_biomaterial[]" class="multiple_yes" id="multiple_yes" maxlength="100" cols="45"
                                    rows="2" max="100" placeholder="Add details"
                                    style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row py-3">
                                <label for="send_app_design" class="form-label"><strong>(iii) Details of
                                        Quantity to be imported</strong></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Number</label>
                                        <input type="text" class="form-control" id="Quantity_import_num"
                                            name="Quantity_import_num" placeholder="Number"
                                            onkeypress="return isNumber(event)" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Volume</label>
                                        <select class="form-control select2" data-toggle="select2">
                                            <option>Select Unit</option>
                                            <option value="ml">ML</option>
                                            <option class="l">L</option>
                                            {{-- <option>Select</option> --}}
                                        </select>
                                        {{-- <input type="text" class="form-control" id="Quantity_import_vol" name="Quantity_import_vol" placeholder="Volume" onkeypress="return isAlfa(event)"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label for="natural_biomateria_exported" class="form-label"><span><strong>(iv) Whether
                                            repeat import of samples
                                            is envisaged </strong></span></label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="repeat_import[]"
                                                    id="envisaged_yes" value="" />
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>

                                            <div class="form-check form-check-inline custom-no">
                                                <input class="form-check-input" type="radio" name="repeat_import[]"
                                                    id="envisaged_no" value="No" />
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="natural_biomateria_exported" class="form-label wirteenvisaged_yes"
                                                style="display:none;"><span><strong>Provides
                                                        details</strong></span></label>
                                            <textarea name="repeat_import[]" class="wirteenvisaged_yes" id="wirteenvisaged_yes" maxlength="100" cols="30"
                                                rows="2" max="100" placeholder="Add details"
                                                style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end roww-->
                </div>
                <div class="form-card-sub-tite text-black mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1"><span class="text-center p-1"><strong>(2)
                                        Purpose of import of samples</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="" class="form-label"><strong>(i) Specify purpose/end
                                        use</strong></label>
                                <select name="purpose_end_use[]" ass="select2 form-control select2-multiple"
                                    data-toggle="select2" id="purpose_end_use">.
									<option class="enduser" value=""></option>
                                    <option class="enduser" value="Calibration/Quality assurance">Calibration/Quality
                                        assurance</option>
                                    <option class="enduser" value="Clinical Diagnostics/Testing">Clinical
                                        Diagnostics/Testing
                                    </option>
                                    <option id="other_enduser" value="Other" class="p-1">other (Please sepcify)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 pt-2" id="enduser_yes_one" style="display:none;">
                            <label for="" class="form-label enduser_yes"><strong>Provide
                                    details</strong></label>
                            <textarea name="purpose_end_use[]" class="enduser_yes" id="enduser_yes" maxlength="100" cols="45"
                                rows="2"max="100" placeholder="Add details"
                                style="border:1px solid #ddd; border-radius: 5px !important;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-card-sub-tite text-black mt-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1 "><span class="text-center p-1"><strong>(3)Biosafety
                                        Concerns</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h4 class="mt-3"><strong>(i) Whether the material to be imported contains any of
                                the following:</strong></h4>
                        <div class="col-md-6">
                            <p class="grid"><span><i class="ri-checkbox-blank-circle-fill"
                                        style="font-size: 12px; text-align:justify;"></i>
                                    <strong>Infectiousbiological agents capable of causing illness in
                                        humans</strong></span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_infectious"
                                                id="infectious_yes" value="yes" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_infectious"
                                                id="infectious_no" value="no" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="biosafety_infectious" class="label-form infectiousBox"
                                            style="display:none;"><strong>Provide details</strong></label>
                                        <textarea name="biosafety_infectious_description" class="infectiousBox" id="infectiousBox" class="infectiousBox"
                                            maxlength="100" cols="35" rows="2"max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p class="grid"><span><i class="ri-checkbox-blank-circle-fill"
                                        style="font-size: 12px; text-align:justify;"></i> <strong>Materials
                                        known or reasonably expected to contain an infectious biological
                                        agent</strong></span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_materials"
                                                id="materials_yes" value="yes" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <textarea name="biosafety_materials" id="enduser_yes" maxlength="100" cols="45" rows="2"max="100"
                                            placeholder="Description of items" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_materials"
                                                id="materials_no" value="no" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="biosafety_materials" class="label-form materialsText_yes"
                                            style="display:none;"><strong>Provide details</strong></label>
                                        <textarea name="biosafety_materials_description" class="materialsText_yes" id="materialsText_yes" maxlength="100"
                                            cols="35" rows="2" max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p class="grid"><span><i class="ri-checkbox-blank-circle-fill"
                                        style="font-size: 12px; text-align:justify;"></i> <strong>Vectors
                                        of human disease</strong> </span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_vectors"
                                                id="vectors_yes" value="yes" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_vectors"
                                                id="vectors_no" value="no" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="biosafety_vectors" class="label-form vectorsText_yes"
                                            style="display:none;"><strong>Provide details</strong></label>
                                        <textarea name="biosafety_vectors_description" class="vectorsText_yes" id="vectorsText_yes" maxlength="100"
                                            cols="35" rows="2" max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <p class="grid"><span><i class="ri-checkbox-blank-circle-fill"
                                        style="font-size: 12px; text-align:justify;"></i> <strong>Nucleic
                                        acids encoding sections or fragments of infectious viruses capable
                                        of producing the infectious virus</strong></span></p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_nucleic"
                                                id="nucleic_yes" value="yes" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biosafety_nucleic"
                                                id="nucleic_no" value="no" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="biosafety_nucleic" class="label-form nucleicText_yes"
                                            style="display:none;"><strong>Provide details</strong></label>
                                        <textarea name="biosafety_nucleic_description" class="nucleicText_yes" id="nucleicText_yes" maxlength="100"
                                            cols="35" rows="2" max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
                <div class="form-card-sub-tite text-black mt-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sub-title p-1 "><span class="text-center p-1"><strong>(4)IBSC/RCGM approval, as
                                        applicable**</strong></span></div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <p class="p-1"><strong>For the import of infectious biological material, has IBSC/RCGM
                                approval been obtained?</strong></p>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="biological_material"
                                                id="ibsc_yes" value="" />
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>

                                        <div class="form-check form-check-inline custom-no">
                                            <input class="form-check-input" type="radio" name="biological_material"
                                                id="ibsc_no" value="No" />
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2" style="display:none;" id="ibsc_approval_yes">
                                        <label for="send_app_design" class="form-label">Uploads
                                            Details.</label>
                                        <input type="file" class="form-control" name="biological_material">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->

                <div class="form-card-tite text-white">
                    <p class="title-items"><strong>PART - C : Declaration</strong></p>
                </div>
                <div class="card-body">
                    <div class="row" style="margin: 3px;">
                        <div style="border-right: 1px solid #0000004a;" class="col-md-5">
                            <p><strong>(i) Declaration by the person requesting import of samples</strong>
                            </p>
                        </div>
                        <div class="col-md-7">
                            <p style="text-align: justify">I certify that the information provided in this
                                request form is true and correct to the best of my
                                knowledge, and I hereby declare that the samples referred to herein will be
                                utilized for the
                                purpose of <input type="text" class="partc" style="float:none;" name="purpose_of" id="purpose_of">
                                only, as stated in the
                                application.</p>

                            <p style="text-align: justify">This is to certify that the samples referred to
                                herein being sent me for analysis/experimentation, as
                                mentioned in this application, will be in my custody and I hereby confirm
                                that they will be
                                utilized for the purpose of <input type="text" class="" style="float:none;"
                                    name="purpose_of_one" id="purpose_of_one"> only,
                                and I accept full responsibility and control over the usage of these
                                samples.</p>
                        </div>
                    </div><!--end row-->
                    <div class="row"
                        style="margin: 3px;border-top: 1px solid #0000004a; border-bottom: 1px solid #0000004a;">
                        <div style="border-right: 1px solid #0000004a;" class="col-md-5">
                            <p class="mt-2"><strong>(ii) Copy of Commercial contract/Proforma invoice</strong></p>
                        </div>
                        <div class="col-md-7">
                            <p style="text-align: justify;">Certified copy of commercial contract/Proforma
                                invoice is enclosed. Further I undertake to comply
                                FEMA regulations and other guidelines issued by RBI regarding foreign
                                transactions.</p>
                        </div>
                    </div><!--end row-->

                    <div class="row mb-3" style="border: 1px solid #ddd;">
                        <p><span>......................</span><br>Signature</p>
                        <p>(Authorized signatory on behalf of organization as per law of company)</p>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="impexp_iec_code" class="form-label"><strong>Name:</strong></label>
                                <input type="text" class="form-control" id="name" name="name" readonly value="{{ $ieccode->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2">
                                <label for="impexp_iec_code" class="form-label"><strong>Designation:</strong></label>
                                <input type="text" class="form-control" id="designation" readonly value="{{ $ieccode->designation }}" name="designation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2 mb-2">
                                <label for="impexp_iec_code" class="form-label"><strong>Address:</strong></label>
                                <input type="text" class="form-control" id="address" readonly value="{{ $ieccode->address }}" name="address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mt-2  mb-2">
                                <label for="impexp_iec_code" class="form-label"><strong>Date:</strong></label>
                                <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Calcutta');
                                echo date('d-m-Y'); ?>" id="dates"
                                    name="dates">
                            </div>
                        </div>
                    </div><!--end row-->
                    <div class="row" style="border: 1px solid #ddd;">
                        <div class="col-md-12">
                            <div class="content-for-exp">
                                <p style="text-align:justify;">*If samples are to be exported to more than
                                    one institution/department, a separate request form should be completed
                                    for each recipient.</p>
                                <p style="text-align:justify;">**Request for storage is necessary if the
                                    samples are to be stored.</p>
                                <p style="text-align:justify;">*** For the export of infectious biological
                                    material, IBSC/RCGM approval to be sought as per the Revised Simplified
                                    Procedures/ Guidelines on Import, Export and Exchange of GE organisms
                                    and products thereof for R&D purpose, 2020 vide DBT OM dated 17.01.2020
                                    and accordingly, form B3, duly filled in every aspect, to be submitted
                                    through IBKP portal. (https://ibkp.dbtindia.gov.in/)</p>
                                <p style="text-align:justify;">****To be completed every time prior to
                                    shipping sample.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-3" name="submit" id="btnSubmit"
                                value="submit" style="font-size:17px">submit</button>
                        </div>
                    </div>
                </div>
            </div><!--end card-->
        </form>
    </section>


    <script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/backend/js') }}/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backend/js') }}/jquery.min.js"></script>
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
            $('#purpose_of').val(purpose_end_use);

                if(purpose_end_use == 'Other'){
                    $('#enduser_yes_one').show();
                }else{
                    $('#enduser_yes_one').hide();
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
                    url: '{{ route('imp-exp.hs_code') }}',
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
