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
            $table->increments('id');
            $table->unsignedInteger("user_id");
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("description");
            $table->text("content");
            $table->string("cover")->nullable();
            $table->integer("rating")->nullable();
            $table->unsignedInteger("category_id");
            $table->enum("status",["accepted","rejected","underReview","draft"]);
            $table->timestamp("published_at")->nullable();
            $table->timestamp("last_rejected_at")->nullable();
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
        Schema::dropIfExists('articles');
    }
}
