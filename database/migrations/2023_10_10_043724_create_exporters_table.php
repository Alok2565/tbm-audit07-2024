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
        Schema::create('exporters', function (Blueprint $table) {
            $table->id();
            $table->string('sending_iec_number')->nullable();
            $table->string('sending_applicant_name')->nullable();
            $table->string('sending_applicant_design')->nullable();
            $table->string('sending_add_company_institute')->nullable();
            $table->string('comp_institute_denied_export_auth_last_3_years')->nullable();
            $table->string('upload_comp_institute_denied_export')->nullable();
            $table->string('receving_recipient_name')->nullable();
            $table->string('receving_recipient_design')->nullable();
            $table->string('receiving_add_company_institute')->nullable();
            $table->string('end_user_receiving_party')->nullable();
            $table->string('end_user_name')->nullable();
            $table->string('end_user_address')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('natural_biomaterial_exported')->nullable();
            $table->string('sample_collected')->nullable();
            $table->string('samples_being_exported')->nullable();
            $table->string('exported_number')->nullable();
            $table->string('exported_volume')->nullable();
            $table->string('repeat_samples_envisaged')->nullable();
            $table->string('specify_purpose_end_use')->nullable();
            $table->string('samples_used_research_analysis')->nullable();
            $table->string('leftover_samples_store')->nullable();
            $table->string('purpose_sample_store')->nullable();
            $table->string('duration_sample_store')->nullable();
            $table->string('facility_sample_store')->nullable();
            $table->string('national_security_angle')->nullable();
            $table->string('foreign_country_army_military')->nullable();
            $table->string('biomaterial_micro_organisms_approval')->nullable();
            $table->string('ibsc_rcgm_approval_applicable')->nullable();
            $table->string('sender_certify_information_provided')->nullable();
            $table->string('sender_signature')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_designation')->nullable();
            $table->string('sender_address')->nullable();
            $table->timestamp('sender_date')->nullable();
            $table->string('recipient_certify_samples_referred')->nullable();
            $table->string('recipient_name_institution')->nullable();
            $table->string('recipient_utilized_for_purpose')->nullable();
            $table->string('recipient_signature')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_designation')->nullable();
            $table->string('recipient_address')->nullable();
            $table->timestamp('recipient_date')->nullable();
            $table->string('declaration_letter')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('exporters');
    }
};
