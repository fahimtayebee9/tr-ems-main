<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientWeeklyMeetingNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_weekly_meeting_notes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('note');
            $table->text('note_url')->nullable();
            $table->integer('marketplace')->comment('1 = AMAZON [US] | 2 = AMAZON [CA] | 3 = WALMART');
            $table->unsignedBigInteger('client_weekly_report_id');
            $table->foreign('client_weekly_report_id')->references('id')->on('client_weekly_reports')->onDelete('cascade');
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
        Schema::dropIfExists('client_weekly_meeting_notes');
    }
}
