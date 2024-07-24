<?php

namespace App\Http\Controllers\icmr;
use App\Models\User;
use App\Models\Exporter;
use Barryvdh\DomPDF\PDF;
use App\Models\ImpExpUse;
use App\Models\ExpNocIssued;
use Illuminate\Http\Request;
use App\Models\CommitteeExport;
use App\Mail\IcmrSentoCommittee;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\NocRejectionByIcmr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ExportericmrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }

        $arrComm = ImpExpUse::where('roll','like','comm')->get();
        //dd($arrComm);
        $dataExporters = Exporter::where('status', 0)->where('icmr_noc_status', 0)->where('icmr_off_status', 0)->get();

        //$dataExporters = Exporter::where('icmr_noc_status',0)->where('status',0)->get();
        return view('icmr.exporter.exporter', compact('dataExporters','arrComm'));
    }

    public function reject_export(Request $request)
    {

        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }

          //$export = Exporter::get('id');

         //dd($export);
          $email = Session::get('email');
        $arrComm = ImpExpUse::where('roll','like','comm')->get();
        //dd($arrComm);
        $dataExporters = Exporter::where('status', 1)->where('icmr_noc_status', 0)->get();
        //dd($dataExporters);
        $nocRejectMail = [
            'title' => 'NOC Rejected by ICMR',
            'body' => '',
            'application_number'=>  $dataExporters[0]->application_number,
            'exported_number'=>  $dataExporters[0]->exported_number,
            'natural_biomaterial_exported'=>  $dataExporters[0]->natural_biomaterial_exported,
            'vol_of_sample_text'=>  $dataExporters[0]->vol_of_sample_text,
            'exported_volume'=>  $dataExporters[0]->exported_volume,
            'receving_recipient_name'=>  $dataExporters[0]->receving_recipient_name,
            'receiving_add_company_institute'=>  $dataExporters[0]->receiving_add_company_institute,
            'purpose_sample_store'=>  $dataExporters[0]->purpose_sample_store,
            'purpose_sample_store_details'=>  $dataExporters[0]->purpose_sample_store_details,
            'purpose_sample_store'=>  $dataExporters[0]->purpose_sample_store,

        ];
        Mail::to($email)->send(new NocRejectionByIcmr($nocRejectMail));
		return view('icmr.exporter.rejectexporter', compact('dataExporters','arrComm',));
    }

	public function assign_committee_export(Request $request)
    {

        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }

          //$id = $request->input('exp_id');
         $app_number = $request->input('app_number');
        //$iec_number = $request->input('iec_number');
        $arrComm = ImpExpUse::where('roll','like','comm')->get();
        //dd($arrComm);
        //$dataExporters = Exporter::where('icmr_noc_status',0)->where('status',0)->get();
        //$dataExporters = Exporter::where('status', 1)->where('icmr_noc_status', 0)->get();
	    $dataExporters = Exporter::where('icmr_off_status', 1)->where('status', 0)->where('icmr_noc_status', 0)->get();

        // Session::flash('message','Comment sent to committee members by ICMR. Please check mail.');
        Session::flash('message','Application assigned to committee members.');
       //Session::flash('message4', $app_number);
       // Session::flash('message5', $iec_number);
		return view('icmr.exporter.assignexporter', compact('dataExporters','arrComm'));
    }


    public function updateOrInsertSendNotification(Request $request, $id="")
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
        }
        $request->validate([
            'remark' => 'required|string|max:255',
        ]);

        $id = $request->input('exp_id');
        $app_number = $request->input('app_number');
        $iec_number = $request->input('iec_number');
        $product = DB::table('exporters')->select('icmr_off_status')->where('id', '=', $id)->get();
        if($product[0]->icmr_off_status =='0'){
            $icmr_off_status='1';
        }
        $value1 = ['icmr_off_status' => $icmr_off_status];
        DB::table('exporters')->where('id', $id)->update($value1);

        $com_id = $request->input('comm_id');
        //dd($com_id);
        foreach($com_id as $value){
        $commInst = new CommitteeExport();
        $commInst->exp_id = $request->input('exp_id');
        $commInst->remark = $request->input('remark');
        $commInst->comm_id = $value;
        $commInst->save();
        Session::flash('message','Application assigned to committee members.');
        Session::flash('message2', $app_number);
        Session::flash('message3', $iec_number);
        }
            $exportData = DB::table('exporters')
                ->select('application_number')
                ->where('id', '=', $id)
                ->first();

            $icmrmailData = [
                'title' => '',
                'body' => '',
                'app_number' => $exportData->application_number,
            ];
            $ccIcmr_email = ImpExpUse::where('roll', 'like', 'icmr')->first();
            $emails = [];
            $emails =$ccIcmr_email->email;
    foreach ($com_id as $tovalue1) {
    $Tocomm_emails = DB::table('imp_exp_user')
    ->select('id', 'name', 'email')
    ->where('roll', 'like', 'comm')
    ->where('id', $tovalue1)
    ->first();
    //dd($Tocomm_emails);
        if($Tocomm_emails){
            Mail::to($Tocomm_emails->email)
            ->cc($emails)
            ->send(new IcmrSentoCommittee($icmrmailData));
        }
}
        return redirect('icmr/exporter');
    }

    public function exporterjson(Request $request,$id){
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }
        $ExpJson= Exporter::find($id);
        //dd($ExpJson);
        return response()->json($ExpJson);
    }
    public function comments_Icmr(Request $request, $id)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }

	  $Importdata = Exporter::find($id);
	  $comment = CommitteeExport::join('imp_exp_user', 'imp_exp_user.id',
		 '=', 'committee_exports.comm_id')->where('committee_exports.exp_id',$id)->where('committee_exports.comm_send_status',1)->get();
		 $html = '<table class="table table-bordered mb-0" id="comment_id">
         <tr><th colspan="3" class="form-label mt-2" style="font-weight:600; font-size:18px;"> Comments by committee members</th></tr>
             <tr>
                 <th class="form-label">Name of Committee Member</th>
                 <th class="form-label">Comments</th>
                 <th class="form-label">Decision</th>
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
	public function comments_Icmr1(Request $request, $id)
    {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }

	  $Importdata = Exporter::find($id);
	  $comment = CommitteeExport::join('imp_exp_user', 'imp_exp_user.id',
		 '=', 'committee_exports.comm_id')->where('committee_exports.exp_id',$id)->where('committee_exports.comm_send_status',1)->get();
		 $html = '<table class="table table-bordered mb-0" id="comment_id">
         <tr><th colspan="3" class="form-label mt-2" style="font-weight:600; font-size:20px;"> Comments by committee members</th></tr>
             <tr>
                 <th class="form-label">Name of committee members </th>
                 <th class="form-label">Comments</th>
                 <th class="form-label">Committee status</th>
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
    public function icmr_generate_nocexp(Request $request)
       {
        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
         }

        if ($request->has('submit') && $request->input('submit') === 'submit') {
            $noc_number = 'EXPORT-NOC-'.rand(100000,1000000);
           $imp_id = $request->input('imp_id');

           $Import = Exporter::where('id',$imp_id)->first();
           //dd($Import);
             $icmr_noc_status='1';

           $app_number =$Import->application_number;
           $iec_number = $Import->sending_iec_number;;

            $commInst = new ExpNocIssued();
            $commInst->user_id = $Import->user_id;
            $commInst->exp_id = $imp_id;
            $commInst->noc_number = $noc_number;
            $commInst->sending_iec_number =  $iec_number;
            $commInst->application_number = $app_number;
            $commInst->sending_applicant_name = $Import->sending_applicant_name;
            $commInst->sending_address = $Import->sending_add_company_institute;
            $commInst->unit_number = $Import->exported_number;
            $commInst->unit_quan = $Import->exported_volume;
            $commInst->name_of_sender = $Import->sender_name;
            $commInst->company_name = '';
            $commInst->purpose_of = $Import->recipient_utilized_for_purpose;
            $commInst->ip_address = $Import->ip_address;
            $commInst->save();

            $value = array('icmr_noc_status'=>$icmr_noc_status);
            DB::table('exporters')->where('id',$imp_id)->update($value);
           Session::flash('message','NOC has been generated successfully.');
           Session::flash('message2', $app_number);
           Session::flash('message3', $iec_number);

           return redirect('icmr/exportList-noc');

        } elseif ($request->has('submit') && $request->input('submit') === 'preview') {


            $imp_id = $request->input('imp_id');
            $results = Exporter::find($imp_id);
            $qr_data = $results->sending_applicant_name;
            $qrcode = QrCode::size(400)->generate($qr_data);
            return view('icmr.exporter.preview_noc',compact('results','qrcode'));

        }elseif ($request->has('submit1') && $request->input('submit1') === 'submit1') {
            $imp_id = $request->input('imp_id');

            $Import = Exporter::where('id',$imp_id)->first();
            //dd($Import);
              $icmr_noc_status='1';

            $app_number =$Import->application_number;
            $iec_number = $Import->sending_iec_number;;

            $product = DB::table('exporters')->select('status')->where('id','=',$imp_id)->get();

             if($product[0]->status =='0'){
              $status='1';
           }
           $value = array('status'=>$status);
           DB::table('exporters')->where('id',$imp_id)->update($value);
           Session::flash('message','NOC has been rejected successfully');
           Session::flash('message2', $app_number);
           Session::flash('message3', $iec_number);
           return redirect('icmr/reject-export');


        } else {
            $noc_number = 'EXPORT-NOC-'.rand(100000,1000000);
            $imp_id = $request->input('imp_id');

            $Import = Exporter::where('id',$imp_id)->first();
            //dd($Import);
              $icmr_noc_status='1';

            $app_number =$Import->application_number;
            $iec_number = $Import->sending_iec_number;;

             $commInst = new ExpNocIssued();
             $commInst->user_id = $Import->user_id;
             $commInst->exp_id = $imp_id;
             $commInst->noc_number = $noc_number;
             $commInst->sending_iec_number =  $iec_number;
             $commInst->application_number = $app_number;
             $commInst->sending_applicant_name = $Import->sending_applicant_name;
             $commInst->sending_address = $Import->sending_add_company_institute;
             $commInst->unit_number = $Import->exported_number;
             $commInst->unit_quan = $Import->exported_volume;
             $commInst->name_of_sender = $Import->sender_name;
             $commInst->company_name = '';
             $commInst->purpose_of = $Import->recipient_utilized_for_purpose;
             $commInst->ip_address = $Import->ip_address;
             $commInst->save();

             $value = array('icmr_noc_status'=>$icmr_noc_status);
             DB::table('exporters')->where('id',$imp_id)->update($value);
            Session::flash('message','EXport NOC has been Generated Successfully. Please download NOC');
            Session::flash('message2', $app_number);
            Session::flash('message3', $iec_number);

            return redirect('icmr/exportList-noc');
        }
       }


	public function previewExpIcmr(Request $request,$id){

		if(empty(Session::get('roll')=='icmr')){
			return redirect('icmr/login');
		  }

		 $export_data = Exporter::find($id);

	return view('icmr.exporter.preview',compact('export_data'));
		//}
		return redirect('login')->with('success', 'you are not allowed to access');
		}

    /**
     * Display the Delete resource.
     *
     * @param  \App\Models\HumanSample  $humanSample
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
		if(empty(Session::get('roll')=='icmr')){
		return redirect('icmr/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->delete();
        Session::flash('message', 'Exporter has been deleted successfully');
        return redirect('icmr/exporter');
    }

    /**
     * Show the form for Status the specified resource.
     *
     * @param  \App\Models\Exporter  $exporter
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $status, $id)
    {
		if(empty(Session::get('roll')=='icmr')){
		return redirect('icmr/login');
	  }
        $modelExporter = Exporter::find($id);
        $modelExporter->status = $status;
        $modelExporter->save();
        Session::flash('message', 'Exporter has been status updated successfully');

        return redirect('icmr/exporter');
    }

    public function status_reject(Request $request,$id){

        if(empty(Session::get('roll')=='icmr')){
            return redirect('icmr/login');
          }
          //echo "gfjfgj"; die;
            $product = DB::table('exporters')->select('status')->where('id','=',$id)->get();

            if($product[0]->status =='0'){
                $status='1';
            }
            //else{
               // $status='1';
            //}
            $value = array('status'=>$status);
            DB::table('exporters')->where('id',$id)->update($value);
            return redirect('icmr/exporter');

        }

	public function nocExportListIcmr()
    {
         $results = DB::table('exp_noc_issueds')
		->leftJoin('exporters','exporters.id','=','exp_noc_issueds.exp_id')
		->select('exp_noc_issueds.*','exporters.sending_applicant_design','exporters.receving_recipient_name','exporters.receving_recipient_design','exporters.receiving_add_company_institute','exporters.exported_number','exporters.exported_volume','exporters.natural_biomaterial_exported','exporters.sample_collected','specify_purpose_end_use')
		->get();
        $totalNoc_count = $results->count();
        //echo $totalNoc_count;
    return view('icmr.exporter.noc_exp_list',compact('results'));
    }

    public function previewExpPdf(Request $request, $id)
        {
		    if(empty(Session::get('roll')=='icmr')){
		    return redirect('icmr/login');
	        }

            $export_data = Exporter::find($id);
            $pdf = PDF::loadView('icmr.exporter.preview_form_exporter', compact('export_data'));
            //print_r($pdf);die;
            //return $pdf->download('preview-exporter.pdf',$export_data->id);
            return view('icmr.exporter.preview_form_exporter', compact('export_data'));
        }
}
