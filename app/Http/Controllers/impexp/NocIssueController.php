<?php

namespace App\Http\Controllers\impexp;

use App\Models\Exporter;
use App\Models\ImpNocIssued;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NocIssueController extends Controller
{
    public function importerNocList()
    {
        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }
        $id = Session::get('id');

        //print_r($id); die;
        //$results = ImpNocIssued::all();
        $results = DB::table('imp_noc_issueds')
            ->leftJoin('import', 'import.id', '=', 'imp_noc_issueds.imp_id')
            ->select(
                'imp_noc_issueds.*',
                'import.name_of_designation',
                'import.name_of_sender',
                'import.designation_of_sender',
                'import.address_of_company',
                'import.Quantity_import_num',
                'import.Quantity_import_vol',
                'import.nature_biomaterial',
                'import.purpose_end_use'
            )
            ->where('imp_noc_issueds.user_id', $id)
            ->get();
        return view('impexp.import.noc_importer_list', compact('results'));
    }

    public function nocImpListPdf(Request $request, $id)
    {
        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }

        //$results = ImpNocIssued::find($id);
        $results = DB::table('imp_noc_issueds')
            ->leftJoin('import', 'import.id', '=', 'imp_noc_issueds.imp_id')
            ->select('imp_noc_issueds.*', 'import.name_of_designation', 'import.name_of_sender', 'import.designation_of_sender', 'import.address_of_company', 'import.Quantity_import_num', 'import.Quantity_import_vol', 'import.nature_biomaterial', 'import.purpose_end_use')
            ->where('imp_noc_issueds.id', '=', $id)
            ->first();
        $pdf = PDF::loadView('impexp.import.noc_form_importer', compact('results'));
        //print_r($pdf);die;
        return $pdf->download('noc-importer.pdf', $results->noc_number);
    }

    public function exporterNocList()
    {
        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }
        //echo 'check'; die;
        $id = Session::get('id');

        //     $results = DB::table('exp_noc_issueds')
        //     ->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
        //     ->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name',
        // 'exporters.receving_recipient_design','exporters.receiving_add_company_institute',
        // 'exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported',
        // 'exporters.sample_collected','specify_purpose_end_use','exporters.specify_purpose_end_use_details')
        //      ->where('exp_noc_issueds.user_id', '=', $id)->get();
        $results = DB::table('exp_noc_issueds')
            ->leftJoin('exporters', 'exporters.id', '=', 'exp_noc_issueds.exp_id')
            ->select('exp_noc_issueds.*', 'exporters.sending_applicant_design', 'exporters.receving_recipient_name', 'exporters.receving_recipient_design', 'exporters.receiving_add_company_institute', 'exporters.exported_number', 'exporters.exported_volume', 'exporters.natural_biomaterial_exported', 'exporters.sample_collected', 'exporters.specify_purpose_end_use', 'exporters.specify_purpose_end_use_details','sending_add_company_institute')
            ->get();
        return view('impexp.exporter.noc_exporter_list', compact('results'));
    }

    public function nocExpListPdf(Request $request, $id)
    {
        if (empty(Session::get('roll') == 'imp-exp')) {
            return redirect('imp-exp/login');
        }

        $results = DB::table('exp_noc_issueds')
        ->leftJoin('exporters', 'exporters.id', '=', 'exp_noc_issueds.exp_id')
        ->select('exp_noc_issueds.*', 'exporters.sending_applicant_design', 'exporters.receving_recipient_name', 'exporters.receving_recipient_design', 'exporters.receiving_add_company_institute', 'exporters.exported_number', 'exporters.exported_volume', 'exporters.natural_biomaterial_exported', 'exporters.sample_collected', 'exporters.purpose_sample_store', 'vol_of_sample_text', 'exporters.specify_purpose_end_use', 'exporters.specify_purpose_end_use_details','sending_add_company_institute')
        ->where('exp_noc_issueds.id', '=', $id)
        ->first();
        //dd($results);
        //$pdf = PDF::loadView('impexp.exporter.noc_form.exporter',compact('results'));
        //return $pdf->download('noc-exporter.pdf', $results->noc_number);

        $qr_data = url('icmr/qr_noc-exporter/?id='.base64_encode(base64_encode($id)));
		$qrcode = QrCode::size(400)->generate($qr_data);
        //    dd($results);die;
            $pdf = PDF::loadView('impexp.exporter.noc_form_exporter', compact('results', 'qrcode'));
            //dd($pdf);
            return $pdf->download('noc-exporter.pdf',$results->noc_number);

    }
}
