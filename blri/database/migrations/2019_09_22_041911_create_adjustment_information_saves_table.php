<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentInformationSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_information_saves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_info_id');
            $table->unsignedBigInteger('user_id');//Who make adjustment of the product
            $table->integer('quantity');
            $table->date('adjustmentDate');
            $table->string('adjustmentType');
            $table->string('reason');

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
        Schema::dropIfExists('adjustment_information_saves');
    }
}
