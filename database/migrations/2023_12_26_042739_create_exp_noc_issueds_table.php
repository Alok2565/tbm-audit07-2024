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
        Schema::create('exp_noc_issueds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exp_id');
            $table->foreign('exp_id')->references('id')->on('exporter');
            $table->string('noc_number')->nullable();
            $table->string('sending_iec_number')->nullable();
            $table->string('application_number')->nullable();
            $table->string('sending_applicant_name')->nullable();
            $table->string('sending_add_company_institute')->nullable();
            $table->string('dsc_e_sing')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('ip_address')->nullable();
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
        Schema::dropIfExists('exp_noc_issueds');
    }
};
