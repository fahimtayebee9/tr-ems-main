<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskCheckListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_check_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_board_id');
            $table->string('title');
            $table->integer('status')->default(0)->comment('0 = pending, 1 = completed');
            $table->foreign('task_board_id')->references('id')->on('task_boards')->onDelete('cascade');
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
        Schema::dropIfExists('task_check_lists');
    }
}
