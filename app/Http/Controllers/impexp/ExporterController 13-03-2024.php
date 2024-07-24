<?php

namespace App\Http\Controllers\impexp;
use App\Models\HsCode;
use App\Models\Exporter;
use App\Models\Exportersdraft;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ImpExpUse;
use Illuminate\Http\Request;
use App\Mail\ExporterMailSubmit;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ExporterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
           $clientIP = request()->ip();
           $clientIP;
            //$ResultExporter['dataExporters'] = Exporter::all();
            //dd( $ResultExporter);
			$iec_code = Session::get('iec_code');
           $ResultExporter['dataExporters'] = Exporter::where('sending_iec_number', $iec_code)->orderBy('id', 'desc')->get();
           //dd( $ResultExporter);
            return view('impexp.exporter.exporter', $ResultExporter);
        //}

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function draft(Request $request)
    {
        if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
           $clientIP = request()->ip();
           $clientIP;
            //$ResultExporter['dataExporters'] = Exporter::all();
            //dd( $ResultExporter);
			$iec_code = Session::get('iec_code');
           $ResultExporter['dataExporters'] = Exportersdraft::where('sending_iec_number', $iec_code)->where('status','1')->orderBy('id', 'desc')->get();
           //dd( $ResultExporter);
            return view('impexp.exporter.exporterdraft', $ResultExporter);
        //}

        return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function draftform(Request $request,$id){

		if(empty(Session::get('roll')=='imp-exp')){
			return redirect('imp-exp/login');
		  }

          $iec_code = Session::get('iec_code');

          $export_data = Exportersdraft::find($id);
    $ieccode =  ImpExpUse::where('iec_code', $iec_code)->first();
    $nature_of_biomaterial_options = DB::select('select * from nature_of_biomaterial_options where status = 1');
    $purpose_of_end_use_options = DB::select('select * from purpose_of_end_use_options where status = 1');
    $purpose_of_sample_storage_options = DB::select('select * from purpose_of_sample_storage_options where status = 1');
    $samples_exported_volume_options = DB::select('select * from samples_exported_volume_options where status = 1');
    $weather_sample_used_research_analysis_options = DB::select('select * from weather_sample_used_research_analysis_options where status = 1');
    $where_the_samples_collected_options = DB::select('select * from where_the_samples_collected_options where status = 1');
    $hs_code = DB::select('select * from hs_code_items where status = 1');
    //dd($hs_code);
    return view('impexp.exporter.add',compact('export_data','ieccode', 'nature_of_biomaterial_options', 'purpose_of_end_use_options', 'purpose_of_sample_storage_options', 'samples_exported_volume_options', 'weather_sample_used_research_analysis_options', 'where_the_samples_collected_options','hs_code'));


		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}

    public function reject_expoter(Request $request)
	{
	   if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
           $clientIP = request()->ip();
           $clientIP;
			$iec_code = Session::get('iec_code');
           $ResultExporter['dataExporters'] = Exporter::where('sending_iec_number', $iec_code)->where('status',1)->orderBy('id', 'desc')->get();

	return view('impexp.exporter.rejectexporter', $ResultExporter);
	}

	public function pending_expoter(Request $request)
	{
	   if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
           $clientIP = request()->ip();
           $clientIP;
			$iec_code = Session::get('iec_code');
           $ResultExporter['dataExporters'] = Exporter::where('sending_iec_number', $iec_code)->where('status', 0)->where('icmr_noc_status', 0)->orderBy('id', 'desc')->get();

	return view('impexp.exporter.pendingexporter', $ResultExporter);
	}


    public function add(Request $request)
	{
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	$iec_code = Session::get('iec_code');

	$ieccode =  ImpExpUse::where('iec_code', $iec_code)->first();

    $nature_of_biomaterial_options = DB::select('select * from nature_of_biomaterial_options where status = 1');
    $purpose_of_end_use_options = DB::select('select * from purpose_of_end_use_options where status = 1');
    $purpose_of_sample_storage_options = DB::select('select * from purpose_of_sample_storage_options where status = 1');
    $samples_exported_volume_options = DB::select('select * from samples_exported_volume_options where status = 1');
    $weather_sample_used_research_analysis_options = DB::select('select * from weather_sample_used_research_analysis_options where status = 1');
    $where_the_samples_collected_options = DB::select('select * from where_the_samples_collected_options where status = 1');
    $hs_code = DB::select('select * from hs_code_items where status = 1');
    //dd($hs_code);

    return view('impexp.exporter.add',compact('ieccode', 'nature_of_biomaterial_options', 'purpose_of_end_use_options', 'purpose_of_sample_storage_options', 'samples_exported_volume_options', 'weather_sample_used_research_analysis_options', 'where_the_samples_collected_options','hs_code'));
	}


	public function exportapi(Request $request)
	{
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
		$attt = $request->all();

		$iec = $attt['sending_iec_number'];

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://apisetu.gov.in/dgft/v1/iec/$iec",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'GET',
		  CURLOPT_HTTPHEADER => array(
			'X-APISETU-CLIENTID: in.gov.dhr',
			'X-APISETU-APIKEY: DX8EBPqrZCjyldUoPoaROfQpllk1WQMQ',
			'accept: application/json',
			'Cookie: Path=/'
		  ),
		));
		$response = curl_exec($curl);
		curl_close($curl);
		echo $response;

	}

    public function manage_exporter(Request $request, $id = '')
    {
       if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

        if ($id > 0) {
            $ArrExporter = Exporter::where(['id' => $id])->get();


            $ResultExporter['sending_iec_number'] = $ArrExporter['0']->sending_iec_number;
            $ResultExporter['sending_applicant_name'] = $ArrExporter['0']->sending_applicant_name;
            $ResultExporter['sending_applicant_design'] = $ArrExporter['0']->sending_applicant_design;
            $ResultExporter['sending_add_company_institute'] = $ArrExporter['0']->sending_add_company_institute;
            $ResultExporter['comp_institute_denied_export_auth_last_3_years'] = $ArrExporter['0']->comp_institute_denied_export_auth_last_3_years;
			 $ResultExporter['upload_comp_institute_denied_export'] = $ArrExporter['0']->upload_comp_institute_denied_export;
            $ResultExporter['receving_recipient_name'] = $ArrExporter['0']->receving_recipient_name;
            $ResultExporter['receving_recipient_design'] = $ArrExporter['0']->receving_recipient_design;
            $ResultExporter['receiving_add_company_institute'] = $ArrExporter['0']->receiving_add_company_institute;
            $ResultExporter['end_user_receiving_party'] = $ArrExporter['0']->end_user_receiving_party;
            $ResultExporter['end_user_name'] = $ArrExporter['0']->end_user_name;
            $ResultExporter['end_user_address'] = $ArrExporter['0']->end_user_address;
            $ResultExporter['hs_code'] = $ArrExporter['0']->hs_Code;
            $ResultExporter['natural_biomaterial_exported'] = $ArrExporter['0']->natural_biomaterial_exported;
            $ResultExporter['sample_collected'] = $ArrExporter['0']->sample_collected;
            $ResultExporter['samples_being_exported'] = $ArrExporter['0']->sampes_being_exported;
            $ResultExporter['exported_number'] = $ArrExporter['0']->exported_number;
            $ResultExporter['exported_volume'] = $ArrExporter['0']->exported_volume;
            $ResultExporter['vol_of_sample_text'] = $ArrExporter['0']->vol_of_sample_text;
            $ResultExporter['repeat_samples_envisaged'] = $ArrExporter['0']->repeat_samples_envisaged;
            $ResultExporter['samples_used_research_analysis'] = $ArrExporter['0']->samples_used_research_analysis;
            $ResultExporter['leftover_samples_store'] = $ArrExporter['0']->leftover_samples_store;
            $ResultExporter['purpose_sample_store'] = $ArrExporter['0']->purpose_sample_store;
            $ResultExporter['duration_sample_store'] = $ArrExporter['0']->duration_sample_store;
            $ResultExporter['facility_sample_store'] = $ArrExporter['0']->facility_sample_store;
            $ResultExporter['national_security_angle'] = $ArrExporter['0']->national_security_angle;
            $ResultExporter['foreign_country_army_military'] = $ArrExporter['0']->foreign_country_army_military;
            $ResultExporter['biomaterial_micro_organisms_approval'] = $ArrExporter['0']->biomaterial_micro_organisms_approval;
            $ResultExporter['ibsc_rcgm_approval_applicable'] = $ArrExporter['0']->ibsc_rcgm_approval_applicable;
            $ResultExporter['sender_certify_information_provided'] = $ArrExporter['0']->sender_certify_information_provided;
            $ResultExporter['sender_signature'] = $ArrExporter['0']->sender_signature;
            $ResultExporter['sender_name'] = $ArrExporter['0']->sender_name;
            $ResultExporter['sender_designation'] = $ArrExporter['0']->sender_designation;
            $ResultExporter['sender_address'] = $ArrExporter['0']->sender_address;
            $ResultExporter['sender_date'] = $ArrExporter['0']->sender_date;
            $ResultExporter['recipient_certify_samples_referred'] = $ArrExporter['0']->recipient_certify_samples_referred;
            $ResultExporter['recipient_name_institution'] = $ArrExporter['0']->recipient_name_institution;
            $ResultExporter['recipient_utilized_for_purpose'] = $ArrExporter['0']->recipient_utilized_for_purpose;
            $ResultExporter['recipient_signature'] = $ArrExporter['0']->recipient_signature;
            $ResultExporter['recipient_name'] = $ArrExporter['0']->recipient_name;
            $ResultExporter['recipient_designation'] = $ArrExporter['0']->recipient_designation;
            $ResultExporter['recipient_address'] = $ArrExporter['0']->recipient_address;
            $ResultExporter['recipient_date'] = $ArrExporter['0']->recipient_date;
            $ResultExporter['id'] = $ArrExporter['0']->id;

            // $ResultExporter["natural_biomaterial"] =DB::table("exporters")
            //                 ->where(["status" => 1])
            //                 ->where("id" != $id)
            //                 ->get();

            $ResultExporter["id"] = $ArrExporter["0"]->id;
            $ResultExporter["natural_biomaterial"] = DB::table("exporters")
                ->where(["status" => 1])
                ->where("id", "!=", $id)
                ->get();

        } else {

            $ResultExporter['sending_iec_number'] = '';
            $ResultExporter['sending_applicant_name'] = '';
            $ResultExporter['sending_applicant_design'] = '';
            $ResultExporter['sending_add_company_institute'] = '';
            $ResultExporter['comp_institute_denied_export_auth_last_3_years'] = '';
			$ResultExporter['upload_comp_institute_denied_export'] = '';
            $ResultExporter['receving_recipient_name'] = '';
            $ResultExporter['receving_recipient_design'] = '';
            $ResultExporter['receiving_add_company_institute'] = '';
            $ResultExporter['end_user_receiving_party'] = '';
            $ResultExporter['end_user_name'] = '';
            $ResultExporter['end_user_address'] = '';
            $ResultExporter['hs_code'] = '';
            $ResultExporter['natural_biomaterial_exported'] = '';
            $ResultExporter['sample_collected'] = '';
            $ResultExporter['specify_purpose_end_use'] = '';
            $ResultExporter['samples_used_research_analysis'] = '';
            $ResultExporter['samples_being_exported'] = '';
            $ResultExporter['exported_number'] = '';
            $ResultExporter['exported_volume'] = '';
            $ResultExporter['vol_of_sample_text'] = '';
            $ResultExporter['repeat_samples_envisaged'] = '';
            $ResultExporter['specify_purpose_end_use'] = '';
            $ResultExporter['samples_used_research_analysis'] = '';
            $ResultExporter['leftover_samples_store'] = '';
            $ResultExporter['purpose_sample_store'] = '';
            $ResultExporter['duration_sample_store'] = '';
            $ResultExporter['facility_sample_store'] = '';
            $ResultExporter['national_security_angle'] = '';
            $ResultExporter['foreign_country_army_military'] = '';
            $ResultExporter['biomaterial_micro_organisms_approval'] = '';
            $ResultExporter['ibsc_rcgm_approval_applicable'] = '';
            $ResultExporter['sender_certify_information_provided'] = '';
            $ResultExporter['sender_signature'] = '';
            $ResultExporter['sender_name'] = '';
            $ResultExporter['sender_designation'] = '';
            $ResultExporter['sender_address'] = '';
            $ResultExporter['sender_date'] = '';
            $ResultExporter['recipient_certify_samples_referred'] = '';
            $ResultExporter['recipient_name_institution'] = '';
            $ResultExporter['recipient_utilized_for_purpose'] = '';
            $ResultExporter['recipient_signature'] = '';
            $ResultExporter['recipient_name'] = '';
            $ResultExporter['recipient_designation'] = '';
            $ResultExporter['recipient_address'] = '';
            $ResultExporter['recipient_date'] = '';
            $ResultExporter['id'] = '';

            $ResultExporter["natural_biomaterial"] = DB::table("exporters")
                ->where(["status" => 1])
                ->get();

            // $ResultExporter["natural_biomaterial"] =DB::table("exporters")
            //                 ->where(["status" => 0])->get();
        }
        return view('impexp.exporter.manage_exporter',$ResultExporter);
    //}
    return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function manage_exporter_process(Request $request, $id='')
    {
        if(empty(Session::get('roll')=='imp-exp')){
            return redirect('imp-exp/login');
          }

        if($request->post('submit') == 'submit'){

        // $data = $request->post();
        // echo "<pre/>";
        // print_r($data);
        // die;

        // $request->validate([
        //     "biomaterial_micro_organisms_approval"=>"mimes:pdf|max:100",
        //     "ibsc_rcgm_approval_applicable"=>"mimes:pdf|max:100"
        // ]);
        $sending_applicant_name = $request->post('sending_applicant_name');
        $result_data = substr($sending_applicant_name, 0, 4);
      	$id = Session::get('id');
       // $ip_Address = '';
       $exporte_data = Exporter::orderBy('id', 'DESC')->get();
       if(!empty($exporte_data[0]->id)){
        $exporte_id = ($exporte_data[0]->id > 0)? $exporte_data[0]->id + 1 : 1;
       }else{
        $exporte_id = 1;
       }

       $application_number = sprintf("%05d", $exporte_id);
        // if ($request->post('id') > 0) {
        //     $modelExporter = Exporter::find($request->post('id'));
        //     //dd($modelExporter);
        //     $msg = "Exporter has been updated successfully";
        // } else {
        //     $modelExporter = new Exporter();
        //     // dd($modelExporter);
        //     $msg = "Exporter has been submited successfully";
        // }
        if ($request->post('id') > 0) {
            $modelExporter = Exporter::find($request->post('id'));
            //dd($modelExporter);
            $msg = "Application for export of sample has been updated successfully";
            $msg1 = $result_data."/E/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        } else {
            $modelExporter = new Exporter();
            // dd($modelExporter);
            $msg = "Application for export of sample  has been submitted successfully";
            $msg1 = $result_data."/E/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        }

        if (!empty($request->post('draftid')) && $request->post('draftid') > 0) {
            $modelExporter_draft = Exportersdraft::find($request->post('draftid'));
            $modelExporter->upload_comp_institute_denied_export = $modelExporter_draft->upload_comp_institute_denied_export;
            $modelExporter->biomaterial_micro_organisms_approval_file = $modelExporter_draft->biomaterial_micro_organisms_approval_file;
            $modelExporter->ibsc_rcgm_approval_applicable_file = $modelExporter_draft->ibsc_rcgm_approval_applicable_file;
            $modelExporter->declaration_letter = $modelExporter_draft->declaration_letter;
            $modelExporter->certified_copy_proforma = $modelExporter_draft->certified_copy_proforma;
            $modelExporter_draft->status = '0';
            $modelExporter_draft->save();

    }



         $modelExporter['user_id'] = $id;
        // $modelExporter['ip_address'] = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->application_number = $result_data."/E/".date('Y')."/".$application_number;
        $modelExporter->sending_applicant_name = $sending_applicant_name;
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');
        $modelExporter->denied_export_auth_last_3_years_yes_no = $request->post('denied_export_auth_last_3_years_yes_no');

        if ($request->hasfile("upload_comp_institute_denied_export")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export);
            }

            $file = $request->file("upload_comp_institute_denied_export");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            // $file->storeAs("/public/media/banner/slider", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->upload_comp_institute_denied_export = $file_name;
        }
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_receiving_party_yes_no = $request->post('end_user_receiving_party_yes_no');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code = $request->post('hs_code');
        $modelExporter->hs_code_description = $request->post('hs_code_description');
        $modelExporter->sample_collected = $request->post('sample_collected');
        $modelExporter->samples_being_exported = $request->post('samples_being_exported');
        $modelExporter->samples_being_exported_details = $request->post('samples_being_exported_details');
        $modelExporter->exported_number = $request->post('exported_number');
        $modelExporter->exported_volume = $request->post('exported_volume');
        $modelExporter->vol_of_sample_text = $request->post('vol_of_sample_text');
        $modelExporter->repeat_samples_envisaged = $request->post('repeat_samples_envisaged');
        $modelExporter->repeat_samples_envisaged_yes_no = $request->post('repeat_samples_envisaged_yes_no');
        $modelExporter->specify_purpose_end_use = $request->post('specify_purpose_end_use');
        $modelExporter->specify_purpose_end_use_details = $request->post('specify_purpose_end_use_details');
        $modelExporter->natural_biomaterial_exported_details = $request->post('natural_biomaterial_exported_details');
        $modelExporter->natural_biomaterial_exported_any_tissue_details = $request->post('natural_biomaterial_exported_any_tissue_details');
        $modelExporter->samples_used_research_analysis_yes_no = $request->post('samples_used_research_analysis_yes_no');
        $modelExporter->samples_used_research_analysis_details = $request->post('samples_used_research_analysis_details');
        if (!is_array($request->post('natural_biomaterial_exported'))) {
            $request->request->set('natural_biomaterial_exported', explode(',', $request->post('natural_biomaterial_exported')));
        }
        $modelExporter->natural_biomaterial_exported = implode(',', $request->post('natural_biomaterial_exported'));

        if (!is_array($request->post('sample_collected'))) {
            $request->request->set('sample_collected', explode(',', $request->post('sample_collected')));
        }
        $modelExporter->sample_collected = implode(',', $request->post('sample_collected'));

        if (!is_array($request->post('specify_purpose_end_use'))) {
            $request->request->set('specify_purpose_end_use', explode(',', $request->post('specify_purpose_end_use')));
        }
        $modelExporter->specify_purpose_end_use = implode(',', $request->post('specify_purpose_end_use'));

        if (!is_array($request->post('samples_used_research_analysis'))) {
            $request->request->set('samples_used_research_analysis', explode(',', $request->post('samples_used_research_analysis')));
        }
        $modelExporter->samples_used_research_analysis = implode(',', $request->post('samples_used_research_analysis'));

        if (!is_array($request->post('purpose_sample_store'))) {
            $request->request->set('purpose_sample_store', explode(',', $request->post('purpose_sample_store')));
        }
        $modelExporter->sample_collected_details = $request->post('sample_collected_details');
        $modelExporter->purpose_sample_store = implode(',', $request->post('purpose_sample_store'));
        $modelExporter->purpose_sample_store_details = $request->post('purpose_sample_store_details');
        $modelExporter->leftover_samples_store = $request->post('leftover_samples_store');
        $modelExporter->duration_sample_store = $request->post('duration_sample_store');
        $modelExporter->facility_sample_store = $request->post('facility_sample_store');
        $modelExporter->national_security_angle = $request->post('national_security_angle');
        $modelExporter->leftover_samples_store_yes_no = $request->post('leftover_samples_store_yes_no');
        $modelExporter->national_security_angle_yes_no = $request->post('national_security_angle_yes_no');
        $modelExporter->foreign_country_army_military = $request->post('foreign_country_army_military');
        $modelExporter->foreign_country_army_military_yes_no = $request->post('foreign_country_army_military_yes_no');
        $modelExporter->biomaterial_micro_organisms_approval = $request->post('biomaterial_micro_organisms_approval');

        if ($request->hasfile("biomaterial_micro_organisms_approval_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file);
            }

            $file = $request->file("biomaterial_micro_organisms_approval_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->biomaterial_micro_organisms_approval_file = $file_name;
        }

        if ($request->hasfile("ibsc_rcgm_approval_applicable_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file);
            }

            $file = $request->file("ibsc_rcgm_approval_applicable_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->ibsc_rcgm_approval_applicable_file = $file_name;
        }

        $modelExporter->ibsc_rcgm_approval_applicable = $request->post('ibsc_rcgm_approval_applicable');
        $modelExporter->sender_certify_information_provided = $request->post('sender_certify_information_provided');
        $modelExporter->sender_signature = $request->post('sender_signature');
        $modelExporter->sender_name = $request->post('sender_name');
        $modelExporter->sender_designation = $request->post('sender_designation');
        $modelExporter->sender_address = $request->post('sender_address');
        $modelExporter->sender_date = $request->post('sender_date');
        $modelExporter->recipient_certify_samples_referred = $request->post('recipient_certify_samples_referred');
        $modelExporter->recipient_name_institution = $request->post('recipient_name_institution');
        $modelExporter->recipient_utilized_for_purpose = $request->post('recipient_utilized_for_purpose');
        $modelExporter->recipient_signature = $request->post('recipient_signature');
        $modelExporter->recipient_name = $request->post('recipient_name');
        $modelExporter->recipient_designation = $request->post('recipient_designation');
        $modelExporter->recipient_address = $request->post('recipient_address');
        $modelExporter->recipient_date = $request->post('recipient_date');
		//$modelExporter->declaration_letter = $request->post('declaration_letter');
        if ($request->hasfile("declaration_letter")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->declaration_letter)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->declaration_letter);
            }

            $file = $request->file("declaration_letter");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->declaration_letter = $file_name;
        }

        if ($request->hasfile("certified_copy_proforma")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->certified_copy_proforma)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->certified_copy_proforma);
            }

            $file = $request->file("certified_copy_proforma");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->certified_copy_proforma = $file_name;
        }
        //$modelExporter->status = 1;
        $modelExporter->save();
        Session::flash('message', $msg);
        Session::flash('message1', $msg1);
        Session::flash('message2', $msg3);
        $getImpExp_email = ImpExpUse::where('roll','like','imp-exp')->where('iec_code', $modelExporter['sending_iec_number'])->first();
         $emails = $getImpExp_email->email;
        //dd($emails);

        // $mailData = [
        //     'title' => 'Exporter Form Request sent to ICMR Officer.',
        //     'body' => '',
        //     'sending_iec_number' => $modelExporter['sending_iec_number']
        // ];
        $mailData = [
            'title' => '',
            'body' => '',
            'application_number' => $modelExporter['application_number'],
            'sender_date' => $modelExporter['sender_date'],
        ];

        $ToIcmr_email = ImpExpUse::where('roll','like','icmr')->get();
        foreach ($ToIcmr_email as $record) {
            //$Icmremails[] = $record->email;
            Mail::to($record->email)->cc([$emails])->send(new ExporterMailSubmit($mailData));
        }
        return redirect('imp-exp/exporter');

    }else{
        	$id = Session::get('id');
       // $ip_Address = '';

        // if ($request->post('id') > 0) {
        //     $modelExporter = Exporter::find($request->post('id'));
        //     //dd($modelExporter);
        //     $msg = "Exporter has been updated successfully";
        // } else {
        //     $modelExporter = new Exporter();
        //     // dd($modelExporter);
        //     $msg = "Exporter has been submited successfully";
        // }


        if ($request->post('draftid') > 0) {
                $modelExporter = Exportersdraft::find($request->post('draftid'));

                $application_number = $modelExporter->application_number;
                $msg = "Exporter has been updated successfully";
                $msg1 = "DRAFT/E/".date('Y')."/".$application_number;
                $msg3 = $request->sending_iec_number;
        } else {
                $modelExporter = new Exportersdraft();
                // dd($modelExporter);

                $exporte_data = Exportersdraft::orderBy('id', 'DESC')->get();
                if(!empty($exporte_data[0]->id)){
                    $exporte_id = ($exporte_data[0]->id > 0)? $exporte_data[0]->id + 1 : 1;
                }else{
                    $exporte_id = 1;
                }

                $application_number = sprintf("%05d", $exporte_id);
                $msg = "Application for Export of sample has been submitted successfully";
                $msg1 = "DRAFT/E/".date('Y')."/".$application_number;
                $msg3 = $request->sending_iec_number;

                $modelExporter->application_number = "DRAFT/E/".date('Y')."/".$application_number;
        }
         $modelExporter['user_id'] = $id;
        // $modelExporter['ip_address'] = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->status = '1';
        $modelExporter->sending_applicant_name = $request->post('sending_applicant_name');
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');
        $modelExporter->denied_export_auth_last_3_years_yes_no = $request->post('denied_export_auth_last_3_years_yes_no');

        if ($request->hasfile("upload_comp_institute_denied_export")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export);
            }

            $file = $request->file("upload_comp_institute_denied_export");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            // $file->storeAs("/public/media/banner/slider", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->upload_comp_institute_denied_export = $file_name;
        }
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_receiving_party_yes_no = $request->post('end_user_receiving_party_yes_no');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code = $request->post('hs_code');
        $modelExporter->hs_code_description = $request->post('hs_code_description');
        $modelExporter->sample_collected = $request->post('sample_collected');
        $modelExporter->samples_being_exported = $request->post('samples_being_exported');
        $modelExporter->samples_being_exported_details = $request->post('samples_being_exported_details');
        $modelExporter->exported_number = $request->post('exported_number');
        $modelExporter->exported_volume = $request->post('exported_volume');
        $modelExporter->vol_of_sample_text = $request->post('vol_of_sample_text');
        $modelExporter->repeat_samples_envisaged = $request->post('repeat_samples_envisaged');
        $modelExporter->repeat_samples_envisaged_yes_no = $request->post('repeat_samples_envisaged_yes_no');
        $modelExporter->specify_purpose_end_use = $request->post('specify_purpose_end_use');
        $modelExporter->specify_purpose_end_use_details = $request->post('specify_purpose_end_use_details');
        $modelExporter->natural_biomaterial_exported_details = $request->post('natural_biomaterial_exported_details');
        $modelExporter->natural_biomaterial_exported_any_tissue_details = $request->post('natural_biomaterial_exported_any_tissue_details');
        $modelExporter->samples_used_research_analysis_yes_no = $request->post('samples_used_research_analysis_yes_no');
        $modelExporter->samples_used_research_analysis_details = $request->post('samples_used_research_analysis_details');
        if (!is_array($request->post('natural_biomaterial_exported'))) {
            $request->request->set('natural_biomaterial_exported', explode(',', $request->post('natural_biomaterial_exported')));
        }
        $modelExporter->natural_biomaterial_exported = implode(',', $request->post('natural_biomaterial_exported'));

        if (!is_array($request->post('sample_collected'))) {
            $request->request->set('sample_collected', explode(',', $request->post('sample_collected')));
        }
        $modelExporter->sample_collected = implode(',', $request->post('sample_collected'));

        if (!is_array($request->post('specify_purpose_end_use'))) {
            $request->request->set('specify_purpose_end_use', explode(',', $request->post('specify_purpose_end_use')));
        }
        $modelExporter->specify_purpose_end_use = implode(',', $request->post('specify_purpose_end_use'));

        if (!is_array($request->post('samples_used_research_analysis'))) {
            $request->request->set('samples_used_research_analysis', explode(',', $request->post('samples_used_research_analysis')));
        }
        $modelExporter->samples_used_research_analysis = implode(',', $request->post('samples_used_research_analysis'));

        if (!is_array($request->post('purpose_sample_store'))) {
            $request->request->set('purpose_sample_store', explode(',', $request->post('purpose_sample_store')));
        }
        $modelExporter->sample_collected_details = $request->post('sample_collected_details');
        $modelExporter->purpose_sample_store = implode(',', $request->post('purpose_sample_store'));
        $modelExporter->purpose_sample_store_details = $request->post('purpose_sample_store_details');
        $modelExporter->leftover_samples_store = $request->post('leftover_samples_store');
        $modelExporter->duration_sample_store = $request->post('duration_sample_store');
        $modelExporter->facility_sample_store = $request->post('facility_sample_store');
        $modelExporter->national_security_angle = $request->post('national_security_angle');
        $modelExporter->leftover_samples_store_yes_no = $request->post('leftover_samples_store_yes_no');
        $modelExporter->national_security_angle_yes_no = $request->post('national_security_angle_yes_no');
        $modelExporter->foreign_country_army_military = $request->post('foreign_country_army_military');
        $modelExporter->foreign_country_army_military_yes_no = $request->post('foreign_country_army_military_yes_no');
        $modelExporter->biomaterial_micro_organisms_approval = $request->post('biomaterial_micro_organisms_approval');

        if ($request->hasfile("biomaterial_micro_organisms_approval_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file);
            }

            $file = $request->file("biomaterial_micro_organisms_approval_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->biomaterial_micro_organisms_approval_file = $file_name;
        }

        if ($request->hasfile("ibsc_rcgm_approval_applicable_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file);
            }

            $file = $request->file("ibsc_rcgm_approval_applicable_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->ibsc_rcgm_approval_applicable_file = $file_name;
        }

        $modelExporter->ibsc_rcgm_approval_applicable = $request->post('ibsc_rcgm_approval_applicable');
        $modelExporter->sender_certify_information_provided = $request->post('sender_certify_information_provided');
        $modelExporter->sender_signature = $request->post('sender_signature');
        $modelExporter->sender_name = $request->post('sender_name');
        $modelExporter->sender_designation = $request->post('sender_designation');
        $modelExporter->sender_address = $request->post('sender_address');
        $modelExporter->sender_date = $request->post('sender_date');
        $modelExporter->recipient_certify_samples_referred = $request->post('recipient_certify_samples_referred');
        $modelExporter->recipient_name_institution = $request->post('recipient_name_institution');
        $modelExporter->recipient_utilized_for_purpose = $request->post('recipient_utilized_for_purpose');
        $modelExporter->recipient_signature = $request->post('recipient_signature');
        $modelExporter->recipient_name = $request->post('recipient_name');
        $modelExporter->recipient_designation = $request->post('recipient_designation');
        $modelExporter->recipient_address = $request->post('recipient_address');
        $modelExporter->recipient_date = $request->post('recipient_date');
		//$modelExporter->declaration_letter = $request->post('declaration_letter');
        if ($request->hasfile("declaration_letter")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->declaration_letter)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->declaration_letter);
            }

            $file = $request->file("declaration_letter");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->declaration_letter = $file_name;
        }

        if ($request->hasfile("certified_copy_proforma")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->certified_copy_proforma)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->certified_copy_proforma);
            }

            $file = $request->file("certified_copy_proforma");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->certified_copy_proforma = $file_name;
        }
        //$modelExporter->status = 1;
        $modelExporter->save();
        Session::flash('message', $msg);
        Session::flash('message1', $msg1);
        Session::flash('message2', $msg3);
        // $getImpExp_email = ImpExpUse::where('roll','like','imp-exp')->where('iec_code', $modelExporter['sending_iec_number'])->first();
        //  $emails = $getImpExp_email->email;
        // //dd($emails);

        // $mailData = [
        //     'title' => 'Exporter Form Request sent to ICMR Officer',
        //     'body' => '',
        //     'sending_iec_number' => $modelExporter['sending_iec_number']
        // ];

        // $ToIcmr_email = ImpExpUse::where('roll','like','icmr')->get();
        // foreach ($ToIcmr_email as $record) {
        //     //$Icmremails[] = $record->email;
        //     Mail::to($record->email)->cc([$emails])->send(new ExporterMailSubmit($mailData));
        // }
        return redirect('imp-exp/exporter/draft');

    }
    }

    public function manage_exporter_process08_03_24(Request $request, $id='')
    {
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        // $data = $request->post();
        // echo "<pre/>";
        // print_r($data);
        // die;

        // $request->validate([
        //     "biomaterial_micro_organisms_approval"=>"mimes:pdf|max:100",
        //     "ibsc_rcgm_approval_applicable"=>"mimes:pdf|max:100"
        // ]);

      	$id = Session::get('id');
       // $ip_Address = '';
       $exporte_data = Exporter::orderBy('id', 'DESC')->get();
       if(!empty($exporte_data[0]->id)){
        $exporte_id = ($exporte_data[0]->id > 0)? $exporte_data[0]->id + 1 : 1;
       }else{
        $exporte_id = 1;
       }

       $application_number = sprintf("%05d", $exporte_id);
        // if ($request->post('id') > 0) {
        //     $modelExporter = Exporter::find($request->post('id'));
        //     //dd($modelExporter);
        //     $msg = "Exporter has been updated successfully";
        // } else {
        //     $modelExporter = new Exporter();
        //     // dd($modelExporter);
        //     $msg = "Exporter has been submited successfully";
        // }
        if ($request->post('id') > 0) {
            $modelExporter = Exporter::find($request->post('id'));
            //dd($modelExporter);
            $msg = "Exporter has been updated successfully";
            $msg1 = "ICMR/EXPORT/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        } else {
            $modelExporter = new Exporter();
            // dd($modelExporter);
            $msg = "Application for export of sample has been submitted successfully";
            $msg1 = "ICMR/EXPORT/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        }
         $modelExporter['user_id'] = $id;
        // $modelExporter['ip_address'] = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->application_number = "ICMR/EXPORT/".date('Y')."/".$application_number;
        $modelExporter->sending_applicant_name = $request->post('sending_applicant_name');
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');
        $modelExporter->denied_export_auth_last_3_years_yes_no = $request->post('denied_export_auth_last_3_years_yes_no');

        if ($request->hasfile("upload_comp_institute_denied_export")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export);
            }

            $file = $request->file("upload_comp_institute_denied_export");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            // $file->storeAs("/public/media/banner/slider", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->upload_comp_institute_denied_export = $file_name;
        }
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_receiving_party_yes_no = $request->post('end_user_receiving_party_yes_no');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code = $request->post('hs_code');
        $modelExporter->hs_code_description = $request->post('hs_code_description');
        $modelExporter->sample_collected = $request->post('sample_collected');
        $modelExporter->samples_being_exported = $request->post('samples_being_exported');
        $modelExporter->samples_being_exported_details = $request->post('samples_being_exported_details');
        $modelExporter->exported_number = $request->post('exported_number');
        $modelExporter->exported_volume = $request->post('exported_volume');
        $modelExporter->vol_of_sample_text = $request->post('vol_of_sample_text');
        $modelExporter->repeat_samples_envisaged = $request->post('repeat_samples_envisaged');
        $modelExporter->repeat_samples_envisaged_yes_no = $request->post('repeat_samples_envisaged_yes_no');
        $modelExporter->specify_purpose_end_use = $request->post('specify_purpose_end_use');
        $modelExporter->specify_purpose_end_use_details = $request->post('specify_purpose_end_use_details');
        $modelExporter->natural_biomaterial_exported_details = $request->post('natural_biomaterial_exported_details');
        $modelExporter->samples_used_research_analysis_yes_no = $request->post('samples_used_research_analysis_yes_no');
        $modelExporter->samples_used_research_analysis_details = $request->post('samples_used_research_analysis_details');
        if (!is_array($request->post('natural_biomaterial_exported'))) {
            $request->request->set('natural_biomaterial_exported', explode(',', $request->post('natural_biomaterial_exported')));
        }
        $modelExporter->natural_biomaterial_exported = implode(',', $request->post('natural_biomaterial_exported'));

        if (!is_array($request->post('sample_collected'))) {
            $request->request->set('sample_collected', explode(',', $request->post('sample_collected')));
        }
        $modelExporter->sample_collected = implode(',', $request->post('sample_collected'));

        if (!is_array($request->post('specify_purpose_end_use'))) {
            $request->request->set('specify_purpose_end_use', explode(',', $request->post('specify_purpose_end_use')));
        }
        $modelExporter->specify_purpose_end_use = implode(',', $request->post('specify_purpose_end_use'));

        if (!is_array($request->post('samples_used_research_analysis'))) {
            $request->request->set('samples_used_research_analysis', explode(',', $request->post('samples_used_research_analysis')));
        }
        $modelExporter->samples_used_research_analysis = implode(',', $request->post('samples_used_research_analysis'));

        if (!is_array($request->post('purpose_sample_store'))) {
            $request->request->set('purpose_sample_store', explode(',', $request->post('purpose_sample_store')));
        }
        $modelExporter->sample_collected_details = $request->post('sample_collected_details');
        $modelExporter->purpose_sample_store = implode(',', $request->post('purpose_sample_store'));
        $modelExporter->purpose_sample_store_details = $request->post('purpose_sample_store_details');
        $modelExporter->leftover_samples_store = $request->post('leftover_samples_store');
        $modelExporter->duration_sample_store = $request->post('duration_sample_store');
        $modelExporter->facility_sample_store = $request->post('facility_sample_store');
        $modelExporter->national_security_angle = $request->post('national_security_angle');
        $modelExporter->national_security_angle_yes_no = $request->post('national_security_angle_yes_no');
        $modelExporter->foreign_country_army_military = $request->post('foreign_country_army_military');
        $modelExporter->foreign_country_army_military_yes_no = $request->post('foreign_country_army_military_yes_no');
        $modelExporter->biomaterial_micro_organisms_approval = $request->post('biomaterial_micro_organisms_approval');

        if ($request->hasfile("biomaterial_micro_organisms_approval_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file);
            }

            $file = $request->file("biomaterial_micro_organisms_approval_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->biomaterial_micro_organisms_approval_file = $file_name;
        }

        if ($request->hasfile("ibsc_rcgm_approval_applicable_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file);
            }

            $file = $request->file("ibsc_rcgm_approval_applicable_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->ibsc_rcgm_approval_applicable_file = $file_name;
        }

        $modelExporter->ibsc_rcgm_approval_applicable = $request->post('ibsc_rcgm_approval_applicable');
        $modelExporter->sender_certify_information_provided = $request->post('sender_certify_information_provided');
        $modelExporter->sender_signature = $request->post('sender_signature');
        $modelExporter->sender_name = $request->post('sender_name');
        $modelExporter->sender_designation = $request->post('sender_designation');
        $modelExporter->sender_address = $request->post('sender_address');
        $modelExporter->sender_date = $request->post('sender_date');
        $modelExporter->recipient_certify_samples_referred = $request->post('recipient_certify_samples_referred');
        $modelExporter->recipient_name_institution = $request->post('recipient_name_institution');
        $modelExporter->recipient_utilized_for_purpose = $request->post('recipient_utilized_for_purpose');
        $modelExporter->recipient_signature = $request->post('recipient_signature');
        $modelExporter->recipient_name = $request->post('recipient_name');
        $modelExporter->recipient_designation = $request->post('recipient_designation');
        $modelExporter->recipient_address = $request->post('recipient_address');
        $modelExporter->recipient_date = $request->post('recipient_date');
		//$modelExporter->declaration_letter = $request->post('declaration_letter');
        if ($request->hasfile("declaration_letter")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->declaration_letter)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->declaration_letter);
            }

            $file = $request->file("declaration_letter");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->declaration_letter = $file_name;
        }

        if ($request->hasfile("certified_copy_proforma")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->certified_copy_proforma)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->certified_copy_proforma);
            }

            $file = $request->file("certified_copy_proforma");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->certified_copy_proforma = $file_name;
        }
        //$modelExporter->status = 1;
        $modelExporter->save();
        Session::flash('message', $msg);
        Session::flash('message1', $msg1);
        Session::flash('message2', $msg3);
        $getImpExp_email = ImpExpUse::where('roll','like','imp-exp')->where('iec_code', $modelExporter['sending_iec_number'])->first();
         $emails = $getImpExp_email->email;
        //dd($emails);

        $mailData = [
            'title' => 'Exporter Form Request sent to ICMR Officer',
            'body' => '',
            'sending_iec_number' => $modelExporter['sending_iec_number']
        ];

        $ToIcmr_email = ImpExpUse::where('roll','like','icmr')->get();
        foreach ($ToIcmr_email as $record) {
            //$Icmremails[] = $record->email;
            Mail::to($record->email)->cc([$emails])->send(new ExporterMailSubmit($mailData));
        }
        return redirect('imp-exp/exporter');
    }
    public function manage_exporter_process02_03(Request $request, $id='')
    {
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        // $data = $request->post();
        // echo "<pre/>";
        // print_r($data);
        // die;

        // $request->validate([
        //     "biomaterial_micro_organisms_approval"=>"mimes:pdf|max:100",
        //     "ibsc_rcgm_approval_applicable"=>"mimes:pdf|max:100"
        // ]);

      	$id = Session::get('id');
       // $ip_Address = '';
       $application_number=substr(str_shuffle('0123456789'), 0, 6);
        // if ($request->post('id') > 0) {
        //     $modelExporter = Exporter::find($request->post('id'));
        //     //dd($modelExporter);
        //     $msg = "Exporter has been updated successfully";
        // } else {
        //     $modelExporter = new Exporter();
        //     // dd($modelExporter);
        //     $msg = "Exporter has been submited successfully";
        // }
        if ($request->post('id') > 0) {
            $modelExporter = Exporter::find($request->post('id'));
            //dd($modelExporter);
            $msg = "Exporter has been updated successfully";
            $msg1 = "ICMR/EXPORT/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        } else {
            $modelExporter = new Exporter();
            // dd($modelExporter);
            // $msg = "Exporter has been submited successfully";
            $msg ="The Application has been submitted successfully. Please check The Mail.";
            $msg1 = "ICMR/EXPORT/".date('Y')."/".$application_number;
            $msg3 = $request->sending_iec_number;
        }
         $modelExporter['user_id'] = $id;
        // $modelExporter['ip_address'] = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->application_number = "ICMR/EXPORT/".date('Y')."/".$application_number;
        $modelExporter->sending_applicant_name = $request->post('sending_applicant_name');
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');

		$modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');

        if ($request->hasfile("upload_comp_institute_denied_export")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export);
            }

            $file = $request->file("upload_comp_institute_denied_export");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            // $file->storeAs("/public/media/banner/slider", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->upload_comp_institute_denied_export = $file_name;
        }
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code = $request->post('hs_code');
        $modelExporter->hs_code_description = $request->post('hs_code_description');
        $modelExporter->sample_collected = $request->post('sample_collected');
        $modelExporter->samples_being_exported = $request->post('samples_being_exported');
        $modelExporter->samples_being_exported_details = $request->post('samples_being_exported_details');
        $modelExporter->exported_number = $request->post('exported_number');
        $modelExporter->exported_volume = $request->post('exported_volume');
        $modelExporter->repeat_samples_envisaged = $request->post('repeat_samples_envisaged');
        $modelExporter->specify_purpose_end_use = $request->post('specify_purpose_end_use');
        $modelExporter->natural_biomaterial_exported_details = $request->post('natural_biomaterial_exported_details');
        if (!is_array($request->post('natural_biomaterial_exported'))) {
            $request->request->set('natural_biomaterial_exported', explode(',', $request->post('natural_biomaterial_exported')));
        }
        $modelExporter->natural_biomaterial_exported = implode(',', $request->post('natural_biomaterial_exported'));

        if (!is_array($request->post('sample_collected'))) {
            $request->request->set('sample_collected', explode(',', $request->post('sample_collected')));
        }
        $modelExporter->sample_collected = implode(',', $request->post('sample_collected'));

        if (!is_array($request->post('specify_purpose_end_use'))) {
            $request->request->set('specify_purpose_end_use', explode(',', $request->post('specify_purpose_end_use')));
        }
        $modelExporter->specify_purpose_end_use = implode(',', $request->post('specify_purpose_end_use'));

        if (!is_array($request->post('samples_used_research_analysis'))) {
            $request->request->set('samples_used_research_analysis', explode(',', $request->post('samples_used_research_analysis')));
        }
        $modelExporter->samples_used_research_analysis = implode(',', $request->post('samples_used_research_analysis'));

        if (!is_array($request->post('purpose_sample_store'))) {
            $request->request->set('purpose_sample_store', explode(',', $request->post('purpose_sample_store')));
        }
        $modelExporter->sample_collected_details = $request->post('sample_collected_details');
        $modelExporter->purpose_sample_store = implode(',', $request->post('purpose_sample_store'));
        $modelExporter->leftover_samples_store = $request->post('leftover_samples_store');
        $modelExporter->duration_sample_store = $request->post('duration_sample_store');
        $modelExporter->facility_sample_store = $request->post('facility_sample_store');
        $modelExporter->national_security_angle = $request->post('national_security_angle');
        $modelExporter->foreign_country_army_military = $request->post('foreign_country_army_military');
        $modelExporter->biomaterial_micro_organisms_approval = $request->post('biomaterial_micro_organisms_approval');

        if ($request->hasfile("biomaterial_micro_organisms_approval_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval_file);
            }

            $file = $request->file("biomaterial_micro_organisms_approval_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->biomaterial_micro_organisms_approval_file = $file_name;
        }

        if ($request->hasfile("ibsc_rcgm_approval_applicable_file")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable_file);
            }

            $file = $request->file("ibsc_rcgm_approval_applicable_file");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->ibsc_rcgm_approval_applicable_file = $file_name;
        }

        $modelExporter->ibsc_rcgm_approval_applicable = $request->post('ibsc_rcgm_approval_applicable');
        $modelExporter->sender_certify_information_provided = $request->post('sender_certify_information_provided');
        $modelExporter->sender_signature = $request->post('sender_signature');
        $modelExporter->sender_name = $request->post('sender_name');
        $modelExporter->sender_designation = $request->post('sender_designation');
        $modelExporter->sender_address = $request->post('sender_address');
        $modelExporter->sender_date = $request->post('sender_date');
        $modelExporter->recipient_certify_samples_referred = $request->post('recipient_certify_samples_referred');
        $modelExporter->recipient_name_institution = $request->post('recipient_name_institution');
        $modelExporter->recipient_utilized_for_purpose = $request->post('recipient_utilized_for_purpose');
        $modelExporter->recipient_signature = $request->post('recipient_signature');
        $modelExporter->recipient_name = $request->post('recipient_name');
        $modelExporter->recipient_designation = $request->post('recipient_designation');
        $modelExporter->recipient_address = $request->post('recipient_address');
        $modelExporter->recipient_date = $request->post('recipient_date');
		//$modelExporter->declaration_letter = $request->post('declaration_letter');
        if ($request->hasfile("declaration_letter")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->declaration_letter)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->declaration_letter);
            }

            $file = $request->file("declaration_letter");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->declaration_letter = $file_name;
        }

        if ($request->hasfile("certified_copy_proforma")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->certified_copy_proforma)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->certified_copy_proforma);
            }

            $file = $request->file("certified_copy_proforma");
            $extFile = $file->extension();
            $file_name = rand(100,999)."-".time() . "." . $extFile;
            //$file->storeAs("/public/media/exporter", $file_name);
            $file->move(public_path('media/exporter'), $file_name);
            $modelExporter->certified_copy_proforma = $file_name;
        }
        //$modelExporter->status = 1;
        $modelExporter->save();
        Session::flash('message', $msg);
        Session::flash('message1', $msg1);
        Session::flash('message2', $msg3);
        $getImpExp_email = ImpExpUse::where('roll','like','imp-exp')->where('iec_code', $modelExporter['sending_iec_number'])->first();
         $emails = $getImpExp_email->email;
        //dd($emails);

        $mailData = [
            'title' => '',
            'body' => '',
            'sending_iec_number' => $modelExporter['sending_iec_number']
        ];

        $ToIcmr_email = ImpExpUse::where('roll','like','icmr')->get();
        foreach ($ToIcmr_email as $record) {
            //$Icmremails[] = $record->email;
            Mail::to($record->email)->cc([$emails])->send(new ExporterMailSubmit($mailData));
        }
        //dd($Icmremails);

        //$cc = 'web.aloksingh8190@gmail.com';
        //Mail::to($Icmremails[] = $record->email)->cc([$cc])->send(new ExporterMailSubmit($mailData));
        // foreach (['aashishsingh6996@gmail.com', 'web.aloksingh8190@gmail.com'] as $recipient) {
        //     Mail::to($recipient)->cc(['web.aloksingh8190@gmail.com'])->send(new ExporterMailSubmit($mailData));
        // }
        //dd('Mail Sent successfully');
        return redirect('imp-exp/exporter');
    }


    /**
     * Store a newly process resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_exporter_process_old(Request $request, $id='')
    {
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        // $data = $request->post();
        // echo "<pre/>";
        // print_r($data);
        // die;

        // $request->validate([
        //     "biomaterial_micro_organisms_approval"=>"mimes:pdf|max:100",
        //     "ibsc_rcgm_approval_applicable"=>"mimes:pdf|max:100"
        // ]);

      	$id = Session::get('id');
       // $ip_Address = '';
       $application_number=substr(str_shuffle('0123456789'), 0, 6);
        if ($request->post('id') > 0) {
            $modelExporter = Exporter::find($request->post('id'));
            //dd($modelExporter);
            $msg = "Exporter has been updated successfully";
        } else {
            $modelExporter = new Exporter();
            // dd($modelExporter);
            $msg = "Exporter Application has been submited successfully";
        }
         $modelExporter['user_id'] = $id;
        // $modelExporter['ip_address'] = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->application_number = "ICMR/EXPORT/".date('Y')."/".$application_number;
        $modelExporter->sending_applicant_name = $request->post('sending_applicant_name');
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');

		$modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');

        if ($request->hasfile("upload_comp_institute_denied_export")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->upload_comp_institute_denied_export);
            }

            $file = $request->file("upload_comp_institute_denied_export");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/exporter", $file_name);
            $modelExporter->upload_comp_institute_denied_export = $file_name;
        }
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code = $request->post('hs_code');
        $modelExporter->sample_collected = $request->post('sample_collected');
        $modelExporter->samples_being_exported = $request->post('samples_being_exported');
        $modelExporter->exported_number = $request->post('exported_number');
        $modelExporter->exported_volume = $request->post('exported_volume');
        $modelExporter->repeat_samples_envisaged = $request->post('repeat_samples_envisaged');
        $modelExporter->specify_purpose_end_use = $request->post('specify_purpose_end_use');

        if (!is_array($request->post('natural_biomaterial_exported'))) {
            $request->request->set('natural_biomaterial_exported', explode(',', $request->post('natural_biomaterial_exported')));
        }
        $modelExporter->natural_biomaterial_exported = implode(',', $request->post('natural_biomaterial_exported'));

        if (!is_array($request->post('sample_collected'))) {
            $request->request->set('sample_collected', explode(',', $request->post('sample_collected')));
        }
        $modelExporter->sample_collected = implode(',', $request->post('sample_collected'));

        if (!is_array($request->post('specify_purpose_end_use'))) {
            $request->request->set('specify_purpose_end_use', explode(',', $request->post('specify_purpose_end_use')));
        }
        $modelExporter->specify_purpose_end_use = implode(',', $request->post('specify_purpose_end_use'));

        if (!is_array($request->post('samples_used_research_analysis'))) {
            $request->request->set('samples_used_research_analysis', explode(',', $request->post('samples_used_research_analysis')));
        }
        $modelExporter->samples_used_research_analysis = implode(',', $request->post('samples_used_research_analysis'));

        if (!is_array($request->post('purpose_sample_store'))) {
            $request->request->set('purpose_sample_store', explode(',', $request->post('purpose_sample_store')));
        }
        $modelExporter->purpose_sample_store = implode(',', $request->post('purpose_sample_store'));
        $modelExporter->leftover_samples_store = $request->post('leftover_samples_store');
        $modelExporter->duration_sample_store = $request->post('duration_sample_store');
        $modelExporter->facility_sample_store = $request->post('facility_sample_store');
        $modelExporter->national_security_angle = $request->post('national_security_angle');
        $modelExporter->foreign_country_army_military = $request->post('foreign_country_army_military');

        if ($request->hasfile("biomaterial_micro_organisms_approval")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->biomaterial_micro_organisms_approval);
            }

            $file = $request->file("biomaterial_micro_organisms_approval");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/exporter", $file_name);
            $modelExporter->biomaterial_micro_organisms_approval = $file_name;
        }

        if ($request->hasfile("ibsc_rcgm_approval_applicable")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->ibsc_rcgm_approval_applicable);
            }

            $file = $request->file("ibsc_rcgm_approval_applicable");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/exporter", $file_name);
            $modelExporter->ibsc_rcgm_approval_applicable = $file_name;
        }

        // $modelExporter->ibsc_rcgm_approval_applicable = $request->post('ibsc_rcgm_approval_applicable');
        $modelExporter->sender_certify_information_provided = $request->post('sender_certify_information_provided');
        $modelExporter->sender_signature = $request->post('sender_signature');
        $modelExporter->sender_name = $request->post('sender_name');
        $modelExporter->sender_designation = $request->post('sender_designation');
        $modelExporter->sender_address = $request->post('sender_address');
        $modelExporter->sender_date = $request->post('sender_date');
        $modelExporter->recipient_certify_samples_referred = $request->post('recipient_certify_samples_referred');
        $modelExporter->recipient_name_institution = $request->post('recipient_name_institution');
        $modelExporter->recipient_utilized_for_purpose = $request->post('recipient_utilized_for_purpose');
        $modelExporter->recipient_signature = $request->post('recipient_signature');
        $modelExporter->recipient_name = $request->post('recipient_name');
        $modelExporter->recipient_designation = $request->post('recipient_designation');
        $modelExporter->recipient_address = $request->post('recipient_address');
        $modelExporter->recipient_date = $request->post('recipient_date');
		$modelExporter->declaration_letter = $request->post('declaration_letter');
        if ($request->hasfile("declaration_letter")) {
            if (Storage::exists("/public/media/exporter/" . $modelExporter->declaration_letter)) {
                Storage::delete("/public/media/exporter/" . $modelExporter->declaration_letter);
            }

            $file = $request->file("declaration_letter");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/exporter", $file_name);
            $modelExporter->declaration_letter = $file_name;
        }
        //$modelExporter->status = 1;
        $modelExporter->save();
        Session::flash('message', $msg);
         $getImpExp_email = ImpExpUse::where('roll','like','imp-exp')->get();
         $emails = [];
        foreach ($getImpExp_email as $record) {
            $emails[] = $record->email;
        }
        $getIcmr_email = ImpExpUse::where('roll','like','icmr')->get();
         $Icmremails = [];
        foreach ($getIcmr_email as $record) {
            $Icmremails[] = $record->email;
        }
        $mailData = [
            'title' => '',
            'body' => '',
            'sending_iec_number' => $modelExporter['sending_iec_number']
        ];

        Mail::to($Icmremails[] = $record->email)->cc([$Icmremails[] = $record->email])->send(new ExporterMailSubmit($mailData));
        // foreach (['aashishsingh6996@gmail.com', 'web.aloksingh8190@gmail.com'] as $recipient) {
        //     Mail::to($recipient)->cc(['web.aloksingh8190@gmail.com'])->send(new ExporterMailSubmit($mailData));
        // }
        dd('Mail Sent successfully');
        return redirect('imp-exp/exporter');
    }

    /**
     * Display the Delete resource.
     *
     * @param  \App\Models\HumanSample  $humanSample
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->delete();
        Session::flash('message', 'Exporter has been deleted successfully');
        return redirect('imp-exp/exporter');
    }

    /**
     * Show the form for Status the specified resource.
     *
     * @param  \App\Models\Exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $status, $id)
    {
		if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->status = $status;
        $modelExporter->save();
        Session::flash('message', 'Exporter has been status updated successfully');

        return redirect('imp-exp/exporter');
    }

	public function downloadnoc()
	{
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
	return view('impexp/downloadnoc');
	}


    public function getHsCodeDataExp(Request $request)
    {
        $allHs_records =$request->all();
        $hs_Code = $allHs_records['hs_code'];
        $getHS_Codes = HsCode::where('hs_code',$hs_Code)->first();

        if(!$getHS_Codes)
        {
            return response()->json('error','Hs Code not found');
        }else{
            return response()->json($getHS_Codes);
        }
    }
	public function preview(Request $request,$id){

		if(empty(Session::get('roll')=='imp-exp')){
			return redirect('imp-exp/login');
		  }

		 $export_data = Exporter::find($id);
		return view('impexp.exporter.preview',compact('export_data'));
		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}

        public function previewExpPdf(Request $request, $id)
        {
		    if(empty(Session::get('roll')=='imp-exp')){
		    return redirect('imp-exp/login');
	        }

            $export_data = Exporter::find($id);
            $pdf = PDF::loadView('impexp.exporter.preview_form_exporter', compact('export_data'));
            //print_r($pdf);die;
            //return $pdf->download('preview-exporter.pdf',$export_data->id);
            return view('impexp.exporter.preview_form_exporter', compact('export_data'));
        }
}

