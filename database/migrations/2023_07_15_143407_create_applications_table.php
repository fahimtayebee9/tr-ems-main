<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('application_id')->unique();
            $table->unsignedBigInteger('employee_id');
            $table->string('subject');
            $table->text('description');
            $table->integer('application_type')->comment('1 = Leave, 2 = Salary Review, 3 = Others');
            $table->unsignedBigInteger('approved_by_astmanager')->nullable();
            $table->unsignedBigInteger('approved_by_hr')->nullable();
            $table->integer('status_by_astmanager')->default(1)->comment('1 = Pending, 2 = Approved, 3 = Rejected');
            $table->integer('status_by_hr')->default(1)->comment('1 = Pending, 2 = Approved, 3 = Rejected');
            $table->integer('apply_to')->default(1)->comment('1: HR Manager, 2: CEO');
            $table->string('default_apply_to')->default('1')->comment('1: HR Manager, 2: CEO');
            $table->integer('is_seen')->default(0)->comment('0 = Not Seen, 1 = Seen By HR, 2 = Seen By CEO, 3 = Seen By Employee');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('approved_by_astmanager')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('approved_by_hr')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('applications');
    }
}
