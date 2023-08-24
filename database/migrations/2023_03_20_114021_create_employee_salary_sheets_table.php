<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalarySheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salary_sheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('payroll_account_id')->nullable();
            $table->foreign('payroll_account_id')->references('id')->on('payroll_accounts')->onDelete('cascade');
            $table->integer('salary_month')->default(0);
            $table->integer('salary_year')->default(0);
            $table->float('other_allowance')->default(0);
            $table->float('total_salary')->default(0);
            $table->float('total_deduction')->default(0);
            $table->float('net_salary')->default(0);
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
        Schema::dropIfExists('employee_salary_sheets');
    }
}
