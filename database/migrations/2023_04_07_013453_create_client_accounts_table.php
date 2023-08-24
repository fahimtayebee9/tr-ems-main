<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_name');
            $table->integer('marketplace')->default(0)->comment('0 = US, 1 = CA, 3 = WALMART');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('owner_name')->nullable()->default(null);
            $table->string('owner_email')->nullable()->default(null);
            $table->string('owner_phone')->nullable()->default(null);
            $table->string('owner_address')->nullable()->default(null);
            $table->integer('status')->default(1)->comment('0 = Inactive, 1 = Active');
            $table->unsignedBigInteger('parent_id')->default(0)->comment('0 = Parent, 1 = Child');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('client_accounts')->onDelete('cascade');
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
        Schema::dropIfExists('client_accounts');
    }
}
