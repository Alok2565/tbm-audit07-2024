<?php

namespace App\Http\Controllers\committee;
//use App\Http\Requests;
use DB;
use Validator;
use App\Models\User;
use App\Models\HsCode;
use App\Models\Import;
use App\Models\Exporter;  
use App\Models\ImpExpUse;
use Illuminate\Http\Request;
use App\Models\CommitteeExport;
use App\Models\Committeeimport;
//use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ImportcommController extends Controller
{

	public function dashboard(Request $request)
	{
	 if(empty(Session::get('roll')=='comm')){
		return redirect('committee/login');
	  }
      $id = Session::get('id');
	  $totalImport = Import::count(); 

		
		$Rejectexporter = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_send_status',1)->where('exporters.status',1)->count();

		$totalExporter = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_send_status',0)->count();
		
		$pendingexporter = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status','Approve')->where('exporters.icmr_noc_status',0)->count();
		
		$approvexporter = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status', 'Approve')->where('exporters.icmr_noc_status',1)->count();
		
	
	
	return view('committee/dashboard',compact('totalImport','totalExporter',
	'pendingexporter','Rejectexporter','approvexporter'));
	}

    public function view(){
     if(empty(Session::get('roll')=='comm')){
		return redirect('committee/login');
	  }
	  
	  $id = Session::get('id');
	  //dd($id);
	  $Import = Import::join('committee_import', 'committee_import.imp_id', '=', 'Import.id')
	  ->where('committee_import.comm_id',$id)->get();

		
    return view('committee/import/view',compact('Import'));
    }

    public function committepopup(Request $request, $id)
    {
        if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
		  
		  $ses_id = Session::get('id');
		 // $imp_id = $request->input('idname');
		  //print_r($ses_id); die;
		   //$Importdata = Import::find($id);
         $Importdata = Import::join('committee_import', 'committee_import.imp_id',
		 '=', 'Import.id')->where('committee_import.comm_id',$ses_id)->where('committee_import.imp_id',$id)->get();
		 //print_r($Importdata); die;
            foreach ($Importdata as $value) {
			   return response()->json($value);
			}
    }
	
	public function feedback_committee(Request $request){
	if(empty(Session::get('roll')=='comm')){
       return redirect('committee/login');
    }
	
	   $request->validate([
            "comm_status" => "required",
			"comments" => "required"
        ]);
		
		$imp_id = $request->input('idname');
		
		$comm_id = Session::get('id');
		$student = Committeeimport::where('comm_id', $comm_id)->where('imp_id', $imp_id)->first();
	  //dd($student);
	  $student->comm_status = $request->input('comm_status');
	  $student->comments = $request->input('comments');
	  $student->comm_send_status = '1';
	  $student->update();
	  return redirect('committee/import')->with('message', 'Data Has been Updated');
	}		
    
	
	 public function previewcommittee(Request $request,$id){

		if(empty(Session::get('roll')=='comm')){
			return redirect('committee/login');
		  }
          //dd($id);
		 $Imports = Import::find($id);
		 //dd($Imports);
		 return view('committee.import.preview',compact('Imports'));
		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}
		

}
