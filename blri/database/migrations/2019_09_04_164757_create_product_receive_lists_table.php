<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReceiveListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_receive_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('product_info_id');
            $table->unsignedBigInteger('user_id');//Who receive the product//Lets say who put product receive information
            $table->string('orderNo');
            $table->integer('quantity');
            $table->date('receiveDate');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('project_id')->references('id')->on('projects');
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
        Schema::dropIfExists('product_receive_lists');
    }
}
