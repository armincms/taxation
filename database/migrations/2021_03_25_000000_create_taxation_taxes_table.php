<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxationTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxation_taxes', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->json('name'); 
            $table->double('rate', 4, 2)->default(0.00); 
            $table->boolean('active')->default(false);  
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxation_taxes');
    }
}
