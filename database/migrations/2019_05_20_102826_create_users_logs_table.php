<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id");
            $table->string("ip");
            $table->string("country");
            $table->string("machine_type");
            $table->string("os");
            $table->timestamp("singin_at")->nullable();
            $table->timestamp("singout_at")->nullable();
            $table->timestamp("last_activity")->nullable();
            $table->timestamps();

            $table->foreign('user_id')
             ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_logs');
    }
}
