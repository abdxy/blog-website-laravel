<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('admins', function (Blueprint $table) {
                $table->increments('id');
                $table->string("full_name");
                $table->string("avatar");
                $table->unsignedInteger('country_id')->nullable();
                $table->String('type');
                $table->enum('status', ["active", "inactive", "deleted"]);
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamps();


            });
        }
        
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
