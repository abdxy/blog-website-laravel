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
            $table->increments('id');
            $table->unsignedInteger("article_reviews_id");
            $table->unsignedInteger("supervisor_id");
            $table->string("notes")->nullable();   
            $table->string("status");
            $table->timestamp("accepted_at")->nullable();
            $table->timestamp("rejected_at")->nullable();
            $table->timestamps();

            $table->foreign('article_reviews_id')
            ->references('id')->on('article_reviews');
            $table->foreign('supervisor_id')
            ->references('id')->on('admins');
          
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
