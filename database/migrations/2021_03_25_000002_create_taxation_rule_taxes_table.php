<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Armincms\Taxation\Helper;

class CreateTaxationRuleTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxation_rule_taxes', function (Blueprint $table) {
            $table->bigIncrements('id');    
            $table->json('description')->nullable();
            $table->enum('behavior', array_keys(Helper::taxRuleBehaviors()))->default('combine');
            $table->unsignedBigInteger('tax_id');  
            $table->unsignedBigInteger('rule_id'); 
            $table->country();
            $table->softDeletes();

            $table->foreign('tax_id')->references('id')->on('taxation_taxes');
            $table->foreign('rule_id')->references('id')->on('taxation_rules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taxation_rule_taxes');
    }
}
