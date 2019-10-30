<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustmentdetails', function (Blueprint $table) {
        $table->bigIncrements('AdjustmentDetailID');
        $table->unsignedBigInteger('AdjustmentID');
        $table->unsignedBigInteger('ProductID');
        $table->integer('AdjustmentQty');
        $table->integer('RatePerUnit')->default(0);
            
        $table->foreign('AdjustmentID')->references('AdjustmentID')->on('adjustment');
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
        Schema::dropIfExists('adjustmentdetails');
    }
}
