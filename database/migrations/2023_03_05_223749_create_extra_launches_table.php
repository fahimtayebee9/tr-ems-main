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
        Schema::create('extra_launches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->unique();
            $table->integer('count')->default(0)->nullable();
            $table->integer('total_launch')->default(0);
            $table->integer('total_price')->default(0); 
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
        Schema::dropIfExists('extra_launches');
    }
};
