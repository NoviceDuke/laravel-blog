<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\Category;
use App\Articles\Comment;
use App\Articles\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 測試使用factory產生Tag.
     *
     * 斷言所有Tag內的欄位都有資料
     */
    public function testCreateTagByFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建10筆Tag
        factory(Tag::class, 10)->create();

        // When
        // 當取得所有Tag時
        $tags = Tag::all();

        // Then
        // 斷言 : 所有Tag數量相等於10
        $this->assertCount(10, $tags);

        //斷言 : 第一個Tag有被賦予值
        $tag = $tags->first();
        $this->assertNotEmpty($tag->name);
    }
    /**
     * 測試一個Tag關聯一篇文章.
     *
     * 斷言經由關聯的方式取出的文章同等於加入的那筆文章
     */
    public function testCategoryCanAddArticle()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章種類、文章各一筆
        $tag = factory(Tag::class)->create(['name' => 'newTag']);
        $article = factory(Article::class)->create(['title' => 'hello Article']);

        // When
        // 當文章文章種類新增(關聯)一個文章時
        $tag->addArticle($article);

        // Then
        // 斷言 : 經由關聯的方式取出的文章同等於加入的那筆文章
        $this->assertEquals($tag->articles()->first()->title, $article->title);
    }
}
