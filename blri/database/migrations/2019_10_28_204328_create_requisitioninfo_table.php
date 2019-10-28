<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitioninfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitioninfo', function (Blueprint $table) {
          $table->bigIncrements('RequisitionId');
          $table->integer('RequisitionCode')->nullable();
          $table->date('RequisitionDate');
          $table->unsignedBigInteger('UserID');
          $table->unsignedBigInteger('DepartmentID');
          $table->string('Status');
          $table->string('ApprovedBy')->nullable();
          $table->timestamp('ApprovedDate')->useCurrent();;
          $table->string('CreateBy')->nullable();
          $table->timestamp('CreateDate')->useCurrent();

           $table->foreign('UserID')->references('id')->on('users');
           $table->foreign('DepartmentID')->references('id')->on('divisions');
           
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
        Schema::dropIfExists('requisitioninfo');
    }
}
