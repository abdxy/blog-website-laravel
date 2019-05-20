<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->integer("user_id");
            $table->string("title");
            $table->string("slug");
            $table->string("description");
            $table->text("content");
            $table->string("cover");
            $table->integer("rating");
            $table->integer("category_id");
            $table->integer("status_id");
            $table->timestamps("published_at");
            $table->timestamps("last_rejected_at");
            $table->timestamps();

            $table->foreign('user_id')
             ->references('id')->on('users')
             ->onDelete('cascade');
             $table->foreign('category_id')
             ->references('id')->on('categories')
             ->onDelete('cascade');
             $table->foreign('status_id')
             ->references('id')->on('article_statuses')
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
        Schema::dropIfExists('articles');
    }
}
