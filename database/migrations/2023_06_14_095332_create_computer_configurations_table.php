<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_configurations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id')->nullable();
            $table->string('processor')->nullable();
            $table->date('processor_change_date')->nullable();
            $table->string('motherboard')->nullable();
            $table->date('motherboard_change_date')->nullable();
            $table->string('ram')->nullable();
            $table->date('ram_change_date')->nullable();
            $table->string('power_supply')->nullable();
            $table->date('psu_change_date')->nullable();
            $table->string('graphics_card')->nullable();
            $table->date('gpu_change_date')->nullable();
            $table->string('hard_disk')->nullable();
            $table->date('hdd_change_date')->nullable();
            $table->string('ssd')->nullable();
            $table->date('ssd_change_date')->nullable();
            $table->string('keyboard')->nullable();
            $table->date('keyboard_change_date')->nullable();
            $table->string('mouse')->nullable();
            $table->date('mouse_change_date')->nullable();
            $table->string('ups')->nullable();
            $table->date('ups_change_date')->nullable();
            $table->string('monitor')->nullable();
            $table->date('monitor_change_date')->nullable();
            $table->string('headphone')->nullable();
            $table->date('headphone_change_date')->nullable();
            $table->string('casing')->nullable();
            $table->date('casing_change_date')->nullable();
            $table->string('mouse_pad')->nullable();
            $table->date('mouse_pad_change_date')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
        Schema::dropIfExists('computer_configurations');
    }
}
