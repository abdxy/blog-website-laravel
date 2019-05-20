<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_reviews', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->integer("article_id");
            $table->integer("user_id");
            $table->integer("supervisor_id");
            $table->enum("request_status",["new","under_review","completed","cancled"]);
            $table->string("notes");   
            $table->enum("status",["accepted","rejected"]);
            $table->timestamps("accepted_at");
            $table->timestamps("rejected_at");
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('supervisor_id')
            ->references('id')->on('admins')
            ->onDelete('cascade');
            $table->foreign('article_id')
            ->references('id')->on('articles')
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
        Schema::dropIfExists('article_reviews');
    }
}
