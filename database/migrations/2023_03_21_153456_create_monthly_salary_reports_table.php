<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlySalaryReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_salary_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('report_name')->nullable();
            $table->integer('salary_month')->default(0);
            $table->integer('salary_year')->default(0);
            $table->integer('salary_status')->default(0);
            $table->date('payment_date')->nullable();
            $table->float('total_salary')->default(0);
            $table->float('total_deduction')->default(0);
            $table->float('net_payable_salary')->default(0);
            $table->text('employee_salary_sheet_ids')->nullable();
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
        Schema::dropIfExists('monthly_salary_reports');
    }
}
