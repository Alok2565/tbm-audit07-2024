@extends('icmr.layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
li.select2-search.select2-search--inline {
    margin-left: 16px;
}
</style>
<section class="mb-5 py-2">
    <div class="container">
        <p class="text-start" style="font-size: 17px; font-weight:600; color:#14468C"><strong>Application form for IMPORT of human samples &
		other biological materials for commercial/contract research </strong><button class="btn btn-primary float-end">
            <a class="float-end text-white" href="{{ url('imp-exp/import') }}" style="font-weight:600;">Back to Lists</a>
        </button></p>

    </div>
</section>
<section class="exporter-section mt-3">
    <div class="container">
	<form method="POST" action="{{url('imp-exp/creates')}}" enctype="multipart/form-data">
	   {{ csrf_field() }}
       <div class="card custom-card pt-2">
            <div class="form-card-tite text-white">
                <p class="title-items">PART-A: Basic information</p>
            </div>
            <div class="form-card-sub-tite text-black">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1">1. Receiving party</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="impexp_iec_code" class="form-label">(i) Importer Exporter Code (IEC) Number</label>
                    <input type="text" class="form-control iec_number" value="{{$ieccode->iec_code }}" id="iec_number" name="iec_number">
				    <span> </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_name" class="form-label">(ii) Name of the Applicant</label>
                    <input type="text" class="form-control name_of_applicant" value="{{$ieccode->name }}" id="name_of_applicant" name="name_of_applicant" readonly>
                </div>
            </div>
			<div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_design" class="form-label">(iii) Designation</label>
                    <input type="text" class="form-control" value="{{$ieccode->designation }}" id="name_of_designation" name="name_of_designation">
                </div>
            </div>
        </div>

        <div class="row">
			<div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_design" class="form-label">(iv) Address of the Company/Institution</label>
                    <input type="text" class="form-control" id="address_company" name="address_company">
                </div>
            </div>
			<div class="col-md-8  mt-2">
			 <label for="comp_intitute_denied_export_auth_last_3_years" class="form-label">(v) Whether the applicant/ company/ institution
						has been denied import authorization in last 3 years??</label>
			<div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="company_denied_import[]" id="text_yes"
                                    value=""/>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>

                            <div class="form-check form-check-inline custom-no">
                                <input class="form-check-input" type="radio"
                                    name="company_denied_import[]" id="text_no"
                                    value="No"/>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="company_denied_import[]" id="wirtetext_yes" maxlength="100" cols="35" rows="2" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                        </div>
                    </div>


               </div><!--end main row-->

			</div>
		</div>



		 <div class="form-card-sub-tite text-black">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1">2. Sending party*</span></div>
                    </div>
                </div>
        </div>
		<div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="impexp_iec_code" class="form-label">(i) Name of the Sender</label>
                    <input type="text" class="form-control" id="name_of_sender" name="name_of_sender">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_name" class="form-label">(ii) Designation of the Sender</label>
                    <input type="text" class="form-control" id="designation_of_sender" name="designation_of_sender">
                </div>
            </div>
			 <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_name" class="form-label">(iii) Address of the Company/Institution</label>
                    <input type="text" class="form-control" id="address_of_company" name="address_of_company">
                </div>
            </div>
        </div>

        <div class="card custom-card mt-4">
            <div class="form-card-tite text-white">
                <p class="title-items">PART-B: Other Details</p>
            </div>
            <div class="form-card-sub-tite text-black">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1">1. Details of biomaterial to be imported</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mt-2">
                    <label for="send_app_design" class="form-label">(i) HS code of Item to be imported</label>
                    <input type="text" class="form-control" id="hs_code" name="hs_code">
                </div>
            </div>
            <div class="col-md-8">
			<div class="row">
			<div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="natural_biomateria_exported" class="form-label"><span>(ii) Nature of biomaterial to be imported</span></label>
						<div class="arrow-icon py-2 mr-3">
                                <i class="fa fa-angle-down float-end mt-3 select2-selection select2-selection--multiple" style="position: relative; z-index: 11; font-size: 24px;margin-right: 13px;"></i>
                            </div>
						<select name="nature_biomaterial[]" id="natural_biomateria_exported" class="form-control form-select" multiple aria-label=".form-select-lg example">
                            <option class="multiple_biom" value="whole blood" class="p-1">Whole blood</option>
                            <option class="multiple_biom" value="sperm" class="p-1" name="natural_biomateria_exported">Sperm</option>
                            <option class="multiple_biom" value="plasma" class="p-1" name="natural_biomateria_exported">Plasma</option>
                            <option class="multiple_biom" value="urine" class="p-1" name="natural_biomateria_exported">Urine</option>
                            <option class="multiple_biom" value="other body fluids" class="p-1" name="natural_biomateria_exported">Other body fluids</option>
                            <option class="multiple_biom" value="Tissue/Cell culture" class="p-1" name="natural_biomateria_exported">Tissue/Cell culture</option>
                            <option class="multiple_biom" value="Nucleic acid(DNA/RNA" class="p-1" name="natural_biomateria_exported">Nucleic acid(DNA/RNA)</option>
                            <option id="other_select" value="" class="p-1">other (Please sepcify)</option>
                        </select>
                </div>
			</div>
			<div class="col-md-6">
			 <textarea name="nature_biomaterial[]" class="mt-5" id="multiple_yes" maxlength="100" cols="40" rows="3" max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
			</div>
			</div>
            </div>
        </div>
		<div class="row">
            <div class="col-md-6">
			<div class="row">
			<label for="send_app_design" class="form-label">(iii) Details of Quantity to be imported</label>
			<div class="col-md-6">
			<div class="form-group mt-2">
			<input type="text" class="form-control" id="Quantity_import_num" name="Quantity_import_num" placeholder="Number">
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group mt-2">
			<input type="text" class="form-control" id="Quantity_import_vol" name="Quantity_import_vol" placeholder="Volume">
			</div>
			</div>
             </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="natural_biomateria_exported" class="form-label"><span>(iv) Whether repeat import of samples is envisaged </span></label>
					 <div class="row mt-2">
                    <div class="col-md-5">
                        <div class="form-group mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="repeat_import[]" id="envisaged_yes"
                                    value="" />
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>

                            <div class="form-check form-check-inline custom-no">
                                <input class="form-check-input" type="radio"
                                    name="repeat_import[]" id="envisaged_no"
                                    value="No" />
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <textarea name="repeat_import[]" id="wirteenvisaged_yes" maxlength="100" cols="30" rows="2"
                                max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                        </div>
                    </div>


               </div>
                </div>
            </div>
        </div>
		 <div class="form-card-sub-tite text-black">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1"><span class="text-center p-1">2. Purpose of import of samples</span></div>
                    </div>
                </div>
         </div>
		<div class="row">
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="" class="form-label"><span>(i) Specify purpose/end use </span></label>
					    <!--<div class="arrow-icon py-2 mr-3">
                                <i class="fa fa-angle-down float-end mt-3 select2-selection select2-selection--multiple" style="position: relative; z-index: 11; font-size: 24px;margin-right: 13px; "></i>
                            </div>-->
							<select name="purpose_end_use[]" id="purposend multiple-select-field" class="form-control form-select" data-placeholder="Please Select" aria-label=".form-select-lg example" multiple>
							<option id="purposeend" value="Calibration/Quality assurance" class="enduser">Calibration/Quality assurance</option>
                            <option id="purposeend" value="Clinical Diagnostics/Testing" class="enduser" >Clinical Diagnostics/Testing</option>
                            <option id="purposeend" value="" class="other_enduser">Others (please specify)</option>
                        </select>
                            <!--<select name="purpose_end_use[]" class="form-control form-select mt-5" id="multiple-select-field" data-placeholder="Choose anything" multiple>
                                <option class="enduser" value="Calibration/Quality assurance" >Calibration/Quality assurance</option>
                            <option class="enduser" value="Clinical Diagnostics/Testing">Clinical Diagnostics/Testing</option>
                            <option class="other_enduser">Others (please specify)</option>
                            </select>-->
			     </div>
            </div>
			<div class="col-md-6 pt-4">
			    <textarea name="purpose_end_use[]" id="enduser_yes" maxlength="100" cols="45" rows="3"max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
            </div>
        </div>
		<div class="form-card-sub-tite text-black mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1 "><span class="text-center p-1">3. Biosafety Concerns</span></div>
                    </div>
                </div>
         </div>
		 <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <p>(i) Whether the material to be imported contains
					    any of the following:</p>
						<p class="grid"><span><i class='fa fa-circle' style='font-size:7px'></i>&nbsp;&nbsp;Infectious biological agents capable of causing illness in humans</span><br>
						  <span><i class='fa fa-circle' style='font-size:7px'></i>&nbsp;&nbsp;Materials known or reasonably  expected to contain an infectious biological agent</span><br>
						  <span><i class='fa fa-circle' style='font-size:7px'></i>&nbsp;&nbsp;Vectors of human disease</span><br>
						  <span><i class='fa fa-circle' style='font-size:7px'></i>&nbsp;&nbsp;Nucleic acids encoding sections or fragments of infectious viruses capable of &nbsp;&nbsp;&nbsp;&nbsp;producing the infectious virus</span>
					    </p>
                </div>
            </div>
			<div class="col-md-6">
              <div class="form-group mt-3">
                    <div class="row mt-2">
                    <div class="col-md-5">
                        <div class="form-group mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="biosafety_concerns[]" id="biosafety_yes"
                                    value=""/>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>

                            <div class="form-check form-check-inline custom-no">
                                <input class="form-check-input" type="radio"
                                    name="biosafety_concerns[]" id="biosafety_no"
                                    value="No" />
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <textarea name="biosafety_concerns[]" id="wirtebiosafety_yes" maxlength="100" cols="35" rows="3"
                                max="100" placeholder="Max 100 Words" style="border:1px solid #ddd; border-radius: 5px !important; display:none;"></textarea>
                        </div>
                    </div>
               </div>
                </div>
            </div>
        </div>
		<div class="form-card-sub-tite text-black mt-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sub-title p-1 "><span class="text-center p-1">4. IBSC/RCGM approval, as applicable**</span></div>
                    </div>
                </div>
        </div>
		<div class="row mt-3">
            <div class="col-md-6">
                <p>For the import of infectious biological material, has IBSC/RCGM approval been obtained?</p>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <div class="row mt-2">
                    <div class="col-md-6">
                        <div class="form-group mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="biological_material" id="ibsc_yes"
                                    value=""/>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>

                            <div class="form-check form-check-inline custom-no">
                                <input class="form-check-input" type="radio"
                                    name="biological_material" id="ibsc_no"
                                    value="No"/>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="display:none;" id="ibsc_approval_yes">
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
		<div class="row" style="margin: 3px;">
		    <div style="border-right: 1px solid #0000004a;" class="col-md-5">
                <p>(i) Declaration by the person requesting import of samples</p>
            </div>
			<div class="col-md-7">
               <p>I certify that the information provided in this  request form is true and correct to the best of my
				knowledge, and I hereby declare that the samples referred to herein will be utilized for the
				purpose of <input type="text" class="partc" style="float:none;"name="purpose_of">  only, as stated in the application.</p>

              <p>This is to certify that the samples referred to herein being sent me for analyses/experimentation, as
				mentioned in this application, will be in my custody and I hereby confirm that they will be
				utilized for the purpose of <input type="text" class="" style="float:none;" name="purpose_of_one">  only,
				and I accept full responsibility and control over the usage of these samples.</p>
			</div>
		</div>
		<div class="row" style="margin: 3px;border-top: 1px solid #0000004a; border-bottom: 1px solid #0000004a;">
		    <div style="border-right: 1px solid #0000004a;" class="col-md-5">
                <p>(ii) Copy of Commercial contract/Proforma invoice</p>
            </div>
			<div class="col-md-7">
               <p>Certified copy of commercial contract/Proforma invoice is enclosed. Further I undertake to comply
				FCRA/FEMA regulations and other guidelines issued by RBI regarding foreign transactions.</p>
			</div>
		</div>
		<div class="row mt-4" style="padding: 5px; margin: 3px;border:1px solid #0000004a;">

              <input type="text" style="width:280px;" class="float-start form-control mt-3" name="signature">
			  <p>Signature</p>
			  <p>(Authorized signatory on behalf of organization as per law of company)</p>
			  <div class="row">
			      <div class="col-md-6">
				     <div class="form-group">
                        <label for="impexp_iec_code" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                     </div>
				  </div>
				  <div class="col-md-6">
				       <div class="form-group">
                           <label for="impexp_iec_code" class="form-label">Designation:</label>
                           <input type="text" class="form-control" id="designation" name="designation">
                       </div>
				  </div>
			  </div>
			  <div class="row">
			      <div class="col-md-6">
				      <div class="form-group">
                           <label for="impexp_iec_code" class="form-label">Address:</label>
                           <input type="text" class="form-control" id="address" name="address">
                       </div>
				  </div>
				  <div class="col-md-6">
				       <div class="form-group">
                           <label for="impexp_iec_code" class="form-label">Date:</label>

                           <input type="text" class="form-control" value="<?php date_default_timezone_set("Asia/Calcutta"); echo date('d-m-Y'); ?>" id="dates" name="dates">
                       </div>
				  </div>
			  </div>

		</div>
        <div class="col-md-12 mt-3">
            <button type="submit" class="btn btn-primary mb-3" name="submit" id="btnSubmit" value="submit">Submit</button>

        </div>
    </form>
</div>
</section>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
        $(document).ready(function () {
           $('.iec_number').on('change', function () {
                var iec_number = $('#iec_number').val();
                //alert(iec_number);
                $.ajax({
                    url: '{{url('imp-exp/importapi') }}',
                    type: 'get',
					data:{
					  iec_number: iec_number,
					},
					dataType: 'json',
                    success: function (res) {
                        //console.log(res);
					 $('.name_of_applicant').val(res.entityName);
                    }
                });
            });
			 });
</script>
@endsection
