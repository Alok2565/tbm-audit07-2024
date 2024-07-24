<?php

namespace App\Http\Controllers\impexp;
//use App\Http\Requests;
use Validator;
use App\Models\HsCode;
use App\Models\Import;
use App\Models\Exporter;
use App\Models\Exportersdraft;
use App\Models\ImpExpUse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{

	public function dashboard(Request $request)
	{
	 if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
	  $iec_code = Session::get('iec_code');

	  $totalImport = Import::where('iec_number', $iec_code)->count();

	  /* $totalExporter = Exporter::where('sending_iec_number', $iec_code)->count();
	   $pendingExporter = Exporter::where('sending_iec_number', $iec_code)
	  ->where('status', 0)->where('icmr_noc_status', 0)->count(); */
	  
	  $totalExporter = Exporter::where('sending_iec_number', $iec_code)
	  ->where('status', 0)->where('icmr_off_status', 0)->where('icmr_noc_status', 0)->count();
	   $pendingExporter = Exporter::where('sending_iec_number', $iec_code)
	  ->where('status', 0)->where('icmr_off_status', 1)->where('icmr_noc_status', 0)->count();
	  
	  
	  $rejectExporter = Exporter::where('sending_iec_number', $iec_code)
	  ->where('status', 1)->where('icmr_off_status', 0)->count();
	 $noccomplete = Exporter::where('sending_iec_number', $iec_code)
	  ->where('icmr_noc_status', 1)->count();
      $drafts = Exportersdraft::where('sending_iec_number', $iec_code)->where('status', '1')->count();
	return view('impexp/dashboard',compact('drafts','totalImport','pendingExporter','totalExporter','rejectExporter','noccomplete'));
	}

    public function view(){
     if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	// $Import = Import::all();
    $iec_code = Session::get('iec_code');
	$Import = Import::where('iec_number', $iec_code)->orderBy('id', 'desc')->get();
	return view('impexp/import/view',compact('Import'));

    return redirect('login')->with('success', 'you are not allowed to access');
	}

	public function add(){
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	 $iec_code = Session::get('iec_code');

	$ieccode =  ImpExpUse::where('iec_code', $iec_code)->first();

	 //print_r($ieccode); die;

	return view('impexp/import/add',compact('ieccode'));

    return redirect('login')->with('success', 'you are not allowed to access');
	}

	public function importapi(Request $request)
	{
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
		$attt = $request->all();
		$iec = $attt['iec_number'];
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

	public function creates(Request $request)
    {
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	    //$request->validate([
           // "biological_material" => "required|mimes:pdf|max:50000"
        //]);

		  $id = Session::get('id');
		//echo"$session_id"; die;
		//$ip_address = $_SERVER['SERVER_ADDR'];
        $application_number=substr(str_shuffle('0123456789'), 0, 6);
		$student = new Import;
	    $student->userid = $id;
		$student->iec_number = $request->input('iec_number');
        $student->application_number = "ICMR/IMPORT/".date('Y')."/".$application_number;
        $student->name_of_applicant = $request->input('name_of_applicant');
        $student->name_of_designation = $request->input('name_of_designation');
        $student->address_company = $request->input('address_company');
		$student->company_denied_import = implode(',',$request->input('company_denied_import'));

	    // $student->denied_import_upload = $request->input('denied_import_upload');

		// $image1 = $request->file('denied_import_upload');
		// $new_name1 = rand('111111111','99999999').'.'.$image1->getClientOriginalExtension();
		// $image1->move(public_path('images/import'), $new_name1);

		//$student->denied_import_upload=$new_name1;
		if ($request->hasfile("denied_import_upload")) {
            if (Storage::exists("/public/media/import/" . $student->denied_import_upload)) {
                Storage::delete("/public/media/import/" . $student->denied_import_upload);
            }

            $file = $request->file("denied_import_upload");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/import", $file_name);
            $student->denied_import_upload = $file_name;
        }
        $student->name_of_sender = $request->input('name_of_sender');
        $student->designation_of_sender = $request->input('designation_of_sender');
        $student->address_of_company = $request->input('address_of_company');
		$student->hs_code = $request->input('hs_code');
        $student->nature_biomaterial = implode(',',$request->input('nature_biomaterial'));
        $student->Quantity_import_num = $request->input('Quantity_import_num');
        $student->Quantity_import_vol = $request->input('Quantity_import_vol');
		$student->repeat_import = implode(',',$request->input('repeat_import'));
        $student->purpose_end_use = implode(',',$request->input('purpose_end_use'));
        $student->biosafety_infectious = $request->input('biosafety_infectious');
		$student->biosafety_infectious_description = $request->input('biosafety_infectious_description');
		$student->biosafety_materials = $request->input('biosafety_materials');
		$student->biosafety_materials_description = $request->input('biosafety_materials_description');
		$student->biosafety_vectors = $request->input('biosafety_vectors');
		$student->biosafety_vectors_description = $request->input('biosafety_vectors_description');
		$student->biosafety_nucleic = $request->input('biosafety_nucleic');
		$student->biosafety_nucleic_description = $request->input('biosafety_nucleic_description');


        //$student->biological_material = $request->input('biological_material');

		//$image = $request->file('biological_material');
		//$new_name = rand().'.'.$image->getClientOriginalExtension();
		//$image->move(public_path('images/import'), $new_name);
		//$student->biological_material=$new_name;

		if ($request->hasfile("biological_material")) {
            if (Storage::exists("/public/media/import/" . $student->biological_material)) {
                Storage::delete("/public/media/import/" . $student->biological_material);
            }

            $file = $request->file("biological_material");
            $extFile = $file->extension();
            $file_name = time() . "." . $extFile;
            $file->storeAs("/public/media/import", $file_name);
            $student->biological_material = $file_name;
        }

		$student->purpose_of = $request->input('purpose_of');
        $student->purpose_of_one = $request->input('purpose_of_one');
        $student->signature = $request->input('signature');
		$student->name = $request->input('name');
        $student->designation = $request->input('designation');
		$student->address = $request->input('address');
        $student->dates = $request->input('dates');
		//$student->status = '1';
        $student->save();
		Session::flash('message', 'Import Data Created successful!');
        return redirect('imp-exp/import');

    return redirect('login')->with('success', 'you are not allowed to access');
    }

	public function edits(Request $request,$id){

	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	 $Imports = Import::find($id);
	return view('impexp.import.edits',compact('Imports'));
	//}
    return redirect('login')->with('success', 'you are not allowed to access');
	}

    public function preview(Request $request,$id){

		if(empty(Session::get('roll')=='imp-exp')){
			return redirect('imp-exp/login');
		  }

		 $Imports = Import::find($id);
		 //dd($Imports);
		return view('impexp.import.preview',compact('Imports'));
		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}

	public function updates(Request $request,$id)
	{
	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }

	    $student = Import::find($id);
	    $student->iec_number = $request->input('iec_number');
        $student->name_of_applicant = $request->input('name_of_applicant');
        $student->name_of_designation = $request->input('name_of_designation');
        $student->address_company = $request->input('address_company');
		$student->company_denied_import = implode(',',$request->input('company_denied_import'));
        $student->name_of_sender = $request->input('name_of_sender');
        $student->designation_of_sender = $request->input('designation_of_sender');
        $student->address_of_company = $request->input('address_of_company');
		$student->hs_code = $request->input('hs_code');
        $student->Quantity_import_num = $request->input('Quantity_import_num');
        $student->Quantity_import_vol = $request->input('Quantity_import_vol');
		$student->repeat_import = implode(',',$request->input('repeat_import'));
        // $student->biosafety_concerns = implode(',',$request->input('biosafety_concerns'));
		$student->purpose_of = $request->input('purpose_of');
        $student->purpose_of_one = $request->input('purpose_of_one');
        $student->signature = $request->input('signature');
		$student->name = $request->input('name');
        $student->designation = $request->input('designation');
		$student->address = $request->input('address');
        $student->dates = $request->input('dates');
	    Session::flash('message', 'Record Update successful!');
        $student->update();
	    return redirect('imp-exp/import');
	//}
    return redirect('login')->with('success', 'you are not allowed to access');
	}

	public function status(Request $request,$id){

	if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
		$product = DB::table('import')->select('status')->where('id','=',$id)->get();

		if($product[0]->status =='1'){
			$status='0';
		}else{
		    $status='1';
		}
		$value = array('status'=>$status);
		DB::table('import')->where('id',$id)->update($value);
	    return redirect('imp-exp/import');
		//}
       return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function deletes(Request $request,$id)
    {

	 if(empty(Session::get('roll')=='imp-exp')){
		return redirect('imp-exp/login');
	  }
        Import::find($id)->delete();
        Session::flash('message', 'Record Delete successful!');
        return redirect('imp-exp/import');
		//}
       return redirect('login')->with('success', 'you are not allowed to access');
    }

    public function test()
    {
        return view('impexp.layouts.test');
    }

    public function getHsCodeData(Request $request)
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




}
