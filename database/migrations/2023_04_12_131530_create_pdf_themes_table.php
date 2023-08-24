<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePdfThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('font_color')->nullable();
            $table->string('font_family')->nullable();
            $table->string('font_size')->nullable();
            $table->string('font_style')->nullable();
            $table->string('font_weight')->nullable();
            $table->string('font_decoration')->nullable();
            $table->string('font_transform')->nullable();
            $table->integer('theme_type')->default(1)->comment('1=invoice, 2=report, 3=proposal, 4=credit note');
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
        Schema::dropIfExists('pdf_themes');
    }
}
