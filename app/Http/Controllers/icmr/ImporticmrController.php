<?php

namespace App\Http\Controllers\icmr;
//use App\Http\Requests;

use Validator;
use App\Models\User;
use App\Models\HsCode;
use App\Models\Import;
use App\Models\Exporter;
use App\Models\ImpExpUse;
use App\Models\ImpNocIssued;
use Illuminate\Http\Request;
use App\Models\Committeeimport;
//use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExpNocIssued;
use Illuminate\Support\Facades\Session;

class ImporticmrController extends Controller
{

	public function dashboard(Request $request)
	{
	 if(empty(Session::get('roll')=='icmr')){
		return redirect('icmr/login');
	  }

	  /* $totalImport = Import::count();
	   $totalExporter = Exporter::where('status', 0)->where('icmr_off_status', 0)->where('icmr_noc_status', 0)->count();
      //$totalNocIssued = ExpNocIssued::count();
	  $totalNocIssued = Exporter::where('icmr_noc_status', 1)->count();
	  $pendingExporter = Exporter::where('status', 0)->where('icmr_noc_status', 0)->where('icmr_off_status', 0)->count();
	  $rejectExporter = Exporter::where('status', 1)->where('icmr_noc_status', 0)->count();
	  $assigncommiteeExporter = Exporter::where('icmr_off_status', 1)->where('status', 0)->where('icmr_noc_status', 0)->count();
	   */
	   $totalImport = Import::count();
	  $totalExporter = Exporter::where('status', 0)->where('icmr_off_status', 0)->where('icmr_noc_status', 0)->count();
      //$totalNocIssued = ExpNocIssued::count();
	  $totalNocIssued = Exporter::where('icmr_noc_status', 1)->count(); 
	  $pendingExporter = Exporter::where('status', 0)->where('icmr_noc_status', 0)->where('icmr_off_status', 0)->count();
	  $rejectExporter = Exporter::where('status', 1)->where('icmr_noc_status', 0)->count(); 
	  $assigncommiteeExporter = Exporter::where('icmr_off_status', 1)->where('status', 0)->where('icmr_noc_status', 0)->count(); 
	  $totaluser = ImpExpUse::where('roll', 'imp-exp')->count();

	return view('icmr/dashboard',compact('totalImport','totalExporter',
	'totalNocIssued','pendingExporter','rejectExporter','assigncommiteeExporter','totaluser'));
	}


    public function view(){
     if(empty(Session::get('roll')=='icmr')){
		return redirect('icmr/login');
	  }

	 $Import = Import::where('icmr_noc_status',0)->get();
	 //$Import = Import::all();
     $arrComm = ImpExpUse::where('roll','like','comm')->get();
      dd($arrComm);
	return view('icmr/import/view',compact('Import','arrComm'));

	}

	public function assignIcmr(Request $request, $id)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }
		 //echo "ggjfg"; die;
	  $Importdata = Import::find($id);
     return response()->json($Importdata);
    }

	public function comment_Icmr(Request $request, $id)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }
		  //echo ""; die;
	  $Importdata = Import::find($id);
	  $comment = Committeeimport::join('imp_exp_user', 'imp_exp_user.id',
		 '=', 'committee_import.comm_id')->where('committee_import.imp_id',$id)->where('committee_import.comm_send_status',1)->get();
		 $html = '<table class="table table-bordered mb-0" id="comment_id">
             <tr>
                 <th class="form-label">Name of Committee Members</th>
                 <th class="form-label">Comments</th>
                 <th class="form-label">Status</th>
            </tr>';
		foreach($comment as $value){
              $html = $html.'<tr><td style="color: green">'.$value->name.'</td>
                  <td style="color: green">'.$value->comments.'</td>
                  <td style="color: green">'.$value->comm_status.'</td></tr>';
			}
		    $html = $html.'</tbody></table>';
	      $data = array(
				'import_data'=> $Importdata,
				'comment'=> $html
	  );
     return response()->json($data);
    }

	public function icmr_generate_noc(Request $request){

	 if(empty(Session::get('roll')=='icmr')){
		return redirect('icmr/login');
     }
		  $noc_number = 'IMPORT-NOC-'.rand(100000,1000000);
		$imp_id = $request->input('imp_id');
		$Import = Import::where('id',$imp_id)->first();

		 $icmr_noc_status='1';

		 $commInst = new ImpNocIssued();
         $commInst->user_id = $Import->userid;
		 $commInst->imp_id = $imp_id;
		 $commInst->noc_number = $noc_number;
		 $commInst->iec_code = $Import->iec_number;
		 $commInst->application_number = $Import->application_number;
		 $commInst->name_of_applicant = $Import->name_of_applicant;
		 $commInst->address_company = $Import->address_company;
		 $commInst->dsc_e_sing = '';
		 $commInst->qr_code = '';
		 $commInst->unit_number = $Import->Quantity_import_num;
		 $commInst->unit_quan = $Import->Quantity_import_vol;
		 $commInst->name_of_sender = $Import->name;
		 $commInst->company_name = '';
		 $commInst->purpose_of = $Import->purpose_of;
		 $commInst->ip_address = $Import->ip_address;
		 $commInst->save();

		 $value = array('icmr_noc_status'=>$icmr_noc_status);
		 DB::table('import')->where('id',$imp_id)->update($value);
		 Session::flash('message','Import NOC has been Generated Successfully, Please download the NOC');
		return redirect('icmr/importlist-noc');
	}



  public function previewIcmr(Request $request,$id){

		if(empty(Session::get('roll')=='icmr')){
			return redirect('icmr/login');
		  }

		 $Imports = Import::find($id);
		return view('icmr.import.preview',compact('Imports'));
		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}

    public function updateOrInsertNotification(Request $request)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }
        $request->validate([
            'remark' => 'required|string|max:255',
        ]);
          $id=$request->input('imp_id');
          $product = DB::table('import')->select('icmr_off_status')->where('id','=',$id)->get();

		 if($product[0]->icmr_off_status =='0'){
			$icmr_off_status='1';
         }
		   $value = array('icmr_off_status'=>$icmr_off_status);
		   DB::table('import')->where('id',$id)->update($value);

             $com_id = $request->input('comm_id');
             foreach($com_id as $value){
                $commInst = new Committeeimport();
				$commInst->imp_id = $request->input('imp_id');
				$commInst->remark = $request->input('remark');
				$commInst->comm_id = $value;
				$commInst->save();
				Session::flash('message','Notice sent to committee members');
             }
            return redirect('icmr/import');
    }

	 public function nocImportListIcmr()
    {
        //$results = ImpNocIssued::all();
        $results = DB::table('imp_noc_issueds')
        ->leftJoin('import','import.id','=','imp_noc_issueds.imp_id')
        ->select('imp_noc_issueds.*','import.name_of_designation','import.name_of_sender','import.designation_of_sender','import.address_of_company','import.Quantity_import_num','import.Quantity_import_vol','import.nature_biomaterial','import.purpose_end_use')
        ->get();

    // echo "<pre>";
    // print_r($results);die;
        return view('icmr.import.noc_imp_list',compact('results'));
    }



}
