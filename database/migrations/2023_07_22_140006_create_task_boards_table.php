<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_boards', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('task_uid')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('status')->default(0)->comment('0 = pending, 1 = completed');
            $table->integer('priority')->default(0)->comment('0 = low, 1 = medium, 2 = high');
            $table->float('estimated_duration')->default(0);
            $table->integer('mark_as_complete')->default(0)->comment('0 = no, 1 = yes');
            $table->date('due_date')->nullable()->comment('also known as deadline');
            $table->date('completed_at')->nullable();
            $table->unsignedBigInteger('assigned_by')->nullable();
            $table->unsignedBigInteger('assigned_to')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_to')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('client_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('task_boards');
    }
}
