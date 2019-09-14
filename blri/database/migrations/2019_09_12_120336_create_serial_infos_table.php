<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serial_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->unsignedBigInteger('user_id');// who keep the record of serial information
            
            $table->string('serial_no');
            $table->date('warrantyDate');

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
        Schema::dropIfExists('serial_infos');
    }
}
