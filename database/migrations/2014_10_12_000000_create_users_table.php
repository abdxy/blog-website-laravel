<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->string("full_name");
            $table->string("avatar");
            $table->String('phone')->nullable();
            $table->String('country_id')->nullable();
            $table->String('social_account')->nullable();
            $table->String('website')->nullable();
            $table->String('level_id');
            $table->enum('status', ["active", "inactive", "deleted"]);
            $table->integer("points")->default(0);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('level_id')
                ->references('id')->on('levels')
                ->onDelete('cascade');
            $table->foreign('country_id')
                ->references('id')->on('countries')
                ->onDelete('cascade');
        });
    }


    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
