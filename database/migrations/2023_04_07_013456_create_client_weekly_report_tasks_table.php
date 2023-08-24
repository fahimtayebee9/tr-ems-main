<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWeeklyReportTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_weekly_report_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('task_title');
            $table->text('task_description')->nullable();
            $table->integer('task_status')->default(1)->comment('3 = Pending | 2 = In Progress | 1 = Completed');
            $table->integer('category')->comment('1 = AMAZON | 2 = WALMART | 3 = GRAPHIC | 4 = Other');
            $table->text('task_drive_link')->nullable();
            $table->unsignedBigInteger('client_account_id');
            $table->foreign('client_account_id')->references('id')->on('client_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('client_weekly_report_tasks');
    }
}
