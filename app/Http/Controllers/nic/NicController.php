<?php

namespace App\Http\Controllers\nic;
//use App\Http\Requests;
use DB;
use Validator;
use App\Models\User;
use App\Models\HsCode;
use App\Models\Import;
use App\Models\Exporter;  
use App\Models\ImpExpUse;
use App\Models\Committeeimport;
use App\Models\CommitteeExport;
use Illuminate\Http\Request;
//use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class NicController extends Controller
{

	public function dashboard(Request $request)
	{
	 if(empty(Session::get('roll')=='nic')){
		return redirect('nic');
	  }

      $totalExporter = Exporter::where('status', 0)->where('icmr_off_status', 0)->where('icmr_noc_status', 0)->where('sending_iec_number', '!=', '0200015443')->where('sending_iec_number', '!=', '0201012219')->where('sending_iec_number', '!=', '0202009378')->where('sending_iec_number', '!=', '0588138690')->where('sending_iec_number', '!=', 'AAICR8954R')->where('sending_iec_number', '!=', 'ABWFA0295L')->where('sending_iec_number', '!=', '1234567890')->count();

      $totaluser = ImpExpUse::where('roll', 'imp-exp')->where('iec_code', '!=', '0200015443')->where('iec_code', '!=', '0201012219')->where('iec_code', '!=', '0202009378')->where('iec_code', '!=', '0588138690')->where('iec_code', '!=', 'AAICR8954R')->where('iec_code', '!=', 'ABWFA0295L')->where('iec_code', '!=', '1234567890')->count();

	  $totalNocIssued = Exporter::where('icmr_off_status', 1) ->where('icmr_noc_status', 1)->count();
	  $pendingExporter = Exporter::where('status', 0)->where('icmr_off_status', 1)->where('icmr_noc_status', 0)->count();
	  $rejectExporter = Exporter::where('status', 1)->where('icmr_noc_status', 0)->count(); 
	  $assigncommiteeExporter = Exporter::where('icmr_off_status', 1)->where('status', 0)->where('icmr_noc_status', 0)->count(); 
	
	return view('nic/dashboard',compact('totalExporter','totaluser',
	'totalNocIssued','pendingExporter','rejectExporter','assigncommiteeExporter'));
	}

    public function index(Request $request)
    {
        if(empty(Session::get('roll')=='nic')){
            return redirect('nic');
          }

		$dataExporters = Exporter::where('status', 0)->where('icmr_noc_status', 0)->where('icmr_off_status', 0)->where('sending_iec_number', '!=', '0200015443')->where('sending_iec_number', '!=', '0201012219')->where('sending_iec_number', '!=', '0202009378')->where('sending_iec_number', '!=', '0588138690')->where('sending_iec_number', '!=', 'AAICR8954R')->where('sending_iec_number', '!=', 'ABWFA0295L')->where('sending_iec_number', '!=', '1234567890')->get();
        return view('nic.exporter.exporter', compact('dataExporters'));
    }
	
     public function user_list(Request $request)
    {
        if(empty(Session::get('roll')=='nic')){
            return redirect('nic');
          }

		$ImpExpUse = ImpExpUse::where('roll', 'imp-exp')->where('iec_code', '!=', '0200015443')->where('iec_code', '!=', '0201012219')->where('iec_code', '!=', '0202009378')->where('iec_code', '!=', '0588138690')->where('iec_code', '!=', 'AAICR8954R')->where('iec_code', '!=', 'ABWFA0295L')->where('iec_code', '!=', '1234567890')->get();
        return view('nic.exporter.user_list', compact('ImpExpUse'));
    }
   
		

}
