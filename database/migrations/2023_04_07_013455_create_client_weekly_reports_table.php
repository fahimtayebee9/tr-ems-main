<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWeeklyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_weekly_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('report_number')->unique()->nullable();
            $table->date('week_start_date');
            $table->date('week_end_date');
            $table->string('client_name');

            $table->text('amz_seller_support_issues')->nullable();
            $table->text('amz_seller_support_case_url')->nullable();
            $table->text('walmart_seller_support_issues')->nullable();
            $table->text('walmart_seller_support_case_url')->nullable();
            
            $table->integer('is_amazon_us_data_added')->default(0);
            $table->integer('is_amazon_ca_data_added')->default(0);
            $table->integer('is_walmart_data_added')->default(0);
            $table->integer('is_meeting_notes_added')->default(0);
            $table->integer('is_weekly_tasks_added')->default(0);

            // SINGLE ACCOUNT OR MULTIPLE ACCOUNTS
            $table->integer('is_multiple_accounts')->default(0)->comment('0 = Single Account | 1 = Multiple Accounts');
            $table->string('report_template_theme')->nullable()->default(1)->comment('none, zonhack, nudawn');
            $table->unsignedBigInteger('parent_report_id')->nullable();
            $table->foreign('parent_report_id')->references('id')->on('client_weekly_reports')->onDelete('cascade');
            
            $table->softDeletes();
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
        Schema::dropIfExists('client_weekly_reports');
    }
}
