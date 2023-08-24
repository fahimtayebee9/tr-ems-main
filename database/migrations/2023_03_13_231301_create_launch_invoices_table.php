<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaunchInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('launch_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('invoice_number')->nullable()->unique();
            $table->date('invoice_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total_launch')->default(0);
            $table->integer('total_cost')->default(0);
            $table->integer('status')->default(0)->comment('0: Pending, 1: Paid, 2: Cancelled');
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
        Schema::dropIfExists('launch_invoices');
    }
}
