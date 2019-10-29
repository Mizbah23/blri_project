<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisitiondetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('requisitiondetails');
        Schema::create('requisitiondetails', function (Blueprint $table) {
            
            $table->bigIncrements('RequisitionDetailsId');
            
            $table->unsignedBigInteger('RequisitionId');
            $table->unsignedBigInteger('ProductID');
            
            $table->integer('RequireQty');
            $table->integer('ApprovedQty')->default(0);
            $table->integer('IssuedQty')->default(0);
            
            $table->foreign('RequisitionId')->references('RequisitionId')->on('requisitioninfo');
            $table->foreign('ProductID')->references('id')->on('product_infos');

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
        Schema::dropIfExists('requisitiondetails');
    }
}
