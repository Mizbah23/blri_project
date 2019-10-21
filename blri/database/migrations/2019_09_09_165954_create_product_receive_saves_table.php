<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductReceiveSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('product_receive_saves');
        Schema::create('product_receive_saves', function (Blueprint $table) {//All the products that are product list that will be store in this table if save button is clicked
            $table->bigIncrements('id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('product_info_id');
            $table->unsignedBigInteger('product_receive_masters_id');
            $table->unsignedBigInteger('user_id');//Who receive the product//Lets say who put product receive information
            $table->string('orderNo');
            $table->integer('quantity');
            $table->date('receiveDate');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('product_info_id')->references('id')->on('product_infos');
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('product_receive_master_id')->references('id')->on('product_receive_masters');
            
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
        Schema::dropIfExists('product_receive_saves');
    }
}
