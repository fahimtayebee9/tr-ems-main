<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('report_id')->unique();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_type')->nullable();
            $table->float('file_size')->nullable();
            $table->string('date_range')->nullable();
            $table->string('report_theme')->nullable();
            $table->string('accounts_name')->nullable();
            $table->string('accounts_ids')->nullable();
            $table->string('paper_size')->nullable();
            $table->string('orientation')->nullable();
            $table->string('page_margin')->nullable();
            $table->longText('tables_json')->nullable();
            $table->longText('charts_json')->nullable();
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
        Schema::dropIfExists('pdf_reports');
    }
}
