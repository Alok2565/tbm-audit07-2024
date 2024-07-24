<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HumanSample extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_ifc_number',								
        'send_name_design_applicant',						
        'send_add_company_institute',						
        'comp_intitute_denied_export_auth_last_3_years',	
        'receive_name_desgn_recipient',					
        'receive_add_company_institute',					
        'end_user_receiv_party',							
        'name_and_add_end_user',							
        'hs_code_item_exported',							
        'natural_biomateria_exported',					
        'sample_collected',								
        'sampes_being_exported',							
        'exported_number',								
        'exported_volume',								
        'repeat_sampes_envisaged',						
        'specify_purpose_end_use',						
        'sampes_used_research_analysis',				
        'puspose_sample_store',							
        'duration_sample_store',							
        'facility_sample_store',							
        'biomaterial_micro_organisms_approval',			
        'ibsc_rcgm_approval_applicable',					
        'sender_certify_information_provided',			
        'sender_signature',								
        'sender_name',									
        'sender_designation',								
        'sender_address',									
        'sender_date',									
        'recipient_certify_applicant_and_company',		
        'recipient_granted_permission_to_export',			
        'recipient_number_and_description',				
        'recipient_name_and_Company',						
        'recipient_country_destination',					
        'recipient_signature',							
        'recipient_name',									
        'recipient_designation',							
        'recipient_address',								
        'recipient_date',									

];
}
