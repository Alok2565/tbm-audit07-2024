<?php

namespace App\Http\Controllers;
//use App\Http\Requests;
use App\Models\Exporter;
use App\Models\Import;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;
use Validator;
class ImportController extends Controller
{
    
    public function view(){
     if (Auth::check())
        {
 
	
	$Import = Import::all();
	return view('admin/import/view',compact('Import'));
	}
    return redirect('login')->with('success', 'you are not allowed to access');	
	}
	
	public function add(){
	 if (Auth::check())
      {	
  
	return view('admin/import/add');
	}
    return redirect('login')->with('success', 'you are not allowed to access');	
	}
	
	public function importapi(Request $request)
	{
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
	 if (Auth::check())
      {	
	    $request->validate([
            "biological_material" => "required|mimes:pdf|max:50000"
        ]);
		
		$session_id = Auth::user()->id;
		$ip_address = $_SERVER['SERVER_ADDR'];
		
	    $student = new Import;
        $student->userid = $session_id;
		$student->ip_address = $ip_address;
		$student->iec_number = $request->input('iec_number');
        $student->name_of_applicant = $request->input('name_of_applicant');
        $student->name_of_designation = $request->input('name_of_designation');
        $student->address_company = $request->input('address_company');
		$student->company_denied_import = implode(',',$request->input('company_denied_import'));
        $student->name_of_sender = $request->input('name_of_sender');
        $student->designation_of_sender = $request->input('designation_of_sender');
        $student->address_of_company = $request->input('address_of_company');
		$student->hs_code = $request->input('hs_code');
        $student->nature_biomaterial = implode(',',$request->input('nature_biomaterial'));
        $student->Quantity_import_num = $request->input('Quantity_import_num');
        $student->Quantity_import_vol = $request->input('Quantity_import_vol');
		$student->repeat_import = implode(',',$request->input('repeat_import'));
        $student->purpose_end_use = implode(',',$request->input('purpose_end_use'));
        $student->biosafety_concerns = implode(',',$request->input('biosafety_concerns'));
        $student->biological_material = $request->input('biological_material');
		
		$image = $request->file('biological_material');
		$new_name = rand().'.'.$image->getClientOriginalExtension();
		$image->move(public_path('images/import'), $new_name);
		$student->biological_material=$new_name;	
		$student->purpose_of = $request->input('purpose_of');
        $student->purpose_of_one = $request->input('purpose_of_one');
        $student->signature = $request->input('signature');
		$student->name = $request->input('name');
        $student->designation = $request->input('designation');
		$student->address = $request->input('address');
        $student->dates = $request->input('dates');
		$student->status = '1';
        $student->save();
		Session::flash('message', 'Import Data Created successful!');
        return redirect('admin/import');
    }
    return redirect('login')->with('success', 'you are not allowed to access');	
    }
	
	public function edits(Request $request,$id){
		
	 if (Auth::check())
      {	
     
	 $Imports = Import::find($id);
	return view('admin.import.edits',compact('Imports'));
	}
    return redirect('login')->with('success', 'you are not allowed to access');	
	}
	
	public function updates(Request $request,$id)
	{
	 if (Auth::check())
      {	
     
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
        $student->biosafety_concerns = implode(',',$request->input('biosafety_concerns'));
		$student->purpose_of = $request->input('purpose_of');
        $student->purpose_of_one = $request->input('purpose_of_one');
        $student->signature = $request->input('signature');
		$student->name = $request->input('name');
        $student->designation = $request->input('designation');
		$student->address = $request->input('address');
        $student->dates = $request->input('dates');
	    Session::flash('message', 'Record Update successful!');
        $student->update();
	    return redirect('admin/import');
	}
    return redirect('login')->with('success', 'you are not allowed to access');	
	}
	
	public function status(Request $request,$id){
	if (Auth::check())
      {	
		$product = DB::table('import')->select('status')->where('id','=',$id)->get();
		
		if($product[0]->status =='1'){
			$status='0';
		}else{ 
		    $status='1';
		}
		$value = array('status'=>$status);
		DB::table('import')->where('id',$id)->update($value);
	    return redirect('admin/import');
		}
       return redirect('login')->with('success', 'you are not allowed to access');	
    }	
	
    public function deletes(Request $request,$id)
    {
	if (Auth::check())
      {
        Import::find($id)->delete();
        Session::flash('message', 'Record Delete successful!');
        return redirect('admin/import');
		}
       return redirect('login')->with('success', 'you are not allowed to access');	
    }
	

}
