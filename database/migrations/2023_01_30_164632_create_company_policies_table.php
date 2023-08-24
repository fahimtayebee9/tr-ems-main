<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('policy_id')->unique();
            $table->string('title');
            $table->string('slug');
            $table->string('value')->nullable();
            $table->integer('status')->default(1)->comment('1. ACTIVE, 2. INACTIVE');
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
        Schema::dropIfExists('company_policies');
    }
};
