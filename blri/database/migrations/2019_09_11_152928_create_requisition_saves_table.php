<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitionSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisition_saves', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedBigInteger('employee_information_id');
          $table->unsignedBigInteger('product_info_id');
          $table->unsignedBigInteger('user_id');// who keep record of requisition information
          
          $table->date('requisitionDate');
          $table->integer('quantity');

          $table->foreign('employee_information_id')->references('id')->on('employee_information');
          $table->foreign('product_info_id')->references('id')->on('product_infos');
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('requisition_saves');
    }
}
