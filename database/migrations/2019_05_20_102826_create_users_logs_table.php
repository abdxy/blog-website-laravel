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
            $table->integerIncrements('id')->primary();
            $table->integer("user_id");
            $table->string("ip");
            $table->string("country");
            $table->string("machine_type");
            $table->string("os");
            $table->timestamps("singin_at");
            $table->timestamps("singout_at");
            $table->timestamps("last_activity");
            $table->timestamps();

            $table->foreign('user_id')
             ->references('id')->on('users')
             ->onDelete('cascade');
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
