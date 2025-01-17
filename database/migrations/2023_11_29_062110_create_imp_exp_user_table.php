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
        Schema::create('imp_exp_user', function (Blueprint $table) {
            $table->id();
            $table->string('iec_code')->unique();
            $table->string('name');
            $table->longText('address');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('designation');
            $table->string('status');
            $table->string('ip_address');
            $table->string('password')->nullable();
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
        Schema::dropIfExists('imp_exp_user');
    }
};
