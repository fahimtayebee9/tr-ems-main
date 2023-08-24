<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailySalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caccount_id');
            $table->string('marketplace');
            $table->date('date');
            $table->string('currency');
            $table->float('all_sales');
            $table->float('tacos');
            $table->float('sponsored_sales');
            $table->float('acos');
            $table->float('cost');
            $table->integer('clicks');
            $table->integer('impressions');
            $table->float('cr');
            $table->float('cpc');
            $table->float('roas');
            $table->foreign('caccount_id')->references('id')->on('client_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('daily_sales');
    }
}
