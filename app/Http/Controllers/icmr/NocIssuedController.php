<?php

namespace App\Http\Controllers\ICMR;


use App\Models\Import;
use App\Models\ExpNocIssued;
use App\Models\ImpNocIssued;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NocIssuedController extends Controller
{

    public function nocImpListIcmr()
    {
        if (empty(Session::get('roll') == 'icmr')) {
            return redirect('icmr/login');
        }
        $results = DB::table('imp_noc_issueds')
        ->leftJoin('import','import.id','=','imp_noc_issueds.imp_id')
        ->select('imp_noc_issueds.*','import.name_of_designation','import.name_of_sender','import.designation_of_sender','import.address_of_company','import.Quantity_import_num','import.Quantity_import_vol','import.nature_biomaterial','import.purpose_end_use')
        ->get();


    // echo "<pre>";
    // print_r($results);die;
        return view('icmr.import.noc_imp_list',compact('results'));
    }

    public function nocShowImpListIcmr(Request $request, $id)
    {
        if (empty(Session::get('roll') == 'icmr')) {
            return redirect('icmr/login');
        }

        $results = DB::table('imp_noc_issueds')
        ->leftJoin('import','import.id','=','imp_noc_issueds.imp_id')
        ->select('imp_noc_issueds.*','import.name_of_designation','import.name_of_sender','import.designation_of_sender','import.address_of_company','import.Quantity_import_num','import.Quantity_import_vol','import.nature_biomaterial','import.purpose_end_use')
        ->where('imp_noc_issueds.id', '=', $id)
        ->first();
		$qr_data = $results->name_of_applicant;
		$qrcode = QrCode::size(400)->generate($qr_data);
        $pdf = PDF::loadView('icmr.import.noc_form_importer', compact('results', 'qrcode'));
        //print_r($pdf);die;
        return $pdf->download('noc-importer.pdf',$results->noc_number);
    }
    public function nocExpListIcmr()
    {
        if (empty(Session::get('roll') == 'icmr')) {
            return redirect('icmr/login');
        }
        $results = DB::table('exp_noc_issueds')
    ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
    ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected','specify_purpose_end_use','exporters.specify_purpose_end_use_details')
    ->get();
    // echo "<pre>";
    // print_r($results);die;
        return view('icmr.exporter.noc_exp_list',compact('results'));
    }
    public function nocShowExpListIcmr(Request $request, $id)
    {
        if (empty(Session::get('roll') == 'icmr')) {
            return redirect('icmr/login');
        }
        $id = decrypt($id);
       $results = DB::table('exp_noc_issueds')
    ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
    ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected','exporters.purpose_sample_store','vol_of_sample_text')
    ->where('exp_noc_issueds.id', '=', $id)
    ->first();

    $iec_number = substr($results->sending_iec_number, -4);
	//    $qr_data = $results->sending_applicant_name;
    $purpose_of = '';
                        if (!empty($results->specify_purpose_end_use_details)) {
                        $purpose_of = $results->specify_purpose_end_use_details;
                        } elseif(empty($results->specify_purpose_end_use)) {
                            $purpose_of ='Others';
                        } else {
                            $purpose_of =$results->specify_purpose_end_use;
                        }

	//    $qr_data = $results->sending_applicant_name;
        //$qr_data = url('icmr/qr_noc-exporter/?id='.base64_encode(base64_encode($id)));
        $qr_data = "IEC Number = XXXXXX".$iec_number.", Name = ".$results->sending_applicant_name.",  NOC No = ".$results->noc_number.",    Application No =".$results->application_number.",    Purpose Of =".$purpose_of;
		$qrcode = QrCode::size(400)->generate($qr_data);
        //    dd($results);die;
            $pdf = PDF::loadView('icmr.exporter.noc_form_exporter', compact('results', 'qrcode'));
            //print_r($pdf);die;
            return $pdf->download('noc-exporter.pdf',$results->noc_number);
    }

    public function qrnocShowExpListIcmr(Request $request)
    {
        if (empty(Session::get('roll') == 'icmr')) {
            return redirect('icmr/login');
        }
		$id = base64_decode(base64_decode($request->input('id')));
       $results = DB::table('exp_noc_issueds')
    ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
    ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected','exporters.purpose_sample_store','vol_of_sample_text')
    ->where('exp_noc_issueds.id', '=', $id)
    ->first();

    $iec_number = substr($results->sending_iec_number, -4);
	//    $qr_data = $results->sending_applicant_name;
    $purpose_of = '';
                        if (!empty($results->specify_purpose_end_use_details)) {
                        $purpose_of = $results->specify_purpose_end_use_details;
                        } elseif(empty($results->specify_purpose_end_use)) {
                            $purpose_of ='Others';
                        } else {
                            $purpose_of =$results->specify_purpose_end_use;
                        }

	   //$qr_data = $results->sending_applicant_name;
	   //$qr_data = url('icmr/qr_noc-exporter/?id='.base64_encode(base64_encode($id)));
       $qr_data = "IEC Number = XXXXXX".$iec_number.", Name = ".$results->sending_applicant_name.",  NOC No = ".$results->noc_number.",    Application No =".$results->application_number.",    Purpose Of =".$purpose_of;
		$qrcode = QrCode::size(400)->generate($qr_data);
        //    dd($results);die;
            $pdf = PDF::loadView('icmr.exporter.noc_form_exporter', compact('results', 'qrcode'));
            //dd($pdf);
            return $pdf->download('noc-exporter.pdf',$results->noc_number);
    }

}
