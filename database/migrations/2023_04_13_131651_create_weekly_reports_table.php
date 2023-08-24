<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeklyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('caccount_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('total_sales')->default(0);
            $table->float('total_ads_sales')->default(0);
            $table->integer('total_impressions')->default(0);
            $table->integer('total_clicks')->default(0);
            $table->float('total_cost')->default(0);
            $table->float('average_tacos')->default(0);
            $table->float('average_acos')->default(0);
            $table->float('average_roas')->default(0);
            $table->float('average_cpc')->default(0);
            $table->float('average_cr')->default(0);
            $table->integer('total_order_units')->default(0);
            $table->integer('total_ads_order_units')->default(0);
            $table->float('total_sales_amount_oneyearago')->default(0);
            $table->integer('total_sales_unit_oneyearago')->default(0);
            $table->integer('report_type')->default(1)->comment('1 = daily, 2 = weekly, 3 = monthly, 4 = monthly comparision');
            $table->integer('count_meeting_notes')->default(0);
            $table->integer('count_daily_tasks')->default(0);
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
        Schema::dropIfExists('weekly_reports');
    }
}
