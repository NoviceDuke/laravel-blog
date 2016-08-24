<?php

namespace Tests\units\features;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\Comment;
use App\Articles\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * 測試使用factory產生Article.
     *
     * 斷言所有Article內的欄位都有資料
     */
    public function testCreateArticlesByFactory()
    {
        // Given
        // 創建隨機數筆Article
        $random = rand(1, 30);
        factory(Article::class, $random)->create();

        // When
        // 當取得所有Article時
        $articles = Article::all();

        // Then
        // 斷言 : 所有文章數量相等於random數
        $this->assertCount($random, $articles);

        //斷言 : 每個Article都有被賦予值
        foreach ($articles as $article) {
            $this->assertNotEmpty($article->title);
            $this->assertNotEmpty($article->content);
            $this->assertNotEmpty($article->slug);
        }
    }
    /**
     * 測試一篇文章加入一篇回覆
     *
     * 斷言經由關聯的方式取出的回覆同等於加入的那筆回覆
     */
    public function testArticleCanAddAComment()
    {
        // Given
        // 新增文章及回復各一筆
        $article = factory(Article::class)->create(['title' => 'hello Comment']);
        $comment = factory(Comment::class)->create(['author' => 'newAuthor']);

        // When
        // 當文章新增一個回覆時
        $article->addComment($comment);

        // Then
        // 斷言 : 這個文章的所有關聯集合的第一個回復的標題與內容，會同等於回覆
        $this->assertEquals($article->comments()->first()->title , $comment->title);
        $this->assertEquals($article->comments()->first()->content , $comment->content);
    }

    /**
     * 測試一篇文章加入一筆Tag
     *
     * 斷言經由關聯的方式取出的Tag同等於加入的那筆Tag
     */
    public function testArticleCanAddATag()
    {
        // Given
        // 新增文章及Tag各一筆
        $article = factory(Article::class)->create(['title' => 'hello Tag']);
        $tag = factory(Tag::class)->create(['name' => 'PHPtag']);

        // When
        // 當文章新增一個Tag時
        $article->addTag($tag);

        // Then
        // 斷言 : 這個文章的所有關聯集合的第一個Tag的名稱與使用頻率，會同等於Tag
        $this->assertEquals($article->tags()->first()->name , $tag->name);
        $this->assertEquals($article->tags()->first()->frequency , $tag->frequency);
    }
}
