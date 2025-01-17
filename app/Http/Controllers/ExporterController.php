<?php

namespace App\Http\Controllers;
use App\Models\Exporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check())
        {
           $clientIP = request()->ip();
           $clientIP;
            $ResultExporter['dataExporters'] = Exporter::all();
            // $ResultExporter['dataExporters'] = Exporter::orderBy('id', 'desc')->paginate(3);
            return view('admin.exporter.exporter', $ResultExporter);
        }

        return redirect('login')->with('success', 'you are not allowed to access');
    }

	public function exportapi(Request $request)
	{
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
        if (Auth::check())
        {
        if ($id > 0) {
            $ArrExporter = Exporter::where(['id' => $id])->get();


            $ResultExporter['sending_iec_number'] = $ArrExporter['0']->sending_iec_number;
            $ResultExporter['sending_applicant_name'] = $ArrExporter['0']->sending_applicant_name;
            $ResultExporter['sending_applicant_design'] = $ArrExporter['0']->sending_applicant_design;
            $ResultExporter['sending_add_company_institute'] = $ArrExporter['0']->sending_add_company_institute;
            $ResultExporter['comp_institute_denied_export_auth_last_3_years'] = $ArrExporter['0']->comp_institute_denied_export_auth_last_3_years;
            $ResultExporter['receving_recipient_name'] = $ArrExporter['0']->receving_recipient_name;
            $ResultExporter['receving_recipient_design'] = $ArrExporter['0']->receving_recipient_design;
            $ResultExporter['receiving_add_company_institute'] = $ArrExporter['0']->receiving_add_company_institute;
            $ResultExporter['end_user_receiving_party'] = $ArrExporter['0']->end_user_receiving_party;
            $ResultExporter['end_user_name'] = $ArrExporter['0']->end_user_name;
            $ResultExporter['end_user_address'] = $ArrExporter['0']->end_user_address;
            $ResultExporter['hs_code_item_exported'] = $ArrExporter['0']->hs_code_item_exported;
            $ResultExporter['natural_biomaterial_exported'] = $ArrExporter['0']->natural_biomaterial_exported;
            $ResultExporter['sample_collected'] = $ArrExporter['0']->sample_collected;
            $ResultExporter['samples_being_exported'] = $ArrExporter['0']->sampes_being_exported;
            $ResultExporter['exported_number'] = $ArrExporter['0']->exported_number;
            $ResultExporter['exported_volume'] = $ArrExporter['0']->exported_volume;
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

        } else {

            $ResultExporter['sending_iec_number'] = '';
            $ResultExporter['sending_applicant_name'] = '';
            $ResultExporter['sending_applicant_design'] = '';
            $ResultExporter['sending_add_company_institute'] = '';
            $ResultExporter['comp_institute_denied_export_auth_last_3_years'] = '';
            $ResultExporter['receving_recipient_name'] = '';
            $ResultExporter['receving_recipient_design'] = '';
            $ResultExporter['receiving_add_company_institute'] = '';
            $ResultExporter['end_user_receiving_party'] = '';
            $ResultExporter['end_user_name'] = '';
            $ResultExporter['end_user_address'] = '';
            $ResultExporter['hs_code_item_exported'] = '';
            $ResultExporter['natural_biomaterial_exported'] = '';
            $ResultExporter['sample_collected'] = '';
            $ResultExporter['specify_purpose_end_use'] = '';
            $ResultExporter['samples_used_research_analysis'] = '';
            $ResultExporter['samples_being_exported'] = '';
            $ResultExporter['exported_number'] = '';
            $ResultExporter['exported_volume'] = '';
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
            // $ResultExporter["natural_biomaterial"] =DB::table("exporters")
            //                 ->where(["status" => 0])->get();
        }
        return view('admin.exporter.manage_exporter',$ResultExporter);
    }
    return redirect('login')->with('success', 'you are not allowed to access');
    }
    /**
     * Store a newly process resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_exporter_process(Request $request, $id='')
    {
        // $data = $request->post();
        // echo "<pre/>";
        // print_r($data);
        // die;

        $request->validate([
            "biomaterial_micro_organisms_approval"=>"mimes:pdf|max:100",
            "ibsc_rcgm_approval_applicable"=>"mimes:pdf|max:100"
        ]);

        $session_id = Auth::id();
        $ip_Address = '';
        if ($request->post('id') > 0) {
            $modelExporter = Exporter::find($request->post('id'));
            $msg = "Exporter has been updated successfully";
        } else {
            $modelExporter = new Exporter();
            $msg = "Exporter has been submited successfully";
        }
        $modelExporter->user_id = $session_id;
        $modelExporter->ip_address = $ip_Address;
        $modelExporter->sending_iec_number = $request->post('sending_iec_number');
        $modelExporter->sending_applicant_name = $request->post('sending_applicant_name');
        $modelExporter->sending_applicant_design = $request->post('sending_applicant_design');
        $modelExporter->sending_add_company_institute = $request->post('sending_add_company_institute');
        $modelExporter->comp_institute_denied_export_auth_last_3_years = $request->post('comp_institute_denied_export_auth_last_3_years');
        $modelExporter->receving_recipient_name = $request->post('receving_recipient_name');
        $modelExporter->receving_recipient_design = $request->post('receving_recipient_design');
        $modelExporter->receiving_add_company_institute = $request->post('receiving_add_company_institute');
        $modelExporter->end_user_receiving_party = $request->post('end_user_receiving_party');
        $modelExporter->end_user_name = $request->post('end_user_name');
        $modelExporter->end_user_address = $request->post('end_user_address');
        $modelExporter->hs_code_item_exported = $request->post('hs_code_item_exported');
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

        $modelExporter->status = 1;
        $modelExporter->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/exporter');
    }

    /**
     * Display the Delete resource.
     *
     * @param  \App\Models\HumanSample  $humanSample
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $modelExporter = Exporter::find($id);
        $modelExporter->delete();
        $request->session()->flash('message', 'Exporter has been deleted successfully');
        return redirect('admin/exporter');
    }

    /**
     * Show the form for Status the specified resource.
     *
     * @param  \App\Models\Exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $status, $id)
    {
        $modelExporter = Exporter::find($id);
        $modelExporter->status = $status;
        $modelExporter->save();
        $request->session()->flash('message', 'Exporter has been status updated successfully');

        return redirect('admin/exporter');
    }
	
	
}
