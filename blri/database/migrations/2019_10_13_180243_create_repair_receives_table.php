<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepairReceivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_receives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('serial_id');
            $table->unsignedBigInteger('user_id');// who keep the record of repairer information
            $table->unsignedBigInteger('repairer_id');// keep record of repairer 
            
            $table->date('receiveDate');
            $table->string('comments');
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
        Schema::dropIfExists('repair_receives');
    }
}
