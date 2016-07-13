<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author_email');
            $table->string('title')->unique();
            $table->text('content');
            $table->string('tags')->nullable();
            $table->string('pic_url')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            //foreign Key Set
            $table->foreign('author_email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
