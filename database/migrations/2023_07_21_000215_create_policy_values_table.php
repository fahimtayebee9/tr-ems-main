<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolicyValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('policy_id');
            $table->string('value');
            $table->integer('type')->default(1)->comment('1. Percentage, 2. Amount');
            $table->integer('status')->default(1)->comment('1. ACTIVE, 2. INACTIVE');
            $table->foreign('policy_id')->references('id')->on('company_policies')->onDelete('cascade'); 
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
        Schema::dropIfExists('policy_values');
    }
}
