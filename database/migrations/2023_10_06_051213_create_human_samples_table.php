<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_samples', function (Blueprint $table) {
            $table->id();
            $table->string('send_ifc_number')->nullable();
            $table->string('send_name_design_applicant')->nullable();
            $table->string('send_add_company_institute')->nullable();
            $table->string('comp_intitute_denied_export_auth_last_3_years')->nullable();
            $table->string('receive_name_desgn_recipient')->nullable();
            $table->string('receive_add_company_institute')->nullable();
            $table->string('end_user_receiv_party')->nullable();
            $table->string('name_and_add_end_user')->nullable();
            $table->string('hs_code_item_exported')->nullable();
            $table->string('natural_biomateria_exported')->nullable();
            $table->string('sample_collected')->nullable();
            $table->string('sampes_being_exported')->nullable();
            $table->string('exported_number')->nullable();
            $table->string('exported_volume')->nullable();
            $table->string('repeat_sampes_envisaged')->nullable();
            $table->string('specify_purpose_end_use')->nullable();
            $table->string('sampes_used_research_analysis')->nullable();
            $table->string('puspose_sample_store')->nullable();
            $table->string('duration_sample_store')->nullable();
            $table->string('facility_sample_store')->nullable();
            $table->string('biomaterial_micro_organisms_approval')->nullable();
            $table->string('ibsc_rcgm_approval_applicable')->nullable();
            $table->string('sender_certify_information_provided')->nullable();
            $table->string('sender_signature')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_designation')->nullable();
            $table->string('sender_address')->nullable();
            $table->timestamp('sender_date')->nullable();
            $table->string('recipient_certify_applicant_and_company')->nullable();
            $table->string('recipient_granted_permission_to_export')->nullable();
            $table->string('recipient_number_and_description')->nullable();
            $table->string('recipient_name_and_Company')->nullable();
            $table->string('recipient_country_destination')->nullable();
            $table->string('recipient_signature')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_designation')->nullable();
            $table->string('recipient_address')->nullable();
            $table->timestamp('recipient_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('human_samples');
    }
};
