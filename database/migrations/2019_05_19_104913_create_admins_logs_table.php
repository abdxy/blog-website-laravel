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
            $table->increments('id');
            $table->unsignedInteger("admin_id");
            $table->string("ip");
            $table->string("country");
            $table->string("machine_type");
            $table->string("os");
            $table->timestamp("singin_at")->nullable();
            $table->timestamp("singout_at")->nullable();
            $table->timestamp("last_activity")->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
             ->references('id')->on('admins');
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
