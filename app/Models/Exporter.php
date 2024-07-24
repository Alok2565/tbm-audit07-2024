<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exporter extends Model
{
    use HasFactory;

    protected $fillable = [

        'sending_iec_number',
        'sending_applicant_name',
        'sending_applicant_design',
        'sending_add_company_institute',
        'comp_intitute_denied_export_auth_last_3_years',
        'upload_comp_institute_denied_export',
        'receving_recipient_name',
        'receving_recipient_design',
        'receiving_add_company_institute',
        'end_user_receiving_party',
        'end_user_name',
        'end_user_address',
        'hs_code',
        'natural_biomateria_exported',
        'sample_collected',
        'sampes_being_exported',
        'exported_number',
        'exported_volume',
        'repeat_sampes_envisaged',
        'specify_purpose_end_use',
        'sampes_used_research_analysis',
        'leftover_sampes_store',
        'puspose_sample_store',
        'duration_sample_store',
        'facility_sample_store',
        'national_security_angle',
        'foreign_country_army_military',
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
        'recipient_date' ,

    ];


    public static function getExporterById($id){
        return Exporter::where('id', $id)->pluck('sending_iec_number')->first();
    }
}
