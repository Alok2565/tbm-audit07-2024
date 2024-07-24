<?php

namespace App\Http\Controllers;

use App\Models\HumanSample;
use Illuminate\Http\Request;
use App\Exports\ExportHumanSample;
use App\Imports\ImportHumanSamples;
use Maatwebsite\Excel\Facades\Excel;

class HumanSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['HumanSamples'] = HumanSample::orderBy('id','desc')->paginate(5);
        return view('admin.human_sample.exporter', $data);

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_exporter(Request $request, $id='')
    {
        if($id>0){
            $ArrHumanSample = HumanSample::where(['id'=>$id])->get();

        $ResultHumanSample['send_ifc_number']                               = $ArrHumanSample['0']->send_ifc_number;
        $ResultHumanSample['send_name_design_applicant']                    = $ArrHumanSample['0']->send_name_design_applicant;
        $ResultHumanSample['send_add_company_institute']                    = $ArrHumanSample['0']->send_add_company_institute;
        $ResultHumanSample['comp_intitute_denied_export_auth_last_3_years'] = $ArrHumanSample['0']->comp_intitute_denied_export_auth_last_3_years;
        $ResultHumanSample['receive_name_desgn_recipient']                  = $ArrHumanSample['0']->receive_name_desgn_recipient;
        $ResultHumanSample['receive_add_company_institute']                 = $ArrHumanSample['0']->receive_add_company_institute;
        $ResultHumanSample['end_user_receiv_party']                         = $ArrHumanSample['0']->end_user_receiv_party;
        $ResultHumanSample['name_and_add_end_user']                         = $ArrHumanSample['0']->name_and_add_end_user;
        $ResultHumanSample['hs_code_item_exported']                         = $ArrHumanSample['0']->hs_code_item_exported;
        $ResultHumanSample['natural_biomateria_exported']                   = $ArrHumanSample['0']->natural_biomateria_exported;
        $ResultHumanSample['sample_collected']                              = $ArrHumanSample['0']->sample_collected;
        $ResultHumanSample['sampes_being_exported']                         = $ArrHumanSample['0']->sampes_being_exported;
        $ResultHumanSample['exported_number']                               = $ArrHumanSample['0']->exported_number;
        $ResultHumanSample['exported_volume']                               = $ArrHumanSample['0']->exported_volume;
        $ResultHumanSample['repeat_sampes_envisaged']                       = $ArrHumanSample['0']->repeat_sampes_envisaged;
        $ResultHumanSample['specify_purpose_end_use']                       = $ArrHumanSample['0']->specify_purpose_end_use;
        $ResultHumanSample['sampes_used_research_analysis']                 = $ArrHumanSample['0']->sampes_used_research_analysis;
        $ResultHumanSample['puspose_sample_store']                          = $ArrHumanSample['0']->puspose_sample_store;
        $ResultHumanSample['duration_sample_store']                         = $ArrHumanSample['0']->duration_sample_store;
        $ResultHumanSample['facility_sample_store']                         = $ArrHumanSample['0']->facility_sample_store;
        $ResultHumanSample['biomaterial_micro_organisms_approval']          = $ArrHumanSample['0']->biomaterial_micro_organisms_approval;
        $ResultHumanSample['ibsc_rcgm_approval_applicable']                 = $ArrHumanSample['0']->ibsc_rcgm_approval_applicable;
        $ResultHumanSample['sender_certify_information_provided']           = $ArrHumanSample['0']->sender_certify_information_provided;
        $ResultHumanSample['sender_signature']                              = $ArrHumanSample['0']->sender_signature;
        $ResultHumanSample['sender_name']                                   = $ArrHumanSample['0']->sender_name;
        $ResultHumanSample['sender_designation']                            = $ArrHumanSample['0']->sender_designation;
        $ResultHumanSample['sender_address']                                = $ArrHumanSample['0']->sender_address;
        $ResultHumanSample['sender_date']                                   = $ArrHumanSample['0']->sender_date;
        $ResultHumanSample['recipient_certify_applicant_and_company']       = $ArrHumanSample['0']->recipient_certify_applicant_and_company;
        $ResultHumanSample['recipient_granted_permission_to_export']        = $ArrHumanSample['0']->recipient_granted_permission_to_export;
        $ResultHumanSample['recipient_number_and_description']              = $ArrHumanSample['0']->recipient_number_and_description;
        $ResultHumanSample['recipient_name_and_company']                    = $ArrHumanSample['0']->recipient_name_and_company;
        $ResultHumanSample['recipient_country_destination']                 = $ArrHumanSample['0']->recipient_country_destination;
        $ResultHumanSample['recipient_signature']                           = $ArrHumanSample['0']->recipient_signature;
        $ResultHumanSample['recipient_name']                                = $ArrHumanSample['0']->recipient_name;
        $ResultHumanSample['recipient_designation']                         = $ArrHumanSample['0']->recipient_designation;
        $ResultHumanSample['recipient_address']                             = $ArrHumanSample['0']->recipient_address;
        $ResultHumanSample['recipient_date']                                = $ArrHumanSample['0']->recipient_date;
        $ResultHumanSample['id']                                            = $ArrHumanSample['0']->id;
        }else{
            $ResultHumanSample['send_ifc_number'] = '';                              	
        $ResultHumanSample['send_name_design_applicant'] = '';                  
        $ResultHumanSample['send_add_company_institute'] = '';                  
        $ResultHumanSample['comp_intitute_denied_export_auth_last_3_years'] ='';
        $ResultHumanSample['receive_name_desgn_recipient'] = '';                
        $ResultHumanSample['receive_add_company_institute'] = '';               
        $ResultHumanSample['end_user_receiv_party'] = '';                       
        $ResultHumanSample['name_and_add_end_user'] = '';                       
        $ResultHumanSample['hs_code_item_exported'] = '';                       
        $ResultHumanSample['natural_biomateria_exported'] = '';                 
        $ResultHumanSample['sample_collected'] = '';                            
        $ResultHumanSample['sampes_being_exported'] = '';                       
        $ResultHumanSample['exported_number'] = '';                             
        $ResultHumanSample['exported_volume'] = '';                             
        $ResultHumanSample['repeat_sampes_envisaged'] = '';                     
        $ResultHumanSample['specify_purpose_end_use'] = '';                     
        $ResultHumanSample['sampes_used_research_analysis'] = '';               
        $ResultHumanSample['puspose_sample_store'] = '';                        
        $ResultHumanSample['duration_sample_store'] = '';                       
        $ResultHumanSample['facility_sample_store'] = '';                       
        $ResultHumanSample['biomaterial_micro_organisms_approval'] = '';        
        $ResultHumanSample['ibsc_rcgm_approval_applicable'] = '';               
        $ResultHumanSample['sender_certify_information_provided'] = '';         
        $ResultHumanSample['sender_signature'] = '';                            
        $ResultHumanSample['sender_name'] = '';                                 
        $ResultHumanSample['sender_designation'] = '';                          
        $ResultHumanSample['sender_address'] = '';                              
        $ResultHumanSample['sender_date'] = '';                                 
        $ResultHumanSample['recipient_certify_applicant_and_company'] = '';     
        $ResultHumanSample['recipient_granted_permission_to_export'] = '';      
        $ResultHumanSample['recipient_number_and_description'] = '';            
        $ResultHumanSample['recipient_name_and_company'] = '';                  
        $ResultHumanSample['recipient_country_destination'] = '';               
        $ResultHumanSample['recipient_signature'] = '';                         
        $ResultHumanSample['recipient_name'] = '';                              
        $ResultHumanSample['recipient_designation'] = '';                       
        $ResultHumanSample['recipient_address'] = '';                           
        $ResultHumanSample['recipient_date'] = '';                              
        $ResultHumanSample['id'] = '';
        }
        return view('admin.human_sample.manage_exporter',$ResultHumanSample);
    }

    /**
     * Store a newly Process resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_exporter_process(Request $request)
    {

        if($request->post('id')>0){
            $modelHumanSample=HumanSample::find($request->post('id'));
            $msg="Human Sample has been updated successfully";
        }else{
            $modelHumanSample = new HumanSample();
            $msg="Human Sample has been created successfully";
        }
        
        $modelHumanSample->send_ifc_number 						 		 = $request->post('send_ifc_number');
        $modelHumanSample->send_name_design_applicant 				     = $request->post('send_name_design_applicant');
        $modelHumanSample->send_add_company_institute                    = $request->post('send_add_company_institute');
        $modelHumanSample->comp_intitute_denied_export_auth_last_3_years = $request->post('comp_intitute_denied_export_auth_last_3_years');
        $modelHumanSample->receive_name_desgn_recipient                  = $request->post('receive_name_desgn_recipient');
        $modelHumanSample->receive_add_company_institute                 = $request->post('receive_add_company_institute');
        $modelHumanSample->end_user_receiv_party                         = $request->post('end_user_receiv_party');
        $modelHumanSample->name_and_add_end_user                         = $request->post('name_and_add_end_user');
        $modelHumanSample->hs_code_item_exported                         = $request->post('hs_code_item_exported');
        $modelHumanSample->natural_biomateria_exported                   = $request->post('natural_biomateria_exported');
        $modelHumanSample->sample_collected                              = $request->post('sample_collected');
        $modelHumanSample->sampes_being_exported                         = $request->post('sampes_being_exported');
        $modelHumanSample->exported_number                               = $request->post('exported_number');
        $modelHumanSample->exported_volume                               = $request->post('exported_volume');
        $modelHumanSample->repeat_sampes_envisaged                       = $request->post('repeat_sampes_envisaged');
        $modelHumanSample->specify_purpose_end_use                       = $request->post('specify_purpose_end_use');
        $modelHumanSample->sampes_used_research_analysis                 = $request->post('sampes_used_research_analysis');
        $modelHumanSample->puspose_sample_store                          = $request->post('puspose_sample_store');
        $modelHumanSample->duration_sample_store                         = $request->post('duration_sample_store');
        $modelHumanSample->facility_sample_store                         = $request->post('facility_sample_store');
        $modelHumanSample->biomaterial_micro_organisms_approval          = $request->post('biomaterial_micro_organisms_approval');
        $modelHumanSample->ibsc_rcgm_approval_applicable                 = $request->post('ibsc_rcgm_approval_applicable');
        $modelHumanSample->sender_certify_information_provided           = $request->post('sender_certify_information_provided');
        $modelHumanSample->sender_signature                              = $request->post('sender_signature');
        $modelHumanSample->sender_name                                   = $request->post('sender_name');
        $modelHumanSample->sender_designation                            = $request->post('sender_designation');
        $modelHumanSample->sender_address                                = $request->post('sender_address');
        $modelHumanSample->sender_date                                   = $request->post('sender_date');
        $modelHumanSample->recipient_certify_applicant_and_company       = $request->post('recipient_certify_applicant_and_company');
        $modelHumanSample->recipient_granted_permission_to_export        = $request->post('recipient_granted_permission_to_export');
        $modelHumanSample->recipient_number_and_description              = $request->post('recipient_number_and_description');
        $modelHumanSample->recipient_name_and_company                    = $request->post('recipient_name_and_company');
        $modelHumanSample->recipient_country_destination                 = $request->post('recipient_country_destination');
        $modelHumanSample->recipient_signature                           = $request->post('recipient_signature');
        $modelHumanSample->recipient_name                                = $request->post('recipient_name');
        $modelHumanSample->recipient_designation                         = $request->post('recipient_designation');
        $modelHumanSample->recipient_address                             = $request->post('recipient_address');
        $modelHumanSample->recipient_date                                = $request->post('recipient_date');
        $modelHumanSample->status =1 ;
        $modelHumanSample->save();
        $request->session()->flash('message',$msg);
        return redirect('exporter');
    }

    /**
     * Display the Delete resource.
     *
     * @param  \App\Models\HumanSample  $humanSample
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id){
        $modelHumanSample = HumanSample::find($id);
        $modelHumanSample->delete();
        $request->session()->flash('message','Human Sample has been deleted successfully');
        return redirect('exporter');
    }

    public function status(Request $request,$status, $id){
        $modelHumanSample=HumanSample::find($id);
        $modelHumanSample->status = $status;
        $modelHumanSample->save();
        $request->session->flash('message','Human Sample has been status updated successfully');
        return redirect('exporter');


    }
    
    // public function importHumanSample(Request $request){
    //     Excel::import(new ImportHumanSamples, $request->file('file')->store('files'));
    //     return redirect()->back();
    // }

    public function exportHumanSample() 
    {
        return Excel::download(new ExportHumanSample, 'human_sample.xlsl');
    }

}
