<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_articles', function (Blueprint $table) {
            $table->integerIncrements("id");
            $table->integer("article_id");
            $table->integer("category_id");
            $table->timestamps();
            
            $table->foreign('article_id')
            ->references('id')->on('articles')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('id')->on('categories')
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
        Schema::dropIfExists('categories_articles');
    }
}
