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
            $table->increments('id');
            $table->string("name");
            $table->string("slug")->unique();
            $table->string("cover")->default("default.png");
            $table->enum('status', ["active", "inactive"]);
            $table->integer("numbers_of_articles")->default(0);
            $table->integer("numbers_of_rating")->default(0);
            $table->timestamp("published_at")->nullable();
            $table->timestamp("last_add_at")->nullable();
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
