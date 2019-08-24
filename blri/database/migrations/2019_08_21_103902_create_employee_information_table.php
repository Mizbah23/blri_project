<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('divisionName');
            $table->string('sectionName');
            $table->string('designationName');
            $table->string('districtName');
            $table->string('address');
            $table->string('contactNo');
            $table->string('nidNo');
            $table->date('joiningDate');
            $table->date('birthDate');
            $table->string('workingPlace');
            $table->integer('position')->default(0);
            $table->boolean('isRevenue')->default(0);
            $table->string('remarks');

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
        Schema::dropIfExists('employee_information');
    }
}
