<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('note');
            $table->text('note_url')->nullable();
            $table->integer('marketplace')->comment('1 = AMAZON [US] | 2 = AMAZON [CA] | 3 = WALMART');
            $table->integer('priority')->comment('1 = High | 2 = Medium | 3 = Low')->default(1);
            $table->unsignedBigInteger('client_account_id');
            $table->unsignedBigInteger('user_id');
            $table->date('added_on')->nullable()->default(date('Y-m-d'));
            $table->foreign('client_account_id')->references('id')->on('client_accounts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('meeting_notes');
    }
}
