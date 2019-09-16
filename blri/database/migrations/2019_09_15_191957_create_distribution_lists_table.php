<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistributionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->unsignedBigInteger('serial_no');
            $table->unsignedBigInteger('user_id');// who keep the record of release information

            $table->string('remarks');
            
            $table->foreign('product_info_id')->references('id')->on('product_infos');
            $table->foreign('serial_no')->references('id')->on('serial_infos');
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
        Schema::dropIfExists('distribution_lists');
    }
}
