<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTagTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('article_tag', function (Blueprint $table) {
            // 中間表邏輯上不需要自己的PK，但沒有PK的話Mysql會Warning
            // 目前選擇的項目不含唯一(Unique)的資料欄位，將無法執行表格的編輯/核選、編輯、複製、刪除等相關的功能
            $table->increments('id');

            // 使用index(索引)，讓query更快?
            $table->integer('article_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned()->index();

            $table->timestamps();

            //foreign Key Set
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('article_tag');
    }
}
