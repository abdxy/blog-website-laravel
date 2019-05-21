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
            $table->increments('id');
            $table->unsignedInteger("article_id");
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("supervisor_id");
            $table->enum("request_status",["new","under_review","completed","cancled"]);
            $table->string("notes")->nullable();   
            $table->enum("status",["accepted","rejected"]);
            $table->timestamp("accepted_at")->nullable();
            $table->timestamp("rejected_at")->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users');
            $table->foreign('supervisor_id')
            ->references('id')->on('admins');
            $table->foreign('article_id')
            ->references('id')->on('articles');
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
