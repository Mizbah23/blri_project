<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('adjustment');
        Schema::create('adjustment', function (Blueprint $table) {
            $table->bigIncrements('AdjustmentID');
            
            $table->unsignedBigInteger('Creator');
            $table->unsignedBigInteger('AdjustmentTypeID');
            
            $table->integer('CompanyID')->default(1);
            $table->integer('AdjustmentNo')->nullable();
            $table->date('AdjustmentDate');
            $table->timestamp('CreationDate')->useCurrent();
            $table->string('Reason');
          
            $table->string('Modifier')->nullable();
            $table->timestamp('ModificationDate')->useCurrent();
            $table->boolean('Active')->default(1);
            
            $table->foreign('Creator')->references('id')->on('users');
            $table->foreign('AdjustmentTypeID')->references('AdjustmentTypeID')->on('adjustmenttype');

           

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
        Schema::dropIfExists('adjustment');
    }
}
