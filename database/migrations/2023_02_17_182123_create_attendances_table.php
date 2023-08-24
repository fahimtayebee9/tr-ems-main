<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id');
            $table->date('date')->nullable();
            $table->timestamp('in_time')->nullable();
            $table->timestamp('out_time')->nullable();
            $table->string('status')->comment('1 = present, 2 = absent, 3 = leave, 4 = holiday, 5 = late, 6 = half day')->default(2);
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->text('note')->nullable();
            $table->integer('late_exemption')->default(0)->comment('0 = no, 1 = yes');
            $table->integer('half_day_exemption')->default(0)->comment('0 = no, 1 = yes');
            $table->integer('overtime_exemption')->default(0)->comment('0 = no, 1 = yes');
            $table->integer('sign_in_from')->default(0)->comment('0 = Office, 1 = Home');
            $table->integer('flexible_signin')->default(0)->comment('0 = Yes, 1 = No');
            $table->text('signin_ip')->nullable();
            $table->text('signin_device')->nullable();
            $table->text('signout_ip')->nullable();
            $table->text('signout_device')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
