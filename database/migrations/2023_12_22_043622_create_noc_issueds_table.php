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
        Schema::create('noc_issueds', function (Blueprint $table) {
            $table->id();
            $table->string('noc_number')->nullable();
            $table->string('iec_code')->nullable();
            $table->string('Application_number')->nullable();
            $table->string('imp_exp_id')->nullable();
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
        Schema::dropIfExists('noc_issueds');
    }
};
