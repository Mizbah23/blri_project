<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReleaseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_release_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('releaseDate');
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('employee_information_id');
            $table->unsignedBigInteger('serial_info_id');
            $table->unsignedBigInteger('receiveBy');
            
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('employee_information_id')->references('id')->on('employee_information');
            $table->foreign('serial_info_id')->references('id')->on('serial_infos');
            $table->foreign('receiveBy')->references('id')->on('users');
            
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
        Schema::dropIfExists('product_release_infos');
    }
}
