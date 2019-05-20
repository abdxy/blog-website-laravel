<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string("name");
            $table->string("slug");
            $table->string("cover");
            $table->enum('status', ["active", "inactive"]);
            $table->integer("numbers_of_articles");
            $table->integer("numbers_of_rating");
            $table->timestamps("published_at");
            $table->timestamps("last_add_at");
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
        Schema::dropIfExists('categories');
    }
}
