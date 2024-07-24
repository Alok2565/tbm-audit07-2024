<?php

namespace App\Http\Controllers\committee;
use Response;
use App\Models\User;
use App\Models\Exporter;
use App\Models\ImpExpUse;
use Illuminate\Http\Request;
use App\Models\CommitteeExport;
//use Illuminate\Support\Facades\Auth;
use App\Mail\CommitteeSentoIcmr;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ExportercommController extends Controller
{
    

    public function index(Request $request)
    {
        if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
        
		    $id = Session::get('id');
        
		$dataExporters = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		  ->where('committee_exports.comm_id',$id)->where('committee_exports.comm_send_status',0)->get();
        //echo "$dataExporters"; die;

    return view('committee.exporter.exporter', compact('dataExporters'));
    }
    public function reject_export(){
		
      if(empty(Session::get('roll')=='comm')){
     return redirect('committee/login');
     }
     $id = Session::get('id');
    
     //$dataExporters = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		//->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status', 'Approve')->where('exporters.icmr_noc_status',1)->get();

	 $dataExporters = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status', 'Approve')->where('exporters.icmr_noc_status',1)->get();

      return view('committee/exporter/reject',compact('dataExporters'));
     }

   public function approve_export(){
      if(empty(Session::get('roll')=='comm')){
     return redirect('committee/login');
     }
     $id = Session::get('id');

	  
    // $dataExporters = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
     //->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status', 'Approve')->get();

	$dataExporters = CommitteeExport::join('exporters', 'exporters.id', '=', 'committee_exports.exp_id')
		->where('committee_exports.comm_id',$id)->where('committee_exports.comm_status','Approve')->where('exporters.icmr_noc_status',0)->get();


      return view('committee/exporter/approve',compact('dataExporters'));
     }


    public function exportjson(Request $request, $id)
    {
        if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }

       $ses_id = Session::get('id');
		   //$Importdata = Import::find($id);
         $Importdata = Exporter::join('committee_exports', 'committee_exports.exp_id',
		 '=', 'exporters.id')->where('committee_exports.comm_id',$ses_id)->where('committee_exports.exp_id',$id)->get();
            foreach ($Importdata as $value) {
              unset($value->ip_address);
			   return response()->json($value);
			}
    }

  public function feedback_committ(Request $request)
  {
      if(empty(Session::get('roll')=='comm')){
      return redirect('committee/login');
      }

   $request->validate([
          "comm_status" => "required",
		  "comments" =>  "required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/",
      ]);

      $exp_id = $request->input('idname');
      $com_app_num = $request->input('com_app_num');
      $com_iec_num = $request->input('com_iec_num');
      $comm_id = Session::get('id');

      $student = CommitteeExport::where('comm_id', $comm_id)->where('exp_id', $exp_id)->first();
      //dd($student);

      $student->comm_status = $request->input('comm_status');
      $student->comments = $request->input('comments');
      $student->comm_send_status = '1';
      $student->update();


      // $commitee_mailData = [
      //     'title' => 'Sent by Committee Member',
      //     'body' => '',
      // ];
    //   $exportData = DB::table('exporters')
    //           ->select('application_number')
    //           ->where('id', '=', $exp_id)
    //           ->first();

    //   $commitee_mailData = [
    //       'title' => '',
    //       'body' => '',
    //       'application_number' => $exportData->application_number,
    //   ];

      // $ToIcmr_email = ImpExpUse::where('roll', 'like', 'icmr')->first();
      // $emails = [];
      // $emails =$ToIcmr_email->email;
      // //dd($emails);
      // $ccComm_email = ImpExpUse::where('roll', 'like', 'comm')->where('id',$comm_id)->first();
      // //dd($ccComm_email);
      // Mail::to($emails)->cc([$ccComm_email],'thbm.hq@icmr.gov.in')->send(new CommitteeSentoIcmr($commitee_mailData));
      // //Mail::to('aashishsingh6996@gmail.com')->cc(['web.aloksingh8190@gmail.com'])->send(new CommitteeSentoIcmr($commitee_mailData));
      // //dd('Email send successfully.');
    //   $ToIcmr_email = ImpExpUse::where('roll', 'like', 'icmr')->get();
    //   $emails = [];
    //   foreach ($ToIcmr_email as $item) {
    //     $emails[] = $item->email;
    //   }
      //dd($emails);
      //Mail::to($emails)->send(new CommitteeSentoIcmr($commitee_mailData));
    //   $exportData = DB::table('exporters')
    //             ->select('application_number')
    //             ->where('id', '=', $exp_id)
    //             ->first();

    //     $commitee_mailData = [
    //         'title' => '',
    //         'body' => '',
    //         'application_number' => $exportData->application_number,
    //     ];

      Session::flash('message2', $com_app_num);
      Session::flash('message3', $com_iec_num);
      return redirect('committee/exporter')->with('message', 'Comment sent to ICMR.');



}
    public function delete(Request $request, $id)
    {
		if(empty(Session::get('roll')=='comm')){
		return redirect('committee/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->delete();
        Session::flash('message', 'Exporter has been deleted successfully');
        return redirect('committee/exporter');
    }

    public function status(Request $request, $status, $id)
    {
		if(empty(Session::get('roll')=='comm')){
		return redirect('committee/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->status = $status;
        $modelExporter->save();
        Session::flash('message', 'Exporter has been status updated successfully');

        return redirect('committee/exporter');
    }

	public function preview_committee(Request $request,$id){
    $id = explode('key', decrypt($id));

    $url_key = $id[1];
    if(Session::get('roll')=='comm' && Session::get('key')==$id[2]){
      $export_data = Exporter::find($id[0]);
		return view('committee.exporter.preview',compact('export_data','url_key'));

  }else{
      return redirect('committee/login');
  }

		//if(empty(Session::get('roll')=='comm')){
			//return redirect('committee/login');
		  //}
      //$id = Crypt::decrypt($id);
      //$id = $id[0];
		//$id = base64_decode($id);
		 //$export_data = Exporter::find($id);
		//return view('committee.exporter.preview',compact('export_data'));
		//}
		//return redirect('login')->with('success', 'you are not allowed to access');
		}

    // public function viewDocument(Request $request, $id='')
    //     {
    //         if(Session::get('roll')=='comm'){
    //             $path = decrypt($id);
    //             return Response::download($path, 'file.pdf', array());
	  //       }else{
    //             return redirect('committee/login');
    //         }

    //     }

        public function viewDocument(Request $request, $id='')
        {
            $path = explode('key', decrypt($id));
            if(Session::get('roll') == 'comm' && Session::get('key')==$path[1]){
                //$path = decrypt($id);
                return Response::download($path[0], 'file.pdf', array());
	        }else{
                return redirect('committee/login');
            }

        }


}
