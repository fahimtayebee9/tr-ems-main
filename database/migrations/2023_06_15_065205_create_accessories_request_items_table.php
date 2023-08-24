<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories_request_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('accessories_request_id');
            $table->unsignedBigInteger('accessory_id');
            $table->string('issue');
            $table->string('status')->default('pending')->comment('pending, approved, rejected');
            $table->foreign('accessories_request_id')->references('id')->on('accessories_requests')->onDelete('cascade');
            $table->foreign('accessory_id')->references('id')->on('accessories_items')->onDelete('cascade');
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
        Schema::dropIfExists('accessories_reqest_items');
    }
}
