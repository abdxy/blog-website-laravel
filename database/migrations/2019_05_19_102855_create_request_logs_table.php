<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_logs', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->integer("article_reviews_id");
            $table->integer("supervisor_id");
            $table->string("notes");   
            $table->string("status");
            $table->timestamps("accepted_at");
            $table->timestamps("rejected_at");
            $table->timestamps();

            $table->foreign('article_reviews_id')
            ->references('id')->on('article_reviews')
            ->onDelete('cascade');
            $table->foreign('supervisor_id')
            ->references('id')->on('admins')
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
        Schema::dropIfExists('request_logs');
    }
}
