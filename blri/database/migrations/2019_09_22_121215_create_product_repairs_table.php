<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_repairs');
        Schema::create('product_repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serial_id');
            $table->unsignedBigInteger('user_id');// who keep the record of repairer information
            $table->unsignedBigInteger('repairer_id');// keep record of repairer 
            
            $table->date('sendingDate');
            $table->string('remarks');
            // $table->foreign('product_info_id')->references('id')->on('product_infos');
            $table->foreign('serial_id')->references('id')->on('serial_infos');
            $table->foreign('repairer_id')->references('id')->on('repairers');
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
        Schema::dropIfExists('product_repairs');
    }
}
