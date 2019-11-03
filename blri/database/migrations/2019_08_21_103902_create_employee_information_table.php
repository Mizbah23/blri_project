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
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('designation_id');
            $table->unsignedBigInteger('district_id');
            $table->string('address');
            $table->string('contactNo');
            $table->string('nidNo');
            $table->date('joiningDate');
            $table->date('birthDate');
            $table->string('workingPlace');
            // $table->integer('position')->default(0);
            $table->boolean('isRevenue')->default(0);
            $table->string('remarks');
            $table->string('profileImage')->default('N/A');

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('designation_id')->references('id')->on('designations');

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
