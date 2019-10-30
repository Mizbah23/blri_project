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
        Schema::create('adjustment', function (Blueprint $table) {
            $table->bigIncrements('AdjustmentID');
            $table->unsignedBigInteger('Creator');
            
            $table->integer('CompanyID')->default(1);
            $table->integer('AdjustmentNo')->nullable();
            $table->date('AdjustmentDate');
            $table->string('AdjustmentTypeID');
            $table->string('Reason');
            $table->timestamp('CreationDate')->useCurrent();
            $table->timestamp('ModificationDate')->useCurrent();
            $table->boolean('Active')->default(1);
            
            $table->foreign('Creator')->references('id')->on('users');

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
