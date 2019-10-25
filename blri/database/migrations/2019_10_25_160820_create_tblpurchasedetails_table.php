<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpurchasedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpurchasedetails', function (Blueprint $table) {
            $table->bigIncrements('PurchaseDetailID');
            $table->unsignedBigInteger('PurchaseID');
            $table->unsignedBigInteger('ProductID');
            
            $table->integer('Quantity');
            $table->string('Note')->nullable();
            $table->string('BatchNo')->nullable();
            
            $table->foreign('PurchaseID')->references('PurchaseID')->on('tblpurchase');
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
        Schema::dropIfExists('tblpurchasedetails');
    }
}
