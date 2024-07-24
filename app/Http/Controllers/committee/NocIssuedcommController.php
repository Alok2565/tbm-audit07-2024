<?php

namespace App\Http\Controllers\committee;
use App\Models\Import;
use App\Models\ImpNocIssued;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ExpNocIssued;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NocIssuedcommController extends Controller
{

    public function nocImpListcommittee()
    {
		if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
        //$results = ImpNocIssued::all();
        $results = DB::table('imp_noc_issueds')
        ->leftJoin('import','import.id','=','imp_noc_issueds.imp_id')
        ->select('imp_noc_issueds.*','import.name_of_designation','import.name_of_sender','import.designation_of_sender','import.address_of_company','import.Quantity_import_num','import.Quantity_import_vol','import.nature_biomaterial','import.purpose_end_use')
        ->get();

    // echo "<pre>";
    // print_r($results);die;
        return view('committee.import.noc_imp_list',compact('results'));
    }

    public function nocShowImpListcommittee(Request $request, $id)
    {
		if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
        //$results = ImpNocIssued::find($id);
        $qrcode = QrCode::size(400)->generate('Ashish');
        $results = DB::table('imp_noc_issueds')
        ->leftJoin('import','import.id','=','imp_noc_issueds.imp_id')
        ->select('imp_noc_issueds.*','import.name_of_designation','import.name_of_sender','import.designation_of_sender','import.address_of_company','import.Quantity_import_num','import.Quantity_import_vol','import.nature_biomaterial','import.purpose_end_use')
        ->where('imp_noc_issueds.id', '=', $id)
        ->first();
        $pdf = PDF::loadView('committee.import.noc_form_importer', compact('results', 'qrcode'));
        //print_r($pdf);die;
        return $pdf->download('noc-importer.pdf',$results->noc_number);
    }
    public function nocExpListcommittee()
    {
		if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
		  
        //$results = ExpNocIssued::all();
        $results = DB::table('exp_noc_issueds')
    ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
    ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected')
    ->get();
    // echo "<pre>";
    // print_r($results);die;
        return view('committee.exporter.noc_exp_list',compact('results'));
    }
    public function nocShowExpListcommittee(Request $request, $id)
    {
		if(empty(Session::get('roll')=='comm')){
            return redirect('committee/login');
          }
		  
        //$results = ExpNocIssued::find($id);
        $qrcode = QrCode::size(400)->generate('Ashish');
        $results = DB::table('exp_noc_issueds')
    ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
    ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected')
    ->where('exp_noc_issueds.id', '=', $id)
    ->first();
        //    dd($results);die;
            $pdf = PDF::loadView('commitee.exporter.noc_form_exporter', compact('results', 'qrcode'));
            //print_r($pdf);die;
            return $pdf->download('noc-exporter.pdf',$results->noc_number);
    }


}
