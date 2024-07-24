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
        Schema::create('import', function (Blueprint $table) {
            $table->id();
			$table->string('iec_number')->nullable();
			$table->string('name_of_applicant')->nullable();
			$table->string('name_of_designation')->nullable();
			$table->string('address_company')->nullable();
			$table->string('company_denied_import')->nullable();
			$table->string('name_of_sender')->nullable();
			$table->string('designation_of_sender')->nullable();
			$table->string('address_of_company')->nullable();
			$table->string('hs_code')->nullable();
			$table->string('nature_biomaterial')->nullable();
			$table->string('Quantity_import_num')->nullable();
			$table->string('Quantity_import_vol')->nullable();
			$table->string('repeat_import')->nullable();
			$table->string('purpose_end_use')->nullable();
			$table->string('biosafety_concerns')->nullable();
			$table->string('biological_material')->nullable();
			$table->string('purpose_of')->nullable();
			$table->string('purpose_of_one')->nullable();
			$table->string('signature')->nullable();
			$table->string('name')->nullable();
			$table->string('designation')->nullable();
			$table->string('address')->nullable();
			$table->string('dates')->nullable();
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
        Schema::dropIfExists('import');
    }
};
