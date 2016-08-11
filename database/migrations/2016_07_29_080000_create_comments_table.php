<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->string('status');
            $table->string('author');
            $table->string('email');
            $table->string('url');
            $table->integer('article_id')->unsigned()->default(1);
            $table->timestamps();

            //foreign Key Set
            $table->foreign('article_id')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
