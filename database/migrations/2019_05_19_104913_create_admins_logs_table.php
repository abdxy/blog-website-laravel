<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsLogsTable extends Migration
{
    /**
     * 
     *
     * @return void
     * 
     * 
     */
    public function up()
    {
        Schema::create('admins_logs', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->integer("admin_id");
            $table->string("ip");
            $table->string("country");
            $table->string("machine_type");
            $table->string("os");
            $table->timestamps("singin_at");
            $table->timestamps("singout_at");
            $table->timestamps("last_activity");
            $table->timestamps();

            $table->foreign('admin_id')
             ->references('id')->on('admins')
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
        Schema::dropIfExists('admins_logs');
    }
}
