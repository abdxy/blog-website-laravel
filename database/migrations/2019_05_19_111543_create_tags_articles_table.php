<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags_articles', function (Blueprint $table) {
            $table->increments("id");
            $table->unsignedInteger("article_id");
            $table->unsignedInteger("tag_id");
            $table->timestamps();
            
            $table->foreign('article_id')
            ->references('id')->on('articles');

            $table->foreign('tag_id')
            ->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_articles');
    }
}
