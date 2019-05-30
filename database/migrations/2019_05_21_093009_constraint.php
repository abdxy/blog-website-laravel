<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Constraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users",function(Blueprint $table){

            $table->foreign('level_id')
            ->references('id')->on('levels');
            $table->foreign('country_id')
            ->references('id')->on('countries');
           

        });
        Schema::table("admins",function(Blueprint $table){

            $table->foreign('country_id')
            ->references('id')->on('countries');

        });
        Schema::table("articles",function(Blueprint $table){

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
        //
    }
}
