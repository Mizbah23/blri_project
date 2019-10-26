<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblpurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tblpurchase');
        Schema::create('tblpurchase', function (Blueprint $table) {
            $table->bigIncrements('PurchaseID');
            $table->unsignedBigInteger('SupplierID');
            $table->unsignedBigInteger('Job_By');
            
            $table->integer('CompanyID')->default(1);
            $table->timestamp('Sys_Purchase_Date')->useCurrent();
            $table->date('Purchase_Date');
            $table->string('InvoiceNo')->nullable();
            $table->date('InvoiceDate')->timestamps();
            $table->boolean('IsDonate')->default(0);
            $table->string('OrderNo');
           
           $table->foreign('SupplierID')->references('id')->on('suppliers');
           $table->foreign('Job_By')->references('id')->on('users');
                             
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
        Schema::dropIfExists('tblpurchase');
    }
}
