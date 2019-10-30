<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmenttypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustmenttype', function (Blueprint $table) {
            $table->bigIncrements(' AdjustmentTypeID');
            $table->string(' AdjustmentTypeName');
            $table->integer(' CompanyID')->default(1);
            $table->unsignedBigInteger('Creator');
            $table->timestamp('CreationDate')->useCurrent();
            $table->string('Modifier')->nullable();
            $table->timestamp('ModificationDate')->useCurrent();
            
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
        Schema::dropIfExists('adjustmenttype');
    }
}
