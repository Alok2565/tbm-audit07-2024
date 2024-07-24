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
                                        last 3 years?</strong></label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    name="denied_export_auth_last_3_years_yes_no" id="text_yes"
                                                    value="Yes" {{(!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes')? 'checked':''}}/>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" value="" type="radio"
                                                    name="denied_export_auth_last_3_years_yes_no" id="text_no"
                                                    value="No" {{(!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'No')? 'checked':''}}/>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group wirtetext_yes" style="{{(!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes')? '':'display: none;'}}">
                                        @if(!empty($export_data->upload_comp_institute_denied_export))
                                        <a href="{{ asset('media/exporter/'.$export_data->upload_comp_institute_denied_export) }}" target="_blank"><label class="form-lable" style="{{($export_data->upload_comp_institute_denied_export != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        @endif
                                        <label for="upload_files" name="upload_comp_institute_denied_export"
                                                class="form-lable"><span class="d-inline-block" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                            <input type="file" class="form-control"
                                                name="upload_comp_institute_denied_export" id="infileid">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                    <label for="comp_institute_denied_export_auth_last_3_years"
                                                class="form-lable wirtetext_yes" style="{{(!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes')? '':'display: none;'}}">Provide
                                                details</label>
                                        <div class="form-group">

                                            <textarea name="comp_institute_denied_export_auth_last_3_years" class="wirtetext_yes" id="wirtetext_yes"
                                                maxlength="100" cols="35" rows="2" max="100" placeholder="Add details"
                                                style="border:1px solid #ddd; padding:2px; border-radius: 5px !important; {{(!empty($export_data->denied_export_auth_last_3_years_yes_no) && $export_data->denied_export_auth_last_3_years_yes_no == 'Yes')? '':'display: none;'}}">{{(!empty($export_data->comp_institute_denied_export_auth_last_3_years))? $export_data->comp_institute_denied_export_auth_last_3_years:''}}</textarea>
                                        </div>
                                    </div>
                                    @if($errors->has('denied_export_auth_last_3_years_yes_no'))
										<span class="text-danger">{{ $errors->first('denied_export_auth_last_3_years_yes_no') }}</span>
								      @endif
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
                                                Recipient</strong></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_name" name="receving_recipient_name" value="{{isset($export_data->receving_recipient_name)? $export_data->receving_recipient_name:''}}">
                                            @if($errors->has('receving_recipient_name'))
												<span class="text-danger">{{ $errors->first('receving_recipient_name') }}</span>
											 @endif
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receving_recipient_design" class="form-label"><strong>(ii) Designation of Recipient
                                        </strong></label>
                                        <input type="text" class="form-control"
                                            id="receving_recipient_design" name="receving_recipient_design" value="{{isset($export_data->receving_recipient_design)? $export_data->receving_recipient_design:''}}">
                                            @if($errors->has('receving_recipient_design'))
												<span class="text-danger">{{ $errors->first('receving_recipient_design') }}</span>
											 @endif
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="receiving_add_company_institute" class="form-label"><strong>(iii)
                                                Address of the Company/Institution</strong></label>
                                        <input type="text" class="form-control"
                                            id="receiving_add_company_institute" name="receiving_add_company_institute" value="{{isset($export_data->receiving_add_company_institute)? $export_data->receiving_add_company_institute:''}}">
                                            @if($errors->has('receiving_add_company_institute'))
												<span class="text-danger">{{ $errors->first('receiving_add_company_institute') }}</span>
											 @endif
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
                                                        name="end_user_receiving_party_yes_no" id="end_user_yes"
                                                        value="Yes" {{(!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes &nbsp;<span
                                                            class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="end_user_receiving_party" value="" id="wirtetextEnd_user_yes" maxlength="100" cols="42"
                                                        rows="2" max="100" placeholder="Add details"
                                                        style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes')? '':'display:none;'}}">{{(!empty($export_data->end_user_receiving_party))? $export_data->end_user_receiving_party:''}}</textarea>
                                                </div>
                                                <div class="form-check custom-no">
                                                    <input class="form-check-input" type="radio"
                                                        name="end_user_receiving_party_yes_no" id="end_user_no"
                                                        value="No" {{(!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'No')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                                @if($errors->has('end_user_receiving_party_yes_no'))
													<span class="text-danger">{{ $errors->first('end_user_receiving_party_yes_no') }}</span>
												  @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3 end_user_hide" style="{{(!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes')? '':'display:none'}}">
                                        <label for="end_user_name" class="form-label"><strong>(ii) Name of the End
                                                user</strong></label>
                                        <input type="text" value="{{isset($export_data->end_user_name)? $export_data->end_user_name:''}}" class="form-control" id="end_user_name"
                                            name="end_user_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mt-3 end_user_hide" style="{{(!empty($export_data->end_user_receiving_party_yes_no) && $export_data->end_user_receiving_party_yes_no == 'Yes')? '':'display:none'}}">
                                        <label for="end_user_address" class="form-label"><strong>(iii) Address of the End
                                                user</strong></label>
                                        <input type="text" value="{{isset($export_data->end_user_address)? $export_data->end_user_address:''}}" class="form-control" id="end_user_address"
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
                                        <label for="" class="form-label"><strong>(i) Harmonized
                                                System (HS) Code of Item to be exported</strong></label>
                                                {{-- <input type="text" class="form-control hs_code" maxlength="8" id="hs_code"
                                                name="hs_code" value="{{isset($export_data->hs_code)? $export_data->hs_code:''}}"> --}}
                                                <select class="form-control hs_code" data-placeholder="Select..." name="hs_code" id="hs_code">
                                                    <option  value="">Please Select Code</option>
                                                    @php
                                                    foreach($hs_code as $hsCode_list){
                                                    @endphp
                                                    <option value="{{$hsCode_list->hs_code}}" {{(!empty($export_data->hs_code) && $export_data->hs_code == $hsCode_list->hs_code)? 'selected':''}}>{{$hsCode_list->hs_code}} &nbsp; {{$hsCode_list->desc}}</option>
                                                    @php
                                                    }
                                                    @endphp
                                                </select>
                                                @if($errors->has('hs_code'))
													<span class="text-danger">{{ $errors->first('hs_code') }}</span>
												  @endif

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="form-label"><strong>Description of HS Code</strong></label>
                                        <input type="text" class="form-control" name="hs_code_description" class="desc" id="desc" value="{{isset($export_data->hs_code_description)? $export_data->hs_code_description:''}}" readonly>
                                        @if($errors->has('hs_code_description'))
											<span class="text-danger">{{ $errors->first('hs_code_description') }}</span>
										@endif
                                    </div>
                                </div>

                                <!-- <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong></label>
                                        <select class="select2 form-control select2-multiple" data-toggle="select2"
                                            multiple="multiple" data-placeholder="Select..." name="natural_biomaterial_exported[]" id="natural_biomaterial_exported_id">
                                            <option  value="whole blood">Whole blood</option>
                                            <option  value="buffy coat">Buffy coat</option>
                                            <option  value="Serum">Serum</option>
                                            <option  value="plasma">Plasma</option>
                                            <option  value="urine">Urine</option>
                                            <option  value="nucleic acid">Nucleic acid</option>
                                            <option  value="extracted dna">Extracted DNA</option>
                                            <option  value="extracted rna">Extracted RNA</option>
                                            <option  value="other body fluids">Other body fluids</option>
                                            <option  value="Any Tissue/Cell">Any Tissue/Cells</option>

                                        </select>


                                         <textarea name="natural_biomaterial_exported_details" id="TextNaturalbiomateria_details1" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Add details"
                                            style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                                    </div>
                                </div> -->

                                <!--Pandey ji Code-->
                                {{-- <div class="col-md-4">
                                    <div class="form-group mt-3">
                                        <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong></label>
                                        <br><input type="button" id="nature_of_biomaterial_button" value="      Please Click to Select     "></button>
                                        <ul id="nature_of_biomaterial_options_display" style="{{(!empty($export_data->natural_biomaterial_exported))? '':'display:none;'}}">
                                        @php
                                        if(!empty($export_data->natural_biomaterial_exported)){
                                            $a = explode(",", $export_data->natural_biomaterial_exported);
                                        }else{
                                            $a = array();
                                        }

                                    @endphp
                                            @php
                                            foreach($nature_of_biomaterial_options as $value1){
                                              @endphp
                                              @if($value1->value == 'Other body fluids')
                                              <li><input type="checkbox" value="{{$value1->value}}" name="natural_biomaterial_exported[]" class="natural_biomaterial_exported" id="natural_biomaterial_exported_others" {{(in_array($value1->value, $a))? 'checked':''}}>  {{$value1->name}}</li>
                                              @elseif($value1->value == 'Any Tissue/Cells')
                                              <li><input type="checkbox" value="{{$value1->value}}" name="natural_biomaterial_exported[]" class="natural_biomaterial_exported" id="natural_biomaterial_exported_any_tissue_cell" {{(in_array($value1->value, $a))? 'checked':''}}> {{$value1->name}}</li>
                                              @else
                                              <li><input type="checkbox" value="{{$value1->value}}" name="natural_biomaterial_exported[]" class="natural_biomaterial_exported" {{(in_array($value1->value, $a))? 'checked':''}}>  {{$value1->name}}</li>
                                              @endif
                                              @php
                                            }
                                            @endphp
                                            </li>
                                        </ul>

                                         <textarea name="natural_biomaterial_exported_any_tissue_details" id="natural_biomaterial_exported_any_tissue_details" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Please Specify Any Tissue/Cell"
                                            style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array('Any Tissue/Cells', $a))? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_any_tissue_details))? $export_data->natural_biomaterial_exported_any_tissue_details:''}}</textarea><br>
                                            <textarea name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_details" class="mt-2" maxlength="100"
                                            cols="42" rows="2" max="100" placeholder="Please Specify Other body fluids"
                                            style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array('Other body fluids', $a))? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_details))? $export_data->natural_biomaterial_exported_details:''}}</textarea>
                                    </div>
                                </div> --}}
                                <div class="col-md-4">
                                    <div class="form-group">
                                            <label for="natural_biomaterial_exported" class="form-label"><strong>(ii) Nature of biomaterial to be exported</strong></label>
                                            <select class="form-control" data-placeholder="Select..." name="nature_of_biomaterial_options" id="natural_biomaterial_exported_others">
                                                <option  value="">Please Select</option>
                                                @php
                                                foreach($nature_of_biomaterial_options as $value2){
                                                @endphp
                                                <option value="{{$value2->value}}" {{(!empty($export_data->natural_biomaterial_exported_details) && $export_data->natural_biomaterial_exported_details == $value2->value)? 'selected':''}}>{{$value2->name}}</option>
                                                @php
                                                }
                                                @endphp
                                            </select>
                                            @if($errors->has('nature_of_biomaterial_options'))
                                                <span class="text-danger">{{ $errors->first('nature_of_biomaterial_options') }}</span>
                                            @endif
                                                <textarea class="mt-2" name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_any_tissue_details" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->natural_biomaterial_exported_any_tissue_details) && $export_data->natural_biomaterial_exported_any_tissue_details == 'Any Tissue/Cells')? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_any_tissue_details))? $export_data->natural_biomaterial_exported_any_tissue_details :''}}</textarea>
                                                <textarea class="mt-2" name="natural_biomaterial_exported_details" id="natural_biomaterial_exported_details" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->nature_of_biomaterial_options) && $export_data->natural_biomaterial_exported_details == 'Other body fluids')? '':'display:none'}}">{{(!empty($export_data->natural_biomaterial_exported_details))? $export_data->natural_biomaterial_exported_details :''}}</textarea>


                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        <label for="sample_collected" class="form-label"><strong>(iii) Where were the samples collected?</strong></label>
                                        <select class="form-control" data-placeholder="Select..." name="sample_collected" id="where_sample_collected_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($where_the_samples_collected_options as $value2){
                                              @endphp
                                              <option value="{{$value2->value}}" {{(!empty($export_data->sample_collected) && $export_data->sample_collected == $value2->value)? 'selected':''}}>{{$value2->name}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('sample_collected'))
												<span class="text-danger">{{ $errors->first('sample_collected') }}</span>
											@endif
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
                                            <textarea class="mt-2" name="sample_collected_details" id="TextSampleCollectedwhere" maxlength="100" cols="60" rows="2" max="100" placeholder="Please specify" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->sample_collected) && $export_data->sample_collected == 'Others')? '':'display:none'}}">{{(!empty($export_data->sample_collected_details))? $export_data->sample_collected_details :''}}</textarea>

                                        </div>

                                </div>

                                <div class="col-md-6">
                                    <label for="sample_collected" class="form-label mt-2"><strong>(iv) Has consent been taken from the individuals for the exact purpose for which the samples are being exported?</strong></label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        name="samples_being_exported" id="samplesExported_yes" value="Yes" {{(!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline custom-no">
                                                    <input class="form-check-input inline-block" type="radio" name="samples_being_exported" id="samplesExported_no" value="No" {{(!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'No')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="sample_collected" class="form-label mt-2 TextsamplesExported" style="{{(!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes')? '':'display:none'}}"><strong>Provide details</strong></label>
                                                <textarea name="samples_being_exported_details" class="TextsamplesExported" id="TextsamplesExported" maxlength="100" cols="60" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->samples_being_exported) && $export_data->samples_being_exported == 'Yes')? '':'display:none'}};">{{(!empty($export_data->samples_being_exported_details))? $export_data->samples_being_exported_details:''}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('samples_being_exported'))
												<span class="text-danger">{{ $errors->first('samples_being_exported') }}</span>
											@endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exported_number" class="form-label mt-2"><strong>(v) Details of Quantity of samples to be exported</strong></label>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="" class="form-label">Total number of samples</label>
                                                <input type="text" class="form-control" id="exported_number" name="exported_number" value="{{!empty($export_data->exported_number)? $export_data->exported_number:''}}">
                                                @if($errors->has('exported_number'))
												   <span class="text-danger">{{ $errors->first('exported_number') }}</span>
												@endif
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <label for="" class="form-label text-center">Volume of each sample</label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" id="vol_of_sample_text" name="vol_of_sample_text" value="{{!empty($export_data->vol_of_sample_text)? $export_data->vol_of_sample_text:''}}">
                                                    {{-- <input type="text" class="form-control" id="vol_of_sample_text" name="vol_of_sample_text" value=""> --}}
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{-- <select class="form-control" data-toggle="select2" name="exported_volume"> --}}
                                                            <select class="form-control" data-toggle="select" name="exported_volume">
                                                        <option value="">Select</option>
                                                        @php
                                                    foreach($samples_exported_volume_options as $value6){
                                                      @endphp
                                                      <option value="{{$value6->value}}" {{(!empty($export_data->exported_volume) && $export_data->exported_volume == $value6->value)? 'selected':''}}>{{$value6->name}}</option>
                                                      @php
                                                    }
                                                    @endphp

                                                        </select>

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
                                    <label for="repeat_samples_envisaged" class="form-label mt-2"><strong>(vi) Whether repeat export of samples is envisaged?</strong></label>
                                            <div class="form-group mt-2">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged_yes_no" id="repeat_export_yes" value="Yes" {{(!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes <span class="text-muted">(If yes, provide details)</span></label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="repeat_samples_envisaged" class="form-label mt-2 wirteRepeat_export" style="{{(!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes')? '':'display:none'}}"><strong></strong></label>
                                                    <textarea name="repeat_samples_envisaged" class="wirteRepeat_export" id="wirteRepeat_export" maxlength="100" cols="60" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'Yes')? '':'display:none'}}">{{(!empty($export_data->repeat_samples_envisaged))? $export_data->repeat_samples_envisaged:''}}</textarea>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="repeat_samples_envisaged_yes_no" id="repeat_export_no" value="No" {{(!empty($export_data->repeat_samples_envisaged_yes_no) && $export_data->repeat_samples_envisaged_yes_no == 'No')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>

                                </div>
                                @if($errors->has('repeat_samples_envisaged_yes_no'))
										 <span class="text-danger">{{ $errors->first('repeat_samples_envisaged_yes_no') }}</span>
									@endif
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
                                        <label for="specify_purpose_end_use" class="form-label"><strong>(i) Specify purpose/ end use</strong></label>
                                        <select class="form-control" data-placeholder="Select..." name="specify_purpose_end_use" id="specify_purpose_end_use_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($purpose_of_end_use_options as $value3){
                                              @endphp
                                              <option value="{{$value3->value}}" {{(!empty($export_data->specify_purpose_end_use) && $export_data->specify_purpose_end_use == $value3->value)? 'selected':''}}>{{$value3->value}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('specify_purpose_end_use'))
                                        <span class="text-danger">{{ $errors->first('specify_purpose_end_use') }}</span>
                                   @endif

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

                                        <textarea name="specify_purpose_end_use_details" id="specifyText_end_use" maxlength="100" cols="72" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->specify_purpose_end_use) && $export_data->specify_purpose_end_use == 'Others')? '':'display:none'}}">{{(!empty($export_data->specify_purpose_end_use_details))? $export_data->specify_purpose_end_use_details:''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="samples_used_research_analysis mt-1" class="form-label"><strong>(ii) Whether the samples will be used for any research analysis?</strong></label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis_yes_no" id="research_analysis_yes" value="Yes" {{(!empty($export_data->samples_used_research_analysis_yes_no) && $export_data->samples_used_research_analysis_yes_no == 'Yes')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="samples_used_research_analysis_yes_no" id="research_analysis_no" value="No" {{(!empty($export_data->samples_used_research_analysis_yes_no) && $export_data->samples_used_research_analysis_yes_no == 'No')? 'checked':''}}/>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            </div>

                                        </div>
                                        @if($errors->has('samples_used_research_analysis_yes_no'))
                                        <span class="text-danger">{{ $errors->first('samples_used_research_analysis_yes_no') }}</span>
                                    @endif
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select class="form-control research_analysisSelect mb-2" data-placeholder="Select..." name="purpose_sample_store" id="research_analysisSelect" style="display:none;">
                                                    <option  value="">Please Select</option>
                                                    @php
                                                    foreach($weather_sample_used_research_analysis_options as $value4){
                                                      @endphp
                                                      <option value="{{$value4->value}}" {{(!empty($export_data->weather_sample_used_research_analysis_options) && $export_data->weather_sample_used_research_analysis_options == $value5->value)? 'selected':''}}>{{$value4->value}}</option>
                                                      @php
                                                    }
                                                    @endphp
                                                </select>

                                                <textarea class="mb-2" name="samples_used_research_analysis_details" id="wirteSamplesAnalysis" maxlength="100" cols="55" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->weather_sample_used_research_analysis_options) && $export_data->weather_sample_used_research_analysis_options == 'Others')? '':'display:none'}}">{{(!empty($export_data->samples_used_research_analysis_details))? $export_data->samples_used_research_analysis_details:''}}</textarea>


                                                {{-- <textarea name="samples_used_research_analysis_details" id="wirteSamplesAnalysis" maxlength="100" cols="40" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array('Others', $b))? '':'display:none'}}">{{(!empty($export_data->samples_used_research_analysis_details))? $export_data->samples_used_research_analysis_details:''}}</textarea>  --}}

                                                {{-- Pandey Ji Code --}}
                                            {{-- <ul id="research_analysisSelect" style="{{(!empty($export_data->samples_used_research_analysis))? '':'display:none'}}">
                                            <li><input type="button" value="      Please Select     "></button></li>
                                            @php
                                            if(!empty($export_data->samples_used_research_analysis)){
                                            $b = explode(",", $export_data->samples_used_research_analysis);
                                        }else{
                                            $b = array();
                                        }

                                            foreach($weather_sample_used_research_analysis_options as $value4){
                                              @endphp
                                              @if($value4->value == 'Others')
                                              <li><input type="checkbox" value="{{$value4->value}}" name="samples_used_research_analysis[]" id="samples_used_research_analysis_id_others" {{(in_array($value4->value, $b))? 'checked':''}}>  {{$value4->name}}</li>
                                              @else
                                              <li><input type="checkbox" value="{{$value4->value}}" name="samples_used_research_analysis[]" {{(in_array($value4->value, $b))? 'checked':''}}>  {{$value4->name}}</li>
                                              @endif
                                              @php
                                            }
                                            @endphp
                                            </li>
                                        </ul> --}}
                                                {{-- <textarea name="samples_used_research_analysis_details" id="wirteSamplesAnalysis" maxlength="100" cols="40" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(in_array('Others', $b))? '':'display:none'}}">{{(!empty($export_data->samples_used_research_analysis_details))? $export_data->samples_used_research_analysis_details:''}}</textarea> --}}
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
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store_yes_no" id="leftoverSample_yes" value="Yes" {{(!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="leftover_samples_store" class="form-label wirtetextleftover" style="{{(!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes')? '':'display:none'}}"><strong>Provide details</strong></label>
                                                        <textarea name="leftover_samples_store" class="wirtetextleftover" id="wirtetextleftover" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'Yes')? '':'display:none'}}">{{(!empty($export_data->leftover_samples_store))? $export_data->leftover_samples_store:''}}</textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="leftover_samples_store_yes_no" id="leftoverSample_no" value="No" {{(!empty($export_data->leftover_samples_store_yes_no) && $export_data->leftover_samples_store_yes_no == 'No')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('leftover_samples_store_yes_no'))
													 <span class="text-danger">{{ $errors->first('leftover_samples_store_yes_no') }}</span>
												@endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                     <label for="purpose_sample_store" class="form-label"><strong>(ii) Purpose of samples storage</strong></label>
                                     <select class="form-control" data-placeholder="Select..." name="purpose_sample_store" id="purpose_sample_store_id_others">
                                            <option  value="">Please Select</option>
                                            @php
                                            foreach($purpose_of_sample_storage_options as $value5){
                                              @endphp
                                              <option value="{{$value5->value}}" {{(!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == $value5->value)? 'selected':''}}>{{$value5->value}}</option>
                                              @php
                                            }
                                            @endphp

                                        </select>
                                        @if($errors->has('purpose_sample_store'))
											<span class="text-danger">{{ $errors->first('purpose_sample_store') }}</span>
										@endif

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

                                            <label for="purpose_sample_store" class="form-label wirteotherFurther" style="{{(!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == 'Further analysis')? '':'display:none;'}}"><strong>Provide details</strong></label><br>
                                           <textarea name="purpose_sample_store_details" id="wirteotherFurther" class="mt-2" maxlength="100" cols="60" rows="2" max="100" placeholder="Please specify genetic analysis or any other analysis." style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->purpose_sample_store) && $export_data->purpose_sample_store == 'Further analysis')? '':'display:none;'}}">{{(!empty($export_data->purpose_sample_store_details))? $export_data->purpose_sample_store_details:''}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        {{-- <label for="duration_sample_store" class="justify-center"><strong>(iii) Duration of the sample storage</strong></label> --}}
                                        <label for="duration_sample_store" class="form-label"><strong>(iii) Duration of the samples storage</strong></label>

                                        <input type="text" value="{{(!empty($export_data->duration_sample_store))? $export_data->duration_sample_store:''}}" name="duration_sample_store" id="duration_sample_store" class="form-control mt-2" placeholder="">
                                        @if($errors->has('duration_sample_store'))
										<span class="text-danger">{{ $errors->first('duration_sample_store') }}</span>
									@endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-3">
                                        {{-- <label for="facility_sample_store" class="justify-center"><strong>(iv) Facility where samples will be stored</strong></label> --}}
                                        <label for="facility_sample_store" class="form-label"><strong>(iv) Facility where samples will be stored</strong></label>
                                        <input type="text" value="{{(!empty($export_data->facility_sample_store))? $export_data->facility_sample_store:''}}" name="facility_sample_store" id="facility_sample_store" class="form-control mt-2" placeholder="">
                                        @if($errors->has('facility_sample_store'))
                                            <span class="text-danger">{{ $errors->first('facility_sample_store') }}</span>
                                        @endif
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
                                                        <input class="form-check-input" type="radio" name="national_security_angle_yes_no" id="nationalSecurity_yes" value="Yes" {{(!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="national_security_angle" class="form-label textNationalSecurity" style="{{(!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes')? '':'display:none'}}"><strong>Provide details</strong></label>
                                                        <textarea name="national_security_angle" class="textNationalSecurity" id="textNationalSecurity" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'Yes')? '':'display:none'}}">{{(!empty($export_data->national_security_angle))? $export_data->national_security_angle:''}}</textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="national_security_angle_yes_no" id="nationalSecurity_no" value="No" {{(!empty($export_data->national_security_angle_yes_no) && $export_data->national_security_angle_yes_no == 'No')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('national_security_angle_yes_no'))
												<span class="text-danger">{{ $errors->first('national_security_angle_yes_no') }}</span>
											@endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-2">
                                        {{-- <label for="foreign_country_army_military" class="justify-between"><strong>(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?</strong></label> --}}
                                        <label for="foreign_country_army_military" class="form-label"><strong>(ii) Whether the company/institution/department where the material is being exported is a subsidiary of a foreign country's army/military?</strong></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military_yes_no" id="armyMilitary_yes" value="Yes" {{(!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foreign_country_army_military" class="form-label armyMilitaryText" style="{{(!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes')? '':'display:none'}}"><strong>Provide details</strong></label>
                                                        <textarea name="foreign_country_army_military" class="armyMilitaryText" id="armyMilitaryText" maxlength="100" cols="65" rows="2" max="100" placeholder="Add details" style="border:1px solid #ddd; border-radius: 5px !important; {{(!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'Yes')? '':'display:none'}}">{{(!empty($export_data->foreign_country_army_military))? $export_data->foreign_country_army_military:''}}</textarea>
                                                    </div>
                                                    <div class="form-check custom-no">
                                                        <input class="form-check-input" type="radio" name="foreign_country_army_military_yes_no" id="armyMilitary_no" value="No" {{(!empty($export_data->foreign_country_army_military_yes_no) && $export_data->foreign_country_army_military_yes_no == 'No')? 'checked':''}}/>
                                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($errors->has('foreign_country_army_military_yes_no'))
													<span class="text-danger">{{ $errors->first('foreign_country_army_military_yes_no') }}</span>
												@endif
                                </div>
                            </div>
                            <div class="row">
                                <label for="biomaterial_micro_organisms_approval" class="form-label mt-2"><strong>(iii) If the Biomaterial contains micro-organisms listed in appendix 3 category 2 of list of SCOMET items, has approval been obtained from DGFT?</strong></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_yes" value="Yes" {{(!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes')? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        @if(!empty($export_data->biomaterial_micro_organisms_approval_file))
                                        <a href="{{ asset('media/exporter/'.$export_data->biomaterial_micro_organisms_approval_file) }}" target="_blank"><label class="form-lable" style="{{($export_data->biomaterial_micro_organisms_approval_file != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        @endif
                                        <label for="upload_files" style="{{(!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes')? '':'display:none'}}"
                                                class="form-lable biomaterialText"><span class="d-inline-block biomaterialText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        {{-- <label class="justify-center biomaterialText form-label" style="display: none;">Upload  relevant documents if any (Size: 5MB)</label><br/> --}}
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="biomaterial_micro_organisms_approval_file" class="form-control biomaterialText" id="biomaterialText" style="{{(!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'Yes')? '':'display:none'}}">

                                        </div>
                                        {{-- @error('biomaterial_micro_organisms_approval')
                                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @enderror --}}
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="biomaterial_micro_organisms_approval" id="biomaterial_no" value="No" {{(!empty($export_data->biomaterial_micro_organisms_approval) && $export_data->biomaterial_micro_organisms_approval == 'No')? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                    @if($errors->has('biomaterial_micro_organisms_approval'))
										<span class="text-danger">{{ $errors->first('biomaterial_micro_organisms_approval') }}</span>
									@endif
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
                                {{-- <label for="ibsc_rcgm_approval_applicable" class="form-label"><strong>(i) For the export of  biological material, has IBSC/RCGM approval been obtained?</strong></label> --}}
                                <label for="ibsc_rcgm_approval_applicable" class="form-label"><strong>(i) For the export of hazardous micro organisms/genetically engineered organisms or cells has IBSC/RCGM approval been obtained?</strong></label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgm_yes" value="Yes" {{(!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes')? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio1">Yes</label><br />
                                        </div>
                                        @if(!empty($export_data->ibsc_rcgm_approval_applicable_file))
                                        <a href="{{ asset('media/exporter/'.$export_data->ibsc_rcgm_approval_applicable_file) }}" target="_blank"><label class="form-lable" style="{{($export_data->ibsc_rcgm_approval_applicable_file != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        @endif
                                        <label for="upload_files" name="ibsc_rcgm_approval_applicable" id="ibscRcgmText_file_lable" style="{{(!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes')? '':'display:none'}}"
                                                class="form-lable ibscRcgmText"><span class="d-inline-block ibscRcgmText" tabindex="0"
                                                    data-bs-toggle="tooltip" data-bs-title="Max. Size 5MB (.PDF)">
                                                    <strong> Upload relevant documents, if any</strong>
                                                </span></label>
                                        <div class="input-group" style="width:50%">
                                            <input type="file" name="ibsc_rcgm_approval_applicable_file" class="form-control ibscRcgmText" id="ibscRcgmText_file" style="{{(!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'Yes')? '':'display:none'}}">
                                        </div>
                                        {{-- @error('ibsc_rcgm_approval_applicable')
                                        <div class="alert alert-danger" role="alert">{{$message}}</div>
                                        @enderror --}}
                                        <div class="form-check custom-no">
                                            <input class="form-check-input" type="radio" name="ibsc_rcgm_approval_applicable" id="ibscRcgmText" value="No" {{(!empty($export_data->ibsc_rcgm_approval_applicable) && $export_data->ibsc_rcgm_approval_applicable == 'No')? 'checked':''}}/>
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                    </div>
                                    @if($errors->has('ibsc_rcgm_approval_applicable'))
                                    <span class="text-danger">{{ $errors->first('ibsc_rcgm_approval_applicable') }}</span>
                               @endif
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
                                                <input type="checkbox" class="form-check-input" name="icertify" id="invalidCheck" style="width:20px; height:20px; border: 1px solid #022759">

                                                <span class="text-danger">*</span> I certify that the information provided in this request form is true and
                                                correct to the best of my knowledge, and I hereby declare that the samples
                                                referred to herein will be utilized for the purpose of <br>&nbsp;
                                                @if($errors->has('icertify'))
                                                <span class="text-danger">{{ $errors->first('icertify') }}</span>
                                              @endif
                                                <input class="form-control costum1" type="text" value="" readonly id="declaration_of_purpose" name="sender_certify_information_provided"><span>only, the samples will not be used for any other purposes.</span> </label>

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
                                         <input type="checkbox" class="form-check-input" name="certifythat" id="invalidCheck" style="width:20px; height:20px; border: 1px solid #022759">

                                         <span class="text-danger">*</span> Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply FEMA regulations and other guidelines issued by
                                        RBI regarding foreign transactions.</label></p>
                                        @if($errors->has('certifythat'))
                                                <span class="text-danger">{{ $errors->first('certifythat') }}</span>
                                              @endif
                                        <div class="row">
                                            {{-- <div class="col-md-7">
                                                <p class="p-2">(Authorized signatory on behalf of
                                                organization as per law of company)</p>
                                            </div> --}}
                                        <div class="col-md-5">
                                            <div class="form-group mb-3 m-2">
                                            @if(!empty($export_data->certified_copy_proforma))
                                        <a href="{{ asset('media/exporter/'.$export_data->certified_copy_proforma) }}" target="_blank"><label class="form-lable" style="{{($export_data->certified_copy_proforma != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        @endif
                                                <label for="" class="form-label m-1"><strong>Upload Certified copy of commercial Contract/Proforma Invoice</strong></label>
                                                <input type="file" name="certified_copy_proforma" id="certified_copy_proforma" class="form-control">
                                                @if($errors->has('certified_copy_proforma'))
													<span class="text-danger">{{ $errors->first('certified_copy_proforma') }}</span>
											   @endif
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
                                        <a href="{{ asset('media/exporter/'.$export_data->declaration_letter) }}" target="_blank"><label class="form-lable" style="{{($export_data->declaration_letter != '')? '':'display: none;'}}"><strong>View Uploaded documents</strong></label>
                                                        </a>
                                                        @endif
                                                <label for="" class="form-label m-1"><strong>Upload duly signed declaration of letter</strong></label>
                                                <input type="file" name="declaration_letter" id="" class="form-control">
                                                @if($errors->has('declaration_letter'))
													<span class="text-danger">{{ $errors->first('declaration_letter') }}</span>
											    @endif
                                            </div>
                                            <p class="p-2" style="color:green"><b>Note:-</b> Please upload declaration of letter with authorized signature.</p>
                                        </div>
                                    <div class="col-md-7">
                                            <div class="upload-download mt-2">
                                                <label for="" class="form-label m-1"><strong>Format for declaration letter</strong></label><br>
                                                <a href="{{ asset('assets/backend/images/exporter/declaration-by-recipient-of-samples.docx') }}" class="download-letter-item" target="_blank"><button type="button" class="btn btn-primary mt-1">Download</button></a>
                                    </div>

                                </div>
                                </div>
                                    <div class="col-md-11 mb-5 m-2">
                                    <input type="hidden" value="{{ $ieccode->name }}" name="recipient_certify_samples_referred">
                                    <input type="hidden" value="" id="custody_of_value" name="recipient_name_institution">
                                    <input type="hidden" value=""  id="purpose_of_one" name="recipient_utilized_for_purpose">

                                        <p style="text-align:justify">This is to certify that the samples <strong><span id="sample_show_in_declaration_id">{{ (!empty($export_data->natural_biomaterial_exported))? $export_data->natural_biomaterial_exported:''}}</span></strong> referred to herein being sent to <strong>{{ $ieccode->name }}</strong>  (Name of Institution) for analyses/investigations will be in the
                                            custody of <strong><span id="custody_id">{{ (!empty($export_data->receving_recipient_name))? $export_data->receving_recipient_name:''}}</span></strong> and I hereby confirm that they will be utilized for the purpose of <strong><span id="purpose_of_one_id">{{ (!empty($export_data->specify_purpose_end_use))? $export_data->specify_purpose_end_use:''}}</span></strong>
                                            only, and I accept full responsibility and control over the usage of these samples and this sample will not be used for any other purposes.</p>
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
                        <div id="multiple-one" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="multiple-oneModalLabel" aria-hidden="true">
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

                    <!-- ================================== Alok code end =================================== -->

                    {{-- </div> --}}
                    {{-- <div class="card"> --}}
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mt-3 m-2" name="submit" id="btnSubmit"
                                value="savedraft" style="font-size:17px">Save as Draft</button>

                                <button type="button" class="btn btn-primary mt-3 m-2" data-bs-toggle="modal" data-bs-target="#multiple-one" style="font-size:17px">Submit</button>
                        </div>
                    {{-- </div> --}}
            </form>
        </section>
    </div>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
    //Natural biomaterical script
    $(document).ready(function(){
        $('#natural_biomaterial_exported_others').on('change', function() {
            //alert('check');
        var value = $('#natural_biomaterial_exported_others').val();
        //alert(value);
        if(value == 'Other body fluids')
        $('#natural_biomaterial_exported_details').show();
        else
        $('#natural_biomaterial_exported_details').hide();
        $('#natural_biomaterial_exported_details').val('');

        if(value == 'Any Tissue/Cells')
        $('#natural_biomaterial_exported_any_tissue_details').show();
        else
        $('#natural_biomaterial_exported_any_tissue_details').hide();
        $('#natural_biomaterial_exported_any_tissue_details').val('');
       });
    });
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
<script>
    $(document).ready(function() {
       $('#receving_recipient_name').on('blur', function() {
           var reciving_party_name = $('#receving_recipient_name').val();
           $('#custody_of_value').val(reciving_party_name);
           $('#custody_id').text(reciving_party_name);
           //alert(hs_code);

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
           //$('#end_user_name').show();
           //$('#end_user_address').show();
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
    //     alert('check';)
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
        $('#declaration_of_purpose').val(s_purpose);
        $('#purpose_of_one').val(s_purpose);
        $('#purpose_of_one_id').text(s_purpose);


        if(s_purpose == 'Others')
        $('#specifyText_end_use').show();
        else
        $('#specifyText_end_use').hide();
        $('#specifyText_end_use').val('');
       });

       $('#research_analysis_yes').on('click', function() {
           $('.research_analysisSelect').show();
       });

       $('.research_analysisSelect').on('change', function() {
            //alert('check');
        var value = $('.research_analysisSelect').val();
       // alert(value);
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

   });
</script>

@endsection
