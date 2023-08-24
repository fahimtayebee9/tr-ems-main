<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->date('due_date');
            $table->float('total_payable')->default(0)->nullable();
            $table->float('advance_payment')->default(0)->nullable();
            $table->float('balance')->default(0)->nullable();
            $table->float('discount')->default(0)->nullable();
            $table->float('total_after_discount')->default(0)->nullable();
            $table->float('tax')->default(0)->nullable();
            $table->float('shipping')->default(0)->nullable();
            $table->integer('status')->default(0);
            $table->string('client_name')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_address')->nullable();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->foreign('theme_id')->references('id')->on('pdf_themes')->onDelete('cascade');
            $table->unsignedBigInteger('client_account_id')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
