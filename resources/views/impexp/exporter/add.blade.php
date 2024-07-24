@extends('impexp.layouts.admin')
@section('title', 'Add New Exporter')
@section('content')
    <div class="page-title-box">
        <section class="py-2">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"> <button class="btn btn-primary float-end">
                                <a class="float-end text-white" href="{{ url('imp-exp/exporter') }}" style="font-weight:600;"><i class="mdi mdi-keyboard-backspace" style="font-weight:600;"></i> Back</a>
                            </button></li>
                        </ol>
                    </div>
                    <h4 class="page-title text-center" style="font-size: 20px; font-weight:600; color:#14468C">Application form for Export of Human Biological Material</h4>
                </div>
            </div>
        </section>
        <section class="exporter-section">
            @if (session()->has('message'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>Success!</strong> {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error_msg'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong><i class="ri-close-circle-line me-2"></i> </strong> {{ session('error_msg') }}
                </div>
            @endif
            <form class="py-1 mb-5 needs-validation novalidate" action="{{ route('exporter.manage_exporter_process') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="card "><input type="hidden" name="draftid" value="{{ !empty($export_data->id)? $export_data->id:''}}">
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
                                            (IEC)</strong></label>
                                    <input type="text" value="{{ $ieccode->iec_code }}"
                                        class="form-control sending_iec_number" id="sending_iec_number"
                                        name="sending_iec_number" onkeypress="return isNumber(event)" maxlength="10" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sending_applicant_name" class="form-label"><strong>(ii) Name of the
                                            Applicant</strong></label>
                                    <input type="text" value="{{ $ieccode->name }}" class="form-control"
                                        id="sending_applicant_name" name="sending_applicant_name" readonly
                                        onkeypress="return isAlfa(event)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sending_applicant_design" class="form-label"><strong>(iii) Designation of
                                            the Applicant</strong></label>
                                    <input type="text" value="{{ $ieccode->designation }}" class="form-control"
                                        id="sending_applicant_design" name="sending_applicant_design"
                                        onkeypress="return isAlfa(event)" readonly>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <label for="sending_add_company_institute" class="form-label"><strong>(iv) Address of
                                            the Company/Institution</strong></label>
                                    <input type="text" value="{{ $ieccode->address }},{{ $ieccode->address2 }},{{ $ieccode->city }},{{ $ieccode->states }},{{ $ieccode->pincode }}" class="form-control"
                                        id="sending_add_company_institute" name="sending_add_company_institute">
                                </div>
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="comp_intitute_denied_export_auth_last_3_years" class="form-label"><strong>(v)
                                        Whether the applicant/ company/ institution has been denied export authorization in
                                        last 3 years?</strong><span class="text-danger">*</span></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="denied_export_auth_last_3_years_yes_no" id="text_yes"
                                                    value="Yes" {{((!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes') || (old('denied_export_auth_last_3_years_yes_no') == 'Yes'))? 'checked':''}}/>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="denied_export_auth_last_3_years_yes_no" id="text_no"
                                                    value="No" {{((!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'No') || (old('denied_export_auth_last_3_years_yes_no') == 'No'))? 'checked':''}}/>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wirtetext_yes" style="{{((!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes') || (old('denied_export_auth_last_3_years_yes_no') == 'Yes'))? '':'display: none;'}}">
                                        @if(!empty($export_data->upload_comp_institute_denied_export))
                                        <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/media/exporter/'.$export_data->upload_comp_institute_denied_export.'key'.Session::get('key')) }}" target="_blank"><label class="form-lable" style="{{($export_data->upload_comp_institute_denied_export != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        <input type="hidden" name="upload_comp_institute_denied_export" id="upload_comp_institute_denied_export_draft" value="{{$export_data->upload_comp_institute_denied_export}}">
                                                        @endif
                                                        <input type="hidden" name="upload_comp_institute_denied_export" id="upload_comp_institute_denied_export_draft" value="">
                                        <label for="upload_files" name="upload_comp_institute_denied_export"
                                                class="form-lable"><span class="d-inline-block" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 2MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                            <input type="file" class="form-control" name="upload_comp_institute_denied_export" id="infileid">

                                                <span class="text-danger" id="value27"></span>
												@if($errors->has('upload_comp_institute_denied_export'))
													<span class="text-danger">{{ $errors->first('upload_comp_institute_denied_export') }}</span>
												 @endif
												 @if (session()->has('msg1'))
													<div class="alert alert-danger alert-dismissible fade show" role="alert">
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
														<strong>X </strong> {{ session('msg1') }}
													</div>
												@endif
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                    <label for="comp_institute_denied_export_auth_last_3_years"
                                                class="form-lable wirtetext_yes" style="{{((!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes') || (old('denied_export_auth_last_3_years_yes_no') == 'Yes'))? '':'display: none;'}}">Provide
                                                details<span class="text-danger">*</span></label>
                                        <div class="form-group">

                                            <textarea name="comp_institute_denied_export_auth_last_3_years" class="wirtetext_yes" id="wirtetext_yes"
                                                maxlength="100" cols="35" rows="2" max="100" placeholder="Add details"
                                                style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; {{((!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes') || (old('denied_export_auth_last_3_years_yes_no') == 'Yes'))? '':'display: none;'}}">{{(!empty($export_data->comp_institute_denied_export_auth_last_3_years))? $export_data->comp_institute_denied_export_auth_last_3_years: (!empty(old('comp_institute_denied_export_auth_last_3_years'))? old('comp_institute_denied_export_auth_last_3_years'):'')}}</textarea>
                                                <span class="text-danger" id="value1_null"></span>
                                                <span class="text-danger" id="value1_pattern"></span>
                                            </div>
                                    </div>
                                    @if($errors->has('denied_export_auth_last_3_years_yes_no'))
										<span class="text-danger">{{ $errors->first('denied_export_auth_last_3_years_yes_no') }}</span>
								      @endif
                                      <span class="text-danger" id="value1"></span>
                                </div>
                            </div><!--end row-->
                        </div>
                        </div>
                        <div class="form-card-sub-tite text-black">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="sub-title p-1"><span class="text-center p-1"><b>(2) Receiving Party
                                    </b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receving_recipient_name" class="form-label"><strong>(i) Name of the
                                                Recipient</strong><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_name" name="receving_recipient_name" value="{{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:(old('receving_recipient_name'))}}">
                                            @if($errors->has('receving_recipient_name'))
												<span class="text-danger">{{ $errors->first('receving_recipient_name') }}</span>
											 @endif

                                             <span class="text-danger" id="value2"></span>
                                             <span class="text-danger" id="value2_pattern"></span>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receving_recipient_design" class="form-label"><strong>(ii) Designation of Recipient
                                        </strong><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_design" name="receving_recipient_design" value="{{isset($export_data->receving_recipient_design)? $export_data->receving_recipient_design:(old('receving_recipient_design'))}}">
                                            @if($errors->has('receving_recipient_design'))
												<span class="text-danger">{{ $errors->first('receving_recipient_design') }}</span>
											 @endif
                                             <span class="text-danger" id="value3"></span>
                                             <span class="text-danger" id="value3_pattern"></span>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receiving_add_company_institute" class="form-label"><strong>(iii)
                                                Address of the Company/Institution</strong><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="receiving_add_company_institute" name="receiving_add_company_institute" value="{{isset($export_data->receiving_add_company_institute)? $export_data->receiving_add_company_institute:(old('receiving_add_company_institute'))}}">
                                            @if($errors->has('receiving_add_company_institute'))
												<span class="text-danger">{{ $errors->first('receiving_add_company_institute') }}</span>
											 @endif
                                             <span class="text-danger" id="value4"></span>
                                             <span class="text-danger" id="value4_pattern"></span>
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
                                            than the receiving party</strong><span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="end_user_receiving_party_yes_no" id="end_user_yes"
                                                        value="Yes" {{((!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes') || (old('end_user_receiving_party_yes_no') == 'Yes'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span
                                                            class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="end_user_receiving_party" value="" id="wirtetextEnd_user_yes" maxlength="100" cols="42"
                                                        rows="2" max="100" placeholder="Add details"
                                                        style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes') || (old('end_user_receiving_party_yes_no') == 'Yes'))? '':'display:none;'}}">{{isset($export_data->end_user_receiving_party)? $export_data->end_user_receiving_party:(old('end_user_receiving_party'))}}</textarea>
                                                </div>
                                                <div class="form-check custom-no">
                                                    <input class="form-check-input" type="radio"
                                                        name="end_user_receiving_party_yes_no" id="end_user_no"
                                                        value="No" {{((!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'No') || (old('end_user_receiving_party_yes_no') == 'No'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if($errors->has('end_user_receiving_party_yes_no'))
													<span class="text-danger">{{ $errors->first('end_user_receiving_party_yes_no') }}</span>
												  @endif
                                                  <span class="text-danger" id="value5"></span>
                                                  <span class="text-danger" id="value5_null"></span>
                                                  <span class="text-danger" id="value5_pattern"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3 end_user_hide" style="{{((!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes') || (old('end_user_receiving_party_yes_no') == 'Yes'))? '':'display:none'}}">
                                        <label for="end_user_name" class="form-label"><strong>(ii) Name of the End
                                                user</strong><span class="text-danger">*</span></label>
                                        <input type="text" value="{{isset($export_data->end_user_name)? $export_data->end_user_name:(old('end_user_name'))}}" class="form-control" id="end_user_name"
                                            name="end_user_name">
                                    </div>
                                    @if($errors->has('end_user_name'))
												<span class="text-danger">{{ $errors->first('end_user_name') }}</span>
											 @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3 end_user_hide" style="{{((!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes') || (old('end_user_receiving_party_yes_no') == 'Yes'))? '':'display:none'}}">
                                        <label for="end_user_address" class="form-label"><strong>(iii) Address of the End
                                                user</strong><span class="text-danger">*</span></label>
                                        <input type="text" value="{{isset($export_data->end_user_address)? $export_data->end_user_address:(old('end_user_address'))}}" class="form-control" id="end_user_address"
                                            name="end_user_address">
                                    </div>
                                    @if($errors->has('end_user_address'))
												<span class="text-danger">{{ $errors->first('end_user_address') }}</span>
											 @endif
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
                                        <label for="" class="form-label"><strong>(i) Harmonized
                                                System (HS) Code of Item to be exported</strong><span class="text-danger">*</span></label>
                                                {{-- <input type="text" class="form-control hs_code" maxlength="8" id="hs_code"
                                                name="hs_code" value="{{isset($export_data->hs_code)? $export_data->hs_code:''}}"> --}}
                                                <select class="form-control hs_code" data-placeholder="Select..." name="hs_code" id="hs_code">
                                                    <option  value="">Please Select Code</option>
                                                    @php
                                                    foreach($hs_code as $hsCode_list){
                                                    @endphp
                                                    <option value="{{$hsCode_list->hs_code}}" {{(!empty($export_data->hs_code) && $export_data->hs_code == $hsCode_list->hs_code)? 'selected':''}}@if (old('hs_code') == $hsCode_list->hs_code) selected="selected" @endif>{{$hsCode_list->hs_code}} &nbsp; {{$hsCode_list->desc}}</option>
                                                    @php
                                                    }
                                                    @endphp
                                                </select>
                                                @if($errors->has('hs_code'))
													<span class="text-danger">{{ $errors->first('hs_code') }}</span>
												  @endif
                                                    <span class="text-danger" id="value7"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>Description of HS Code</strong><span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="hs_code_description" class="desc" id="desc" value="{{isset($export_data->hs_code_description)? $export_data->hs_code_description:(old('hs_code_description'))}}" readonly>
                                        @if($errors->has('hs_code_description'))
											<span class="text-danger">{{ $errors->first('hs_code_description') }}</span>
										@endif

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong><span class="text-danger">*</span></label>
                                            <select class="form-control" data-placeholder="Select..." name="nature_of_biomaterial_options" id="natural_biomaterial_exported_others">
                                                <option  value="">Please Select</option>
                                                @php
                                                foreach($nature_of_biomaterial_options as $value2){
                                                @endphp
                                                <option value="{{$value2->value}}" {{(!empty($export_data->natural_biomaterial_exported) && $export_data->natural_biomaterial_exported == $value2->value)? 'selected':''}}@if (old('nature_of_biomaterial_options') == $value2->value) selected="selected" @endif>{{$value2->name}}</option>
                                                @php
                                                }
                                                @endphp
                                            </select>
                                            @if($errors->has('nature_of_biomaterial_options'))
                                                <span class="text-danger">{{ $errors->first('nature_of_biomaterial_options') }}</span>
                                            @endif
                                            <span class="text-danger" id="value8"></span>
                                            <textarea class="mt-2" name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_details" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->natural_biomaterial_exported) && ($export_data->natural_biomaterial_exported == 'Other body fluids' || $export_data->natural_biomaterial_exported == 'Any Tissue/Cells' || $export_data->natural_biomaterial_exported == 'Others')) || ( old('nature_of_biomaterial_options') == 'Other body fluids' || old('nature_of_biomaterial_options') == 'Any Tissue/Cells' || old('nature_of_biomaterial_options') == 'Others'))? '':'display:none'}}">{{isset($export_data->natural_biomaterial_exported_details)? $export_data->natural_biomaterial_exported_details:(old('natural_biomaterial_exported_details'))}}</textarea>

                                                <!-- <textarea class="mt-2" name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_any_tissue_details" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->natural_biomaterial_exported_any_tissue_details) && $export_data->natural_biomaterial_exported_any_tissue_details == 'Any Tissue/Cells')? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_any_tissue_details))? $export_data->natural_biomaterial_exported_any_tissue_details :''}}</textarea>
                                                <textarea class="mt-2" name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_details" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->nature_of_biomaterial_options) && $export_data->natural_biomaterial_exported_details == 'Other body fluids')? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_details))? $export_data->natural_biomaterial_exported_details :''}}</textarea> -->
                                                <span class="text-danger" id="value81"></span>
                                                <span class="text-danger" id="value81_pattern"></span>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="sample_collected" class="form-label"><strong>(iii) Where were the samples collected?</strong><span class="text-danger">*</span></label>
                                        <select class="form-control" data-placeholder="Select..." name="sample_collected" id="where_sample_collected_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($where_the_samples_collected_options as $value2){
                                              @endphp
                                              <option value="{{$value2->value}}" {{(!empty($export_data->sample_collected) && $export_data->sample_collected == $value2->value)? 'selected':''}}@if (old('sample_collected') == $value2->value) selected="selected" @endif>{{$value2->name}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('sample_collected'))
												<span class="text-danger">{{ $errors->first('sample_collected') }}</span>
											@endif
                                            <span class="text-danger" id="value9"></span><br>
                                        <!-- <br><input type="button" id="where_sample_collected_button" value="      Please Click to Select     "></button>
                                        <ul id="where_sample_collected_options_display" style="display:none">
                                            @php
                                            foreach($where_the_samples_collected_options as $value2){
                                              @endphp
                                              @if($value2->value == 'Others')
                                              <li><input type="radio" value="{{$value2->value}}" name="sample_collected[]" id="where_sample_collected_id_others">  {{$value2->name}}</li>
                                              @else
                                              <li><input type="radio" value="{{$value2->value}}" name="sample_collected[]">  {{$value2->name}}</li>
                                              @endif
                                              @php
                                            }
                                            @endphp
                                            </li>
                                        </ul> -->
                                            <textarea class="mt-2" name="sample_collected_details" id="TextSampleCollectedwhere" maxlength="100" cols="60" rows="2" max="100" placeholder="Please specify" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->sample_collected) && $export_data->sample_collected == 'Others') || ( old('sample_collected') == 'Others'))? '':'display:none'}}">{{isset($export_data->sample_collected_details)? $export_data->sample_collected_details:(old('sample_collected_details'))}}</textarea>
                                            <span class="text-danger" id="value91"></span>
                                            <span class="text-danger" id="value91_pattern"></span>
                                        </div>

                                </div>

                                <div class="col-md-6">
                                    <label for="sample_collected" class="form-label mt-2"><strong>(iv) Has consent been taken from the individuals for the exact purpose for which the samples are being exported?</strong><span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="samples_being_exported" id="samplesExported_yes" value="Yes" {{((!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes') || (old('samples_being_exported') == 'Yes'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input inline-block" type="radio" name="samples_being_exported" id="samplesExported_no" value="No" {{((!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'No') || (old('samples_being_exported') == 'No'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sample_collected" class="form-label mt-2 TextsamplesExported" style="{{((!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes') || (old('samples_being_exported') == 'Yes'))? '':'display:none'}}"><strong>Provide details</strong><span class="text-danger">*</span></label>
                                                <textarea name="samples_being_exported_details" class="TextsamplesExported" id="TextsamplesExported" maxlength="100" cols="60" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes') || (old('samples_being_exported') == 'Yes'))? '':'display:none'}};">{{isset($export_data->samples_being_exported_details)? $export_data->samples_being_exported_details:(old('samples_being_exported_details'))}}</textarea>
                                                <span class="text-danger" id="value10_null"></span>
                                                <span class="text-danger" id="value10_pattern"></span>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('samples_being_exported'))
												<span class="text-danger">{{ $errors->first('samples_being_exported') }}</span>
											@endif
                                            <span class="text-danger" id="value10"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exported_number" class="form-label mt-2"><strong>(v) Details of Quantity of samples to be exported</strong></label>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Total number of samples<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="exported_number" name="exported_number" value="{{isset($export_data->exported_number)? $export_data->exported_number:(old('exported_number'))}}">
                                                @if($errors->has('exported_number'))
												   <span class="text-danger">{{ $errors->first('exported_number') }}</span>
												@endif
                                                <span class="text-danger" id="value11"></span>
                                                <span class="text-danger" id="value11_pattern"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <label for="" class="form-label text-center">Volume of each sample<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="vol_of_sample_text" name="vol_of_sample_text" value="{{isset($export_data->vol_of_sample_text)? $export_data->vol_of_sample_text:(old('vol_of_sample_text'))}}">
                                                    {{-- <input type="text" class="form-control" id="vol_of_sample_text" name="vol_of_sample_text" value=""> --}}
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{-- <select class="form-control" data-toggle="select2" name="exported_volume"> --}}
                                                            <select class="form-control" data-toggle="select" name="exported_volume" id="exported_volume">
                                                        <option value="">Select</option>
                                                        @php
                                                    foreach($samples_exported_volume_options as $value6){
                                                      @endphp
                                                      <option value="{{$value6->value}}" {{(!empty($export_data->exported_volume) && $export_data->exported_volume == $value6->value)? 'selected':''}}@if (old('exported_volume') == $value6->value) selected="selected" @endif>{{$value6->name}}</option>
                                                      @php
                                                    }
                                                    @endphp

                                                        </select>
                                                    <span class="text-danger" id="value12"></span>
                                                        {{-- <input type="text" class="form-control" id="exported_volume" name="exported_volume" placeholder="Volume" maxlength="10" onkeypress="return isAlfa(event)"> --}}
                                                    </div>
                                                </div>
                                                @if($errors->has('exported_volume'))
                                                            <span class="text-danger">{{ $errors->first('exported_volume') }}</span>
                                                            @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="repeat_samples_envisaged" class="form-label mt-2"><strong>(vi) Whether repeat export of samples is envisaged?</strong><span class="text-danger">*</span></label>
                                            <div class="form-group mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged_yes_no" id="repeat_export_yes" value="Yes" {{((!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes') || (old('repeat_samples_envisaged_yes_no') == 'Yes'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes <span class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="repeat_samples_envisaged" class="form-label mt-2 wirteRepeat_export" style="{{((!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes') || (old('repeat_samples_envisaged_yes_no') == 'Yes'))? '':'display:none'}}"><strong></strong></label>
                                                    <textarea name="repeat_samples_envisaged" class="wirteRepeat_export" id="wirteRepeat_export" maxlength="100" cols="60" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes') || (old('repeat_samples_envisaged_yes_no') == 'Yes'))? '':'display:none'}}">{{isset($export_data->repeat_samples_envisaged)? $export_data->repeat_samples_envisaged:(old('repeat_samples_envisaged'))}}</textarea>
                                                    <span class="text-danger" id="value13_null"></span>
                                                    <span class="text-danger" id="value13_pattern"></span>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged_yes_no" id="repeat_export_no" value="No" {{((!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'No') || (old('repeat_samples_envisaged_yes_no') == 'No'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>

                                </div>
                                @if($errors->has('repeat_samples_envisaged_yes_no'))
										 <span class="text-danger">{{ $errors->first('repeat_samples_envisaged_yes_no') }}</span>
									@endif
                                    <span class="text-danger" id="value13"></span>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="specify_purpose_end_use" class="form-label"><strong>(i) Specify purpose/ end use</strong><span class="text-danger">*</span></label>
                                        <select class="form-control" data-placeholder="Select..." name="specify_purpose_end_use" id="specify_purpose_end_use_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($purpose_of_end_use_options as $value3){
                                              @endphp
                                              <option value="{{$value3->value}}" {{(!empty($export_data->specify_purpose_end_use) && $export_data->specify_purpose_end_use == $value3->value)? 'selected':''}}@if (old('specify_purpose_end_use') == $value3->value) selected="selected" @endif>{{$value3->value}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('specify_purpose_end_use'))
                                        <span class="text-danger">{{ $errors->first('specify_purpose_end_use') }}</span>
                                   @endif
                                   <span class="text-danger" id="value14"></span>

                                        <!-- <br><input type="button" id="specify_purpose_end_use_button" value="Please Click to Select     "></button>
                                        <ul id="specify_purpose_end_use_display" style="display:none">
                                            {{-- @php
                                            foreach($purpose_of_end_use_options as $value3){
                                              @endphp
                                              @if($value3->value == 'Others')
                                              <li><input type="checkbox" value="{{$value3->value}}" class="specify_purpose_end_user_class" name="specify_purpose_end_use[]" id="specify_purpose_end_use_id_others">  {{$value3->name}}</li>
                                              @else
                                              <li><input type="checkbox" value="{{$value3->value}}" class="specify_purpose_end_user_class" name="specify_purpose_end_use[]">  {{$value3->name}}</li>
                                              @endif
                                              @php
                                            }
                                            @endphp --}}
                                            </li>
                                        </ul> -->

                                        <textarea name="specify_purpose_end_use_details" id="specifyText_end_use" maxlength="100" cols="72" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->specify_purpose_end_use) && $export_data->specify_purpose_end_use == 'Others') || (old('specify_purpose_end_use') == 'Others'))? '':'display:none'}}">{{isset($export_data->specify_purpose_end_use_details)? $export_data->specify_purpose_end_use_details:(old('specify_purpose_end_use_details'))}}</textarea>
                                        <span class="text-danger" id="value14_pattern"></span>
                                        <span class="text-danger" id="value14_pattern"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="samples_used_research_analysis mt-1" class="form-label"><strong>(ii) Whether the samples will be used for any research analysis?</strong><span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis_yes_no" id="research_analysis_yes" value="Yes" {{((!empty($export_data->samples_used_research_analysis_yes_no) && $export_data->samples_used_research_analysis_yes_no == 'Yes') || (old('samples_used_research_analysis_yes_no') == 'Yes'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis_yes_no" id="research_analysis_no" value="No" {{((!empty($export_data->samples_used_research_analysis_yes_no) && $export_data->samples_used_research_analysis_yes_no == 'No') || (old('samples_used_research_analysis_yes_no') == 'No'))? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>

                                        </div>
                                        @if($errors->has('samples_used_research_analysis_yes_no'))
                                        <span class="text-danger">{{ $errors->first('samples_used_research_analysis_yes_no') }}</span>
                                    @endif
                                    <span class="text-danger" id="value15"></span>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select class="form-control research_analysisSelect mb-2" data-placeholder="Select..." name="samples_used_research_analysis" id="research_analysisSelect" style="{{((!empty($export_data->samples_used_research_analysis_yes_no) && $export_data->samples_used_research_analysis_yes_no == 'Yes') || (old('samples_used_research_analysis_yes_no') == 'Yes'))? '':'display:none;'}}">
                                                    <option  value="">Please Select</option>
                                                    @php
                                                    foreach($weather_sample_used_research_analysis_options as $value4){
                                                      @endphp
                                                      <option value="{{$value4->value}}" {{(!empty($export_data->samples_used_research_analysis) && $export_data->samples_used_research_analysis == $value4->value)? 'selected':''}}@if (old('samples_used_research_analysis') == $value4->value) selected="selected" @endif>{{$value4->value}}</option>
                                                      @php
                                                    }
                                                    @endphp
                                                </select>

                                                <textarea class="mb-2" name="samples_used_research_analysis_details" id="wirteSamplesAnalysis" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->samples_used_research_analysis)) && ($export_data->samples_used_research_analysis == 'Others') || (old('samples_used_research_analysis') == 'Others')) ? '':'display:none'}}">{{isset($export_data->samples_used_research_analysis_details)? $export_data->samples_used_research_analysis_details:(old('samples_used_research_analysis_details'))}}</textarea>
                                                @if($errors->has('samples_used_research_analysis_details'))
													 <span class="text-danger">{{ $errors->first('samples_used_research_analysis_details') }}</span>
												@endif
                                                <span class="text-danger" id="value15_select_null"></span>
                                                <span class="text-danger" id="value15_select_pattern"></span>

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
                                        <label for="leftover_samples_store" class="form-label"><strong>(i) Will leftover samples be stored?</strong><span class="text-danger">*</span></label>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store_yes_no" id="leftoverSample_yes" value="Yes" {{((!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes') || (old('leftover_samples_store_yes_no') == 'Yes'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="leftover_samples_store" class="form-label wirtetextleftover" style="{{((!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes') || (old('leftover_samples_store_yes_no') == 'Yes'))? '':'display:none'}}"><strong>Provide details</strong></label>
                                                        <textarea name="leftover_samples_store" class="wirtetextleftover" id="wirtetextleftover" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes') || (old('leftover_samples_store_yes_no') == 'Yes'))? '':'display:none'}}">{{isset($export_data->leftover_samples_store)? $export_data->leftover_samples_store:(old('leftover_samples_store'))}}</textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store_yes_no" id="leftoverSample_no" value="No" {{((!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'No') || (old('leftover_samples_store_yes_no') == 'No'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('leftover_samples_store_yes_no'))
													 <span class="text-danger">{{ $errors->first('leftover_samples_store_yes_no') }}</span>
												@endif
                                                <span class="text-danger" id="value17"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                     <label for="purpose_sample_store" class="form-label"><strong>(ii) Purpose of samples storage</strong><span class="text-danger">*</span></label>
                                     <select class="form-control" data-placeholder="Select..." name="purpose_sample_store" id="purpose_sample_store_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($purpose_of_sample_storage_options as $value5){
                                              @endphp
                                              <option value="{{$value5->value}}" {{((!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == $value5->value) || old('purpose_sample_store'))? 'selected':''}}>{{$value5->value}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('purpose_sample_store'))
											<span class="text-danger">{{ $errors->first('purpose_sample_store') }}</span>
										@endif
                                        <span class="text-danger" id="value18"></span>

                                     <!-- <br><input type="button" id="purpose_sample_store_button" value="      Please Click to Select     "></button>
                                        <ul id="purpose_sample_store_display" style="display:none">
                                            @php
                                            foreach($purpose_of_sample_storage_options as $value5){
                                              @endphp
                                              @if($value5->value == 'Further analysis')
                                              <li><input type="checkbox" value="{{$value5->value}}" name="purpose_sample_store[]" id="purpose_sample_store_id_others">  {{$value5->name}}</li>
                                              @else
                                              <li><input type="checkbox" value="{{$value5->value}}" name="purpose_sample_store[]">  {{$value5->name}}</li>
                                              @endif
                                              @php
                                            }
                                            @endphp
                                            </li>
                                        </ul> -->

                                            <label for="purpose_sample_store" class="form-label wirteotherFurther" style="{{((!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == 'Further analysis') || old('purpose_sample_store') == 'Further analysis')? '':'display:none;'}}"><strong>Provide details</strong></label><br>
                                           <textarea name="purpose_sample_store_details" id="wirteotherFurther" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Please specify genetic analysis or any other analysis." style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == 'Further analysis') || old('purpose_sample_store') == 'Further analysis')? '':'display:none;'}}">{{isset($export_data->purpose_sample_store_details)? $export_data->purpose_sample_store_details:(old('purpose_sample_store_details'))}}</textarea>
                                           <span class="text-danger" id="value181"></span>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="duration_sample_store" class="form-label"><strong>(iii) Duration of the samples storage</strong><span class="text-danger">*</span></label>

                                        <input type="text" value="{{isset($export_data->duration_sample_store)? $export_data->duration_sample_store:(old('duration_sample_store'))}}" name="duration_sample_store" id="duration_sample_store" class="form-control mt-2" placeholder="">
                                        @if($errors->has('duration_sample_store'))
										<span class="text-danger">{{ $errors->first('duration_sample_store') }}</span>
									@endif
                                    <span class="text-danger" id="value19"></span>
                                    <span class="text-danger" id="value19_pattern"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="facility_sample_store" class="form-label"><strong>(iv) Facility where samples will be stored</strong><span class="text-danger">*</span></label>
                                        <input type="text" value="{{isset($export_data->facility_sample_store)? $export_data->facility_sample_store:(old('facility_sample_store'))}}" name="facility_sample_store" id="facility_sample_store" class="form-control mt-2" placeholder="">
                                        @if($errors->has('facility_sample_store'))
                                            <span class="text-danger">{{ $errors->first('facility_sample_store') }}</span>
                                        @endif
                                        <span class="text-danger" id="value20"></span>
                                        <span class="text-danger" id="value20_pattern"></span>
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
                                        <label for="national_security_angle" class="form-label"><strong>(i) Whether the company/institution/department where the material is being exported has any adverse reporting or has figured adversely from a national security angle?</strong><span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="national_security_angle_yes_no" id="nationalSecurity_yes" value="Yes" {{((!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes') || (old('national_security_angle_yes_no') == 'Yes'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="national_security_angle" class="form-label textNationalSecurity" style="{{((!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes') || (old('national_security_angle_yes_no') == 'Yes'))? '':'display:none'}}"><strong>Provide details</strong><span class="text-danger">*</span></label>
                                                        <textarea name="national_security_angle" class="textNationalSecurity" id="textNationalSecurity" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes') || (old('national_security_angle_yes_no') == 'Yes'))? '':'display:none'}}">{{isset($export_data->national_security_angle)? $export_data->national_security_angle:(old('national_security_angle'))}}</textarea>
                                                        <span class="text-danger" id="value21_null"></span>
                                                        <span class="text-danger" id="value21_pattern"></span>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="national_security_angle_yes_no" id="nationalSecurity_no" value="No" {{((!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'No') || (old('national_security_angle_yes_no') == 'No'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('national_security_angle_yes_no'))
												<span class="text-danger">{{ $errors->first('national_security_angle_yes_no') }}</span>
											@endif
                                            <span class="text-danger" id="value21"></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="foreign_country_army_military" class="form-label"><strong>(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?</strong><span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military_yes_no" id="armyMilitary_yes" value="Yes" {{((!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes') || (old('foreign_country_army_military_yes_no') == 'Yes'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foreign_country_army_military" class="form-label armyMilitaryText" style="{{((!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes') || (old('foreign_country_army_military_yes_no') == 'Yes'))? '':'display:none'}}"><strong>Provide details</strong><span class="text-danger">*</span></label>
                                                        <textarea name="foreign_country_army_military" class="armyMilitaryText" id="armyMilitaryText" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{((!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes') || (old('foreign_country_army_military_yes_no') == 'Yes'))? '':'display:none'}}">{{isset($export_data->foreign_country_army_military)? $export_data->foreign_country_army_military:(old('foreign_country_army_military'))}}</textarea>
                                                        <span class="text-danger" id="value22_null"></span>
                                                        <span class="text-danger" id="value22_pattern"></span>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military_yes_no" id="armyMilitary_no" value="No" {{((!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'No') || (old('foreign_country_army_military_yes_no') == 'No'))? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('foreign_country_army_military_yes_no'))
													<span class="text-danger">{{ $errors->first('foreign_country_army_military_yes_no') }}</span>
												@endif
                                                <span class="text-danger" id="value22"></span>
                                </div>
                            </div>
                            <div class="row">
                                <label for="biomaterial_micro_organisms_approval" class="form-label mt-2"><strong>(iii) If the Biomaterial contains micro-organisms listed in appendix 3 category 2 of list of SCOMET items, has approval been obtained from DGFT?</strong><span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_yes" value="Yes" {{((!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes') || (old('biomaterial_micro_organisms_approval') == 'Yes'))? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        @if(!empty($export_data->biomaterial_micro_organisms_approval_file))
                                        <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/media/exporter/'.$export_data->biomaterial_micro_organisms_approval_file.'key'.Session::get('key')) }}" target="_blank"><label class="form-lable" style="{{(($export_data->biomaterial_micro_organisms_approval_file != '') || (old('biomaterial_micro_organisms_approval') == 'Yes'))? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        <input type="hidden" name="biomaterial_micro_organisms_approval_file" id="biomaterial_micro_organisms_approval_file_draft" value="{{$export_data->upload_comp_institute_denied_export}}">
                                                        @endif
                                                        <input type="hidden" name="biomaterial_micro_organisms_approval_file" id="biomaterial_micro_organisms_approval_file_draft" value="">
                                        <label for="upload_files" style="{{(!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes')? '':'display:none'}}"
                                                class="form-lable biomaterialText"><span class="d-inline-block biomaterialText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 2MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        {{-- <label class="justify-center biomaterialText form-label" style="display: none;">Upload  relevant documents if any (Size: 5MB)</label><br/> --}}
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="biomaterial_micro_organisms_approval_file" class="form-control biomaterialText" id="biomaterialText" style="{{((!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes')) || old('biomaterial_micro_organisms_approval') == 'Yes'? '':'display:none'}}">
                                            <span class="text-danger" id="value28"></span>
                                        </div>
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_no" value="No" {{((!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'No') || (old('biomaterial_micro_organisms_approval') == 'No'))? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                    @if($errors->has('biomaterial_micro_organisms_approval'))
										<span class="text-danger">{{ $errors->first('biomaterial_micro_organisms_approval') }}</span>
									@endif
                                    <span class="text-danger" id="value23"></span>
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
                                <label for="ibsc_rcgm_approval_applicable" class="form-label"><strong>(i) For the export of hazardous micro organisms/genetically engineered organisms or cells has IBSC/RCGM approval been obtained?</strong><span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_yes" value="Yes" {{((!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes') || (old('ibsc_rcgm_approval_applicable') == 'Yes'))? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        @if(!empty($export_data->ibsc_rcgm_approval_applicable_file))
                                        <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/media/exporter/'.$export_data->ibsc_rcgm_approval_applicable_file.'key'.Session::get('key')) }}" target="_blank"><label class="form-lable" style="{{($export_data->ibsc_rcgm_approval_applicable_file != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>

<input type="hidden" name="ibsc_rcgm_approval_applicable_file" id="ibsc_rcgm_approval_applicable_file_draft" value="{{$export_data->ibsc_rcgm_approval_applicable_file}}">
                                                        @endif

<input type="hidden" name="ibsc_rcgm_approval_applicable_file" id="ibsc_rcgm_approval_applicable_file_draft" value="">
                                        <label for="upload_files" name="ibsc_rcgm_approval_applicable" id="ibscRcgmText_file_lable" style="{{((!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes') || (old('ibsc_rcgm_approval_applicable') == 'Yes'))? '':'display:none'}}"
                                                class="form-lable ibscRcgmText"><span class="d-inline-block ibscRcgmText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 2MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="ibsc_rcgm_approval_applicable_file" class="form-control ibscRcgmText" id="ibscRcgmText_file" style="{{((!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes') || (old('ibsc_rcgm_approval_applicable') == 'Yes'))? '':'display:none'}}">
                                        <span class="text-danger" id="value29"></span>
                                        </div>
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgmText" value="No" {{((!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'No') || (old('ibsc_rcgm_approval_applicable') == 'No'))? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                    @if($errors->has('ibsc_rcgm_approval_applicable'))
                                    <span class="text-danger">{{ $errors->first('ibsc_rcgm_approval_applicable') }}</span>
                               @endif
                               <span class="text-danger" id="value24"></span>
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
                                    <div class="form-check">

                                        {{-- <label class="form-check-label form-label" for="invalidCheck">Agree to terms
                                            and conditions</label> --}}
                                            <label class="m-2 form-check-label" for="invalidCheck">
                                                <input type="checkbox" class="form-check-input decleration_check" name="icertify" id="decleration_check" style="width:20px; height:20px; border: 1px solid #022759;" {{ old('icertify') ? 'checked' : '' }}>

                                                <span class="text-danger">*</span> I certify that the information provided in this request form is true and
                                                correct to the best of my knowledge, and I hereby declare that the samples
                                                referred to herein will be utilized for the purpose of <br>&nbsp;
                                                @if($errors->has('icertify'))
                                                <span class="text-danger">{{ $errors->first('icertify') }}</span>
                                              @endif
                                              <span class="text-danger" id="value25"></span>
                                                <input class="form-control costum1" type="text" value="{{(!empty($export_data->sender_certify_information_provided)?$export_data->sender_certify_information_provided:'')}}{{(old('specify_purpose_end_use') == 'Others')?old('specify_purpose_end_use_details'):old('specify_purpose_end_use')}}" readonly id="declaration_of_purpose" name="sender_certify_information_provided"><span>only, the samples will not be used for any other purposes.</span> </label>

                                    </div>

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
                                    <p class="text-black justify-content-between border-bottom mt-3 m-2"> <label class="form-check-label" for="invalidCheck">
                                         <input type="checkbox" class="form-check-input " name="certifythat" id="commercial_check" style="width:20px; height:20px; border: 1px solid #022759" {{ old('icertify') ? 'checked' : '' }}>

                                         <span class="text-danger">*</span> Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply FEMA regulations and other guidelines issued by
                                        RBI regarding foreign transactions.</label></p>
                                        @if($errors->has('certifythat'))
                                                <span class="text-danger">{{ $errors->first('certifythat') }}</span>
                                              @endif
                                              <span class="text-danger" id="value26"></span>
                                        <div class="row">
                                            {{-- <div class="col-md-7">
                                                <p class="p-2">(Authorized signatory on behalf of
                                                organization as per law of company)</p>
                                            </div> --}}
                                        <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                            @if(!empty($export_data->certified_copy_proforma))
                                        <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/media/exporter/'.$export_data->certified_copy_proforma.'key'.Session::get('key')) }}" target="_blank"><label class="form-lable" style="{{($export_data->certified_copy_proforma != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        <input type="hidden" name="certified_copy_proforma_draft" id="certified_copy_proforma_draft" value="{{$export_data->certified_copy_proforma}}">
                                                        @endif
                                                        <input type="hidden" name="certified_copy_proforma_draft" id="certified_copy_proforma_draft" value="">
                                                <label for="" class="form-label m-1"><strong>Upload Certified copy of commercial Contract/Proforma Invoice</strong></label>
                                                <input type="file" name="certified_copy_proforma" id="certified_copy_proforma" class="form-control">
                                                @if($errors->has('certified_copy_proforma'))
													<span class="text-danger">{{ $errors->first('certified_copy_proforma') }}</span>
											   @endif
                                               <span class="text-danger" id="value30"></span>
                                            </div>
                                        </div>
                                        </div>

                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_name" class="justify-center form-label"><strong>Name</strong></label>
                                                <input type="text" readonly value="{{ $ieccode->name }}" name="sender_name" id="sender_name" class="form-control mt-2 " placeholder="" onkeypress="return isAlfa(event)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_designation" class="justify-center form-label"><strong>Designation</strong></label>
                                                <input type="text" readonly value="{{ $ieccode->designation }}" name="sender_designation" id="sender_designation" class="form-control mt-2" placeholder="" onkeypress="return isAlfa(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_address" class="justify-center form-label"><strong>Address</strong></label>
                                                <input type="text" readonly value="{{ $ieccode->address }}" name="sender_address" id="sender_address" class="form-control mt-2" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-2 p-2">
                                                <label for="sender_date" class="justify-center form-label"><strong>Date</strong></label>
                                                <input type="text"  name="sender_date" id="sender_date" class="form-control mt-2" readonly value="<?php date_default_timezone_set('Asia/Calcutta');
                                                    echo date('d-m-Y H:i:s'); ?>">
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
                                            @if(!empty($export_data->declaration_letter))
                                        <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/media/exporter/'.$export_data->declaration_letter.'key'.Session::get('key')) }}" target="_blank"><label class="form-lable" style="{{($export_data->declaration_letter != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>

<input type="hidden" name="declaration_letter" id="declaration_letter_draft" value="{{$export_data->declaration_letter}}">
                                                        @endif

<input type="hidden" name="declaration_letter_draft" id="declaration_letter_draft" value="">
                                                <label for="" class="form-label m-1"><strong>Upload duly signed declaration of letter</strong></label>
                                                <input type="file" name="declaration_letter" id="declaration_letter" class="form-control">
                                                @if($errors->has('declaration_letter'))
													<span class="text-danger">{{ $errors->first('declaration_letter') }}</span>
											    @endif
                                                <span class="text-danger" id="value31"></span>
                                            </div>
                                            <p class="p-2" style="color:green"><b>Note:-</b> Please upload declaration of letter with authorized signature.</p>
                                        </div>
                                    <div class="col-md-7">
                                            <div class="upload-download mt-2">
                                                <label for="" class="form-label m-1"><strong>Format for declaration letter</strong></label><br>
                                                <a href="{{ url('imp-exp/exporter/viewDocument') }}/{{ \Illuminate\Support\Facades\Crypt::encrypt('public/assets/backend/images/exporter/declaration-by-recipient-of-samples.docx'.'key'.Session::get('key')) }}" class="download-letter-item" target="_blank"><button type="button" class="btn btn-primary mt-1">Download</button></a>
                                    </div>

                                </div>
                                </div>
                                    <div class="col-md-11 mb-5 m-2">
                                    <input type="hidden" value="{{ $ieccode->name }}" name="recipient_certify_samples_referred">
                                    <input type="hidden" value="" id="custody_of_value" name="recipient_name_institution">
                                    <input type="hidden" value=""  id="purpose_of_one" name="recipient_utilized_for_purpose">
@php
if(!empty($export_data->natural_biomaterial_exported)){
     if($export_data->natural_biomaterial_exported == 'Others'){
        $sampleDetails = $export_data->natural_biomaterial_exported_details;
     }else{
        $sampleDetails = $export_data->natural_biomaterial_exported;
     }
}else{
    $sampleDetails = '';
}
@endphp
                                        {{-- <p style="text-align:justify">This is to certify that the samples <strong><span id="sample_show_in_declaration_id">{{$sampleDetails}}</span></strong> referred to herein being sent to <strong>{{ $ieccode->name }}</strong>  (Name of Institution) for analyses/investigations will be in the
                                            custody of <strong><span id="custody_id">{{ (!empty($export_data->receving_recipient_name))? $export_data->receving_recipient_name:''}}</span></strong> and I hereby confirm that they will be utilized for the purpose of <strong><span id="purpose_of_one_id">{{(!empty($export_data->sender_certify_information_provided)?$export_data->sender_certify_information_provided:'')}}</span></strong>
                                            only, and I accept full responsibility and control over the usage of these samples and this sample will not be used for any other purposes.</p> --}}
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

                    <!-- ========= Alok code start ================================ -->

                    <div class="tab-pane show active" id="modal-multiple-preview">

                        <!-- Modal -->
                        <div id="multiple-one_two" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <h4 class="modal-title" id="multiple-oneModalLabel">Modal Heading</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <i class="ri-alert-line h1 text-warning"></i>
                                            <h4 class="mt-2" style="font-size: 25px;">Are you Sure ?</h4>
                                            <p class="mt-3 text-dark" style="font-size: 20px;">You want to submit the Application form.</p>
                                            <button type="submit" class="btn btn-primary" value="submit" name="submit" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal">Yes, Continue</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-target="#multiple-two" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
                                        <button type="button" class="btn btn-light btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div> --}}
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div> <!-- end preview-->
<!-- required fields alert model start  -->
                    <div class="tab-pane show active" id="modal-multiple-preview">

                        <!-- Modal -->
                        <div id="multiple-one_one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                     <div class="modal-header">
                                        <h4 class="modal-title" id="multiple-oneModalLabel"></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <i class="ri-alert-line h1 text-warning"></i>
                                            <p class="mt-3 text-dark" style="font-size: 20px;">Please fill all the mandetory fields before submit the form.</p>

                                        </div>
                                    </div>
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-light btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    </div> <!-- end preview-->
                    <!-- required fields alert model ends -->

                    <!-- ================================== Alok code end =================================== -->

                    {{-- </div> --}}
                    {{-- <div class="card"> --}}
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-3 m-2" name="submit" id="btnSubmit"
                                value="savedraft" style="font-size:17px">Save as Draft</button>

                                <button type="button" id="submit_id" class="btn btn-primary mt-3 m-2" data-bs-toggle="modal" data-bs-target="#multiple-one" style="font-size:17px">Submit</button>
                        </div>
                    {{-- </div> --}}
            </form>
        </section>
    </div>
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    //Natural biomaterical script
    $(document).ready(function(){
        $('#natural_biomaterial_exported_others').on('change', function() {
        var value = $('#natural_biomaterial_exported_others').val();
        if(value == 'Other body fluids' || value == 'Any Tissue/Cells' || value == 'Others'){
        $('#natural_biomaterial_exported_details').show();
        }else{
        $('#natural_biomaterial_exported_details').hide();
        $('#natural_biomaterial_exported_details').val('');
        }

       });
    });
        $(document).ready(function() {
            $('.sending_iec_number').on('change', function() {
                var sending_iec_number = $('#sending_iec_number').val();
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
           $.ajax({
               url: '{{ route('exp.hs_code') }}',
               type: 'get',
               data: {
                   hs_code: hs_code,
               },
               dataType: 'json',
               success: function(res) {
                   console.log(res);
                   $('#desc').val(res.desc);
               }
           });
       });
   });
</script>
<script>
    $(document).ready(function() {
       $('#receving_recipient_name').on('blur', function() {
           var reciving_party_name = $('#receving_recipient_name').val();
           $('#custody_of_value').val(reciving_party_name);
           $('#custody_id').text(reciving_party_name);

       });
   });
</script>
<script>
    $(document).ready(function() {
       $('#text_no').on('click', function() {
           $('#wirtetext_yes').val('');
       });

       $('#end_user_no').on('click', function() {
           $('#wirtetextEnd_user_yes').val('');
           $('#end_user_name').val('');
           $('#end_user_address').val('');
           $('.end_user_hide').hide();
       });

       $('#end_user_yes').on('click', function() {
        $('.end_user_hide').show();
           $('#end_user_name').show();
           $('#end_user_address').show();
       });

    //    $('#otherBodyFluids').on('click', function() {
    //        $('#TextotherBodyFluids').val('');
    //    });

       $('#samplesExported_no').on('click', function() {
           $('#TextsamplesExported').val('');
       });

       $('#repeat_export_no').on('click', function() {
           $('#wirteRepeat_export').val('');
       });

       $('#leftoverSample_no').on('click', function() {
           $('#wirtetextleftover').val('');
       });

       $('#nationalSecurity_no').on('click', function() {
           $('#textNationalSecurity').val('');
       });

       $('#armyMilitary_no').on('click', function() {
           $('#armyMilitaryText').val('');
       });

       $('#nature_of_biomaterial_button').on('click', function() {
           $('#nature_of_biomaterial_options_display').show();
       });

    //    $('#natural_biomaterial_exported_others').on('change', function() {
    //     if($('#natural_biomaterial_exported_others').is(":selected"))
    //     $('#natural_biomaterial_exported_details').show();
    //     else
    //     $('#natural_biomaterial_exported_details').hide();
    //     $('#natural_biomaterial_exported_details').val('');
    //    });

    //    $('#natural_biomaterial_exported_any_tissue_cell').on('change', function() {natural_biomaterial_exported_any_tissue_cell
    //     if($('#natural_biomaterial_exported_any_tissue_cell').is(":selected"))
    //     $('#natural_biomaterial_exported_any_tissue_details').show();
    //     else
    //     $('#natural_biomaterial_exported_any_tissue_details').hide();
    //     $('#natural_biomaterial_exported_any_tissue_details').val('');
    //    });



       $('#where_sample_collected_id_others').on('change', function() {
        var value = $('#where_sample_collected_id_others').val();
        if(value == 'Others')
        $('#TextSampleCollectedwhere').show();
        else
        $('#TextSampleCollectedwhere').hide();
        $('#TextSampleCollectedwhere').val('');
       });

       $('#specify_purpose_end_use_button').on('click', function() {
           $('#specify_purpose_end_use_display').show();
       });

       $('#specify_purpose_end_use_id_others').on('change', function() {
        var s_purpose = $('#specify_purpose_end_use_id_others').val();
        if(s_purpose == 'Others'){
        $('#specifyText_end_use').show();
        $('#declaration_of_purpose').val('');
        $('#purpose_of_one').val('');
        $('#purpose_of_one_id').text('');
        }else{
        $('#declaration_of_purpose').val(s_purpose);
        $('#purpose_of_one').val(s_purpose);
        $('#purpose_of_one_id').text(s_purpose);
        $('#specifyText_end_use').hide();
        $('#specifyText_end_use').val('');
        }
       });

       $('#specifyText_end_use').on('keyup', function() {
        var purpose_detail = $('#specifyText_end_use').val();
        $('#declaration_of_purpose').val(purpose_detail);
        $('#purpose_of_one').val(purpose_detail);
        $('#purpose_of_one_id').text(purpose_detail);
       });

       $('#research_analysis_yes').on('click', function() {
           $('.research_analysisSelect').show();
       });

       $('.research_analysisSelect').on('change', function() {
        var value = $('.research_analysisSelect').val();
        if(value == 'Others')
        $('#wirteSamplesAnalysis').show();
        else
        $('#wirteSamplesAnalysis').hide();
        $('#wirteSamplesAnalysis').val('');
        });


       $('#samples_used_research_analysis_id_others').on('change', function() {
        if($('#samples_used_research_analysis_id_others').is(":checked"))
        $('#wirteSamplesAnalysis').show();
        else
        $('#wirteSamplesAnalysis').hide();
        $('#wirteSamplesAnalysis').val('');
       });

       $('#purpose_sample_store_button').on('click', function() {
           $('#purpose_sample_store_display').show();
       });

       $('#purpose_sample_store_id_others').on('change', function() {
        var purpose_of_sample_storage = $('#purpose_sample_store_id_others').val();
        if(purpose_of_sample_storage == 'Further analysis')
        $('#wirteotherFurther').show();
        else
        $('#wirteotherFurther').hide();
        $('#wirteotherFurther').val('');
       });

       $('.specify_purpose_end_user_class').on('change', function() {
        var data = '';
       $("input[name='specify_purpose_end_use[]']:checked").each( function () {
         data += $(this).val()+', ';
        });
        $('#declaration_of_purpose').val(data);
        $('#purpose_of_one').val(data);
        $('#purpose_of_one_id').text(data);
        });

        $('.natural_biomaterial_exported').on('change', function() {
        var data = '';
       $("input[name='natural_biomaterial_exported[]']:checked").each( function () {
         data += $(this).val()+', ';
        });
        $('#sample_show_in_declaration_id').text(data);
        });



        $('#receving_recipient_name').on('blur', function() {
        var name = $('#receving_recipient_name').val();
        $('#custody_of_value').val(name);
       });




            $('#text_no').on('click', function (e) {
                let $el = $('#infileid');
                $el.wrap('<form>').closest(
                    'form').get(0).reset();
                $el.unwrap();
            });

            $('#biomaterial_no').on('click', function (e) {
                let $el = $('#biomaterialText');
                $el.wrap('<form>').closest(
                    'form').get(0).reset();
                $el.unwrap();
            });

            $('#ibscRcgmText').on('click', function (e) {
            $('#ibscRcgmText_file').hide();
            $('#ibscRcgmText_file_lable').hide();
                let $el = $('#ibscRcgmText_file');
                $el.wrap('<form>').closest(
                    'form').get(0).reset();
                $el.unwrap();
            });

            $('#ibscRcgm_yes').on('click', function (e) {
            $('#ibscRcgmText_file').show();
            $('#ibscRcgmText_file_lable').show();
            });

            //code for form validation start

            $('#submit_id').click(function () {
                //$('#multiple-one_two').modal('show');
                //$('#multiple-one').modal('hide');
                var value1 = $("input[name=denied_export_auth_last_3_years_yes_no]:checked").val();
                   if(value1 != undefined){
                if(value1 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value1_details = $("#wirtetext_yes").val();
                    if(value1_details == ''){
                        var value1_null = 0;
                    }else if(format.test(value1_details)){
                        var value1_pattern = 0;
                    }else{
                      var   value1_null = 1;
                       var  value1_pattern = 1;
                    }
                }else{
                       var value1_null = 1;
                      var  value1_pattern = 1;
                }
            }

                var value2 = $("#receving_recipient_name").val();

                if(value2 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value2)){
                        var value2_pattern = 0;
                    }else{
                       var  value2_pattern = 1;
                    }
                }

                var value3 = $("#receving_recipient_design").val();

                if(value3 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value3)){
                        var value3_pattern = 0;
                    }else{
                       var  value3_pattern = 1;
                    }
                }

                var value4 = $("#receiving_add_company_institute").val();

                if(value4 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value4)){
                        var value4_pattern = 0;
                    }else{
                       var  value4_pattern = 1;
                    }
                }

                var value5 = $("input[name=end_user_receiving_party_yes_no]:checked").val();

                if(value5 != undefined){
                if(value5 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value5_details = $("#wirtetextEnd_user_yes").val();
                    var end_user_name = $("#end_user_name").val();
                    var end_user_address = $("#end_user_address").val();
                    if(value5_details == '' || end_user_name == '' || end_user_address == ''){
                        var value5_null = 0;
                    }else if(format.test(value5_details) || format.test(end_user_name) || format.test(end_user_address)){
                        var value5_pattern = 0;
                    }else{
                      var   value5_null = 1;
                       var  value5_pattern = 1;
                    }
                }else{
                       var value5_null = 1;
                      var  value5_pattern = 1;
                }
            }

                var value7 = $("#hs_code").val();
                var value8 = $("#natural_biomaterial_exported_others").val();
                if(value8 == 'Others'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value8_details = $("#natural_biomaterial_exported_details").val();
                    if(value8_details == ''){
                        var value81 = 0;
                    }else if(format.test(value8_details)){
                        var value81_pattern = 0;
                    }else{
                        var value81 = 1;
                        var value81_pattern = 1;
                    }
                }else{
                    var value81 = 1;
                    var value81_pattern = 1;
                }
                var value9 = $("#where_sample_collected_id_others").val();
                if(value9 == 'Others'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value9_details = $("#TextSampleCollectedwhere").val();
                    if(value9_details == ''){
                        var value91 = 0;
                    }else if(format.test(value9_details)){
                        var value91_pattern = 0;
                    }else{
                        var value91 = 1;
                        var value91_pattern = 1;
                    }
                }else{
                    var value91 = 1;
                    var value91_pattern = 1;
                }
                var value10 = $("input[name=samples_being_exported]:checked").val();

                if(value10 != undefined){
                if(value10 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value10_details = $("#TextsamplesExported").val();
                    if(value10_details == ''){
                        var value10_null = 0;
                    }else if(format.test(value10_details)){
                        var value10_pattern = 0;
                    }else{
                      var   value10_null = 1;
                       var  value10_pattern = 1;
                    }
                }else{
                       var value10_null = 1;
                      var  value10_pattern = 1;
                }
            }

                var value11 = $("#exported_number").val();

                if(value11 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value11)){
                        var value11_pattern = 0;
                    }else{
                       var  value11_pattern = 1;
                    }
                }

                var value12 = $("#exported_volume").val();
                var value13 = $("input[name=repeat_samples_envisaged_yes_no]:checked").val();

                if(value13 != undefined){
                if(value13 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value13_details = $("#wirteRepeat_export").val();
                    if(value13_details == ''){
                        var value13_null = 0;
                    }else if(format.test(value13_details)){
                        var value13_pattern = 0;
                    }else{
                      var   value13_null = 1;
                       var  value13_pattern = 1;
                    }
                }else{
                       var value13_null = 1;
                      var  value13_pattern = 1;
                }
            }

                var value14 = $("#specify_purpose_end_use_id_others").val();
                if(value14 == 'Others'){
                    var value14_details = $("#specifyText_end_use").val();
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(value14_details == ''){
                        var value141 = 0;
                    }else if(format.test(value14_details)){
                        var value14_pattern = 0;
                    }else{
                        var value141 = 1;
                        var value14_pattern = 1;
                    }
                }else{
                    var value141 = 1;
                    var value14_pattern = 1;
                }
                var value15 = $("input[name=samples_used_research_analysis_yes_no]:checked").val();

                var value15_select_value = $('#research_analysisSelect').val();

                if(value15_select_value == 'Others'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value15_select_details = $("#wirteSamplesAnalysis").val();
                    if(value15_select_details == ''){
                        var value15_select_null = 0;
                    }else if(format.test(value15_select_details)){
                        var value15_select_pattern = 0;
                    }else{
                        var value15_select_null = 1;
                        var value15_select_pattern = 1;
                    }
                }else{
                    var value15_select_null = 1;
                    var value15_select_pattern = 1;
                }

                var value16 = $("input[name=samples_used_research_analysis_yes_no]:checked").val();
                var value17 = $("input[name=leftover_samples_store_yes_no]:checked").val();
                var value18 = $("#purpose_sample_store_id_others").val();
                if(value18 == 'Further analysis'){
                    var value18_details = $("#wirteotherFurther").val();
                    if(value18_details == ''){
                        var value181 = 0;
                    }else{
                        var value181 = 1;
                    }
                }else{
                    var value181 = 1;
                }

                var value19 = $("#duration_sample_store").val();

                if(value19 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value19)){
                        var value19_pattern = 0;
                    }else{
                       var  value19_pattern = 1;
                    }
                }

                var value20 = $("#facility_sample_store").val();

                if(value20 != ''){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    if(format.test(value20)){
                        var value20_pattern = 0;
                    }else{
                       var  value20_pattern = 1;
                    }
                }

                var value21 = $("input[name=national_security_angle_yes_no]:checked").val();

                if(value21 != undefined){
                if(value21 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value21_details = $("#textNationalSecurity").val();
                    if(value21_details == ''){
                        var value21_null = 0;
                    }else if(format.test(value21_details)){
                        var value21_pattern = 0;
                    }else{
                      var   value21_null = 1;
                       var  value21_pattern = 1;
                    }
                }else{
                       var value21_null = 1;
                      var  value21_pattern = 1;
                }
            }



                var value22 = $("input[name=foreign_country_army_military_yes_no]:checked").val();

                if(value22 != undefined){
                if(value22 == 'Yes'){
                    var format = /[!@#$%^&*+\=\[\]{};:"\\|<>\/?]+/;
                    var value22_details = $("#armyMilitaryText").val();
                    if(value22_details == ''){
                        var value22_null = 0;
                    }else if(format.test(value22_details)){
                        var value22_pattern = 0;
                    }else{
                      var   value22_null = 1;
                       var  value22_pattern = 1;
                    }
                }else{
                       var value22_null = 1;
                      var  value22_pattern = 1;
                }
            }

                var value23 = $("input[name=biomaterial_micro_organisms_approval]:checked").val();
                var value24 = $("input[name=ibsc_rcgm_approval_applicable]:checked").val();
                if($('#decleration_check').is(":checked")){
                    var value25 = 1;
                }else{
                    var value25 = 0;
                }

                if($("#commercial_check").is(":checked")){
                    var value26 = 1;
                }else{
                    var value26 = 0;
                }

                if($('#infileid')[0].files[0] == undefined){
                    var value27 = 1;
                //    var draft1 = $('#upload_comp_institute_denied_export_draft').val();
                //         if(draft1 == ''){
                //             var value27 = 0;
                //             }else{
                //              var value27 = 1;
                //             }
                }else{
                    if($('#infileid')[0].files[0].size < 2048){
                                var value27 = 1;
                        }else if($('#infileid')[0].files[0].type == 'application/pdf'){
                            var value27 = 1;
                        }else{
                                var value27 = 0;
                        }
                }

                if($('#biomaterialText')[0].files[0] == undefined){
                    var value28 = 1;
                //    var draft2 = $('#biomaterial_micro_organisms_approval_file_draft').val();
                //         if(draft2 == ''){
                //             var value28 = 0;
                //             }else{
                //              var value28 = 1;
                //             }
                }else{
                    if($('#biomaterialText')[0].files[0].size < 2048){
                                var value28 = 1;
                        }else if($('#biomaterialText')[0].files[0].type == 'application/pdf'){
                            var value28 = 1;
                        }else{
                                var value28 = 0;
                        }
                }

                if($('#ibscRcgmText_file')[0].files[0] == undefined){
                   var value29 = 1;
                //    var draft3 = $('#ibsc_rcgm_approval_applicable_file_draft').val();
                //         if(draft3 == ''){
                //             var value29 = 0;
                //             }else{
                //              var value29 = 1;
                //             }
                }else{
                    if($('#ibscRcgmText_file')[0].files[0].size < 2048){
                                var value29 = 1;
                        }else if($('#ibscRcgmText_file')[0].files[0].type == 'application/pdf'){
                            var value29 = 1;
                        }else{
                                var value29 = 0;
                        }
                }


                if($('#certified_copy_proforma')[0].files[0] == undefined){
                   var value30 = 0;
                   var draft4 = $('#certified_copy_proforma_draft').val();
                        if(draft4 == ''){
                            var value30 = 0;
                            }else{
                             var value30 = 1;
                            }
                }else{
                    if($('#certified_copy_proforma')[0].files[0].size < 2048){
                                var value30 = 1;
                        }else if($('#certified_copy_proforma')[0].files[0].type == 'application/pdf'){
                            var value30 = 1;
                        }else{
                                var value30 = 0;
                        }
                }

                if($('#declaration_letter')[0].files[0] == undefined){
                   var value31 = 0;
                   var draft5 = $('#declaration_letter_draft').val();
                        if(draft5 == ''){
                            var value31 = 0;
                            }else{
                             var value31 = 1;
                            }
                }else{
                        if($('#declaration_letter')[0].files[0].size < 2048){
                                var value31 = 1;
                        }else if($('#declaration_letter')[0].files[0].type == 'application/pdf'){
                            var value31 = 1;
                        }else{
                                var value31 = 0;
                        }
                }


                if(value1 == undefined || value2 == '' || value3 == '' || value4 == '' || value5 == undefined  || value7 == '' || value8 == '' || value9 == '' || value10 == undefined || value11 == '' || value12 == '' || value13 == undefined || value14 == '' || value15 == undefined || value16 == undefined || value17 == undefined || value18 == '' || value19 == '' || value20 == '' || value21 == undefined || value22 == undefined || value23 == undefined || value24 == undefined || value25 == '0' || value26 == '0' || value27 == '0' || value28 == '0' || value29 == '0' || value30 == '0' || value31 == '0' || value81 == '0' || value91 == '0' || value141 == '0' || value181 == '0' || value1_null == '0' || value1_pattern == '0' || value2_pattern == '0' || value3_pattern == '0'|| value4_pattern == '0' || value5_null == '0' || value5_pattern == '0' || value81_pattern == '0' || value91_pattern == '0' || value10_null == '0' || value10_pattern == '0' || value11_pattern == '0' || value13_null == '0' || value13_pattern == '0' || value14_pattern == '0' || value15_select_null == '0' || value15_select_pattern == '0' || value19_pattern == '0' || value20_pattern == '0' || value21_null == '0' || value21_pattern == '0' || value22_null == '0' || value22_pattern == '0'){

                    $('#multiple-one_one').modal('show');

                        if(value1 == undefined){
                            $('#value1').text('Please select any option');
                        }else{
                            $('#value1').text('');
                        }

                        if(value2 == ''){
                            $('#value2').text('Please fill the field');
                        }else{
                            $('#value2').text('');
                        }

                        if(value3 == ''){
                            $('#value3').text('Please fill the field');
                        }else{
                            $('#value3').text('');
                        }

                        if(value4 == ''){
                            $('#value4').text('Please fill the field');
                        }else{
                            $('#value4').text('');
                        }

                        if(value5 == undefined){
                            $('#value5').text('Please select any option');
                        }else{
                            $('#value5').text('');
                        }

                        if(value7 == ''){
                            $('#value7').text('Please fill the field');
                        }else{
                            $('#value7').text('');
                        }

                        if(value8 == ''){
                            $('#value8').text('Please fill the field');
                        }else{
                            $('#value8').text('');
                        }

                        if(value9 == ''){
                            $('#value9').text('Please select any option');
                        }else{
                            $('#value9').text('');
                        }

                        if(value10 == undefined){
                            $('#value10').text('Please select any option');
                        }else{
                            $('#value10').text('');
                        }

                        if(value11 == ''){
                            $('#value11').text('Please fill the field');
                        }else{
                            $('#value11').text('');
                        }

                        if(value12 == ''){
                            $('#value12').text('Please Select any option');
                        }else{
                            $('#value12').text('');
                        }

                        if(value13 == undefined){
                            $('#value13').text('Please select any option');
                        }else{
                            $('#value13').text('');
                        }

                        if(value14 == ''){
                            $('#value14').text('Please fill the field');
                        }else{
                            $('#value14').text('');
                        }

                        if(value15 == undefined){
                            $('#value15').text('Please select any option');
                        }else{
                            $('#value15').text('');
                        }

                        if(value16 == undefined){
                            $('#value16').text('Please select any option');
                        }else{
                            $('#value16').text('');
                        }

                        if(value17 == undefined){
                            $('#value17').text('Please select any option');
                        }else{
                            $('#value17').text('');
                        }

                        if(value18 == ''){
                            $('#value18').text('Please fill the field');
                        }else{
                            $('#value18').text('');
                        }

                        if(value19 == ''){
                            $('#value19').text('Please fill the field');
                        }else{
                            $('#value19').text('');
                        }

                        if(value20 == ''){
                            $('#value20').text('Please fill the field');
                        }else{
                            $('#value20').text('');
                        }

                        if(value21 == undefined){
                            $('#value21').text('Please select any option');
                        }else{
                            $('#value21').text('');
                        }

                        if(value22 == undefined){
                            $('#value22').text('Please select any option');
                        }else{
                            $('#value22').text('');
                        }

                        if(value23 == undefined){
                            $('#value23').text('Please select any option');
                        }else{
                            $('#value23').text('');
                        }

                        if(value24 == undefined){
                            $('#value24').text('Please select any option');
                        }else{
                            $('#value24').text('');
                        }

                        if(value25 == '0'){
                            $('#value25').text('Please accept Decleration');
                        }else{
                            $('#value25').text('');
                        }

                        if(value26 == '0'){
                            $('#value26').text('Please accept condition');
                        }else{
                            $('#value26').text('');
                        }

                        if(value27 == '0'){
                            $('#value27').text('Please choose pdf file of max size 2MB');
                        }else{
                            $('#value27').text('');
                        }

                        if(value28 == '0'){
                            $('#value28').text('Please choose pdf file of max size 2MB');
                        }else{
                            $('#value28').text('');
                        }

                        if(value29 == '0'){
                            $('#value29').text('Please choose pdf file of max size 2MB');
                        }else{
                            $('#value29').text('');
                        }

                        if(value30 == '0'){
                            $('#value30').text('Please choose pdf file of max size 2MB');
                        }else{
                            $('#value30').text('');
                        }

                        if(value31 == '0'){
                            $('#value31').text('Please choose pdf file of max size 2MB');
                        }else{
                            $('#value31').text('');
                        }

                        if(value81 == '0'){
                            $('#value81').text('Please provide details');
                        }else{
                            $('#value81').text('');
                        }

                        if(value91 == '0'){
                            $('#value91').text('Please provide details');
                        }else{
                            $('#value91').text('');
                        }

                        if(value141 == '0'){
                            $('#value141').text('Please provide details');
                        }else{
                            $('#value141').text('');
                        }

                        if(value181 == '0'){
                            $('#value181').text('Please provide details');
                        }else{
                            $('#value181').text('');
                        }

                        if(value1_null == '0'){
                            $('#value1_null').text('Please provide details');
                        }else{
                            $('#value1_null').text('');
                        }

                        if(value1_pattern == '0'){
                            $('#value1_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value1_pattern').text('');
                        }

                        if(value2_pattern == '0'){
                            $('#value2_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value2_pattern').text('');
                        }

                        if(value3_pattern == '0'){
                            $('#value3_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value3_pattern').text('');
                        }

                        if(value4_pattern == '0'){
                            $('#value4_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value4_pattern').text('');
                        }

                        if(value5_null == '0'){
                            $('#value5_null').text('Please fill related fields');
                        }else{
                            $('#value5_null').text('');
                        }

                        if(value5_pattern == '0'){
                            $('#value5_pattern').text('Please do not enter special characters in related fields');
                        }else{
                            $('#value5_pattern').text('');
                        }

                        if(value81_pattern == '0'){
                            $('#value81_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value81_pattern').text('');
                        }

                        if(value91_pattern == '0'){
                            $('#value91_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value91_pattern').text('');
                        }

                        if(value10_null == '0'){
                            $('#value10_null').text('Please provide details');
                        }else{
                            $('#value10_null').text('');
                        }

                        if(value10_pattern == '0'){
                            $('#value10_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value10_pattern').text('');
                        }

                        if(value11_pattern == '0'){
                            $('#value11_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value11_pattern').text('');
                        }

                        if(value13_null == '0'){
                            $('#value13_null').text('Please provide details');
                        }else{
                            $('#value13_null').text('');
                        }

                        if(value13_pattern == '0'){
                            $('#value13_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value13_pattern').text('');
                        }

                        if(value14_pattern == '0'){
                            $('#value14_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value14_pattern').text('');
                        }

                        if(value15_select_null == '0'){
                            $('#value15_select_null').text('Please provide details');
                        }else{
                            $('#value15_select_null').text('');
                        }

                        if(value15_select_pattern == '0'){
                            $('#value15_select_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value15_select_pattern').text('');
                        }

                        if(value19_pattern == '0'){
                            $('#value19_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value19_pattern').text('');
                        }

                        if(value20_pattern == '0'){
                            $('#value20_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value20_pattern').text('');
                        }

                        if(value21_null == '0'){
                            $('#value21_null').text('Please do not enter special characters');
                        }else{
                            $('#value21_null').text('');
                        }

                        if(value21_pattern == '0'){
                            $('#value21_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value21_pattern').text('');
                        }

                        if(value22_null == '0'){
                            $('#value22_null').text('Please do not enter special characters');
                        }else{
                            $('#value22_null').text('');
                        }

                        if(value22_pattern == '0'){
                            $('#value22_pattern').text('Please do not enter special characters');
                        }else{
                            $('#value22_pattern').text('');
                        }

                }else{
                    $('#multiple-one_two').modal('show');
                }

        });

   });
</script>

@endsection
