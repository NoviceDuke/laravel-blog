<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
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
            $table->integer('post_id')->unsigned()->default(1);
            $table->timestamps();

            //foreign Key Set
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
