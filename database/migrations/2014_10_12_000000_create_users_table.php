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
            $table->increments('id');
            $table->string("full_name");
            $table->string("avatar")->default("default.png");
            $table->String('phone')->nullable();
            $table->unsignedInteger('country_id');
            $table->String('social_account')->nullable();
            $table->String('website')->nullable();
            $table->unsignedInteger('level_id');
            $table->enum('status', ["active", "inactive", "deleted"])->default("active");
            $table->integer("points")->default(0);
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

     
                
        });
    }


    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
