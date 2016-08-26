<?php

namespace Tests\units\features;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\Comment;
use App\Articles\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 測試使用factory產生Article.
     *
     * 斷言所有Article內的欄位都有資料
     */
    public function testCreateArticlesByFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建隨機數筆Article
        $random = rand(1, 10);
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
     * 測試一篇文章能夠取得自己的slug路徑.
     *
     * 斷言取出的slug路徑同等於預設的路徑
     */
    public function testArticleCanGetAPath()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章
        $article = factory(Article::class)->create();

        // When
        // 當文章被賦予slug時
        $article->slug = 'hi-my-new-slug';

        // Then
        // 斷言 : 這個文章的所有關聯集合的第一個Tag的名稱與使用頻率，會同等於Tag
        $this->assertEquals($article->path(), '/article/hi-my-new-slug');
    }

    /**
     * 測試一篇文章加入一篇回覆.
     *
     * 斷言經由關聯的方式取出的回覆同等於加入的那筆回覆
     */
    public function testArticleCanAddAComment()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章及回復各一筆
        $article = factory(Article::class)->create(['title' => 'hello Comment']);
        $comment = factory(Comment::class)->create(['author' => 'newAuthor']);

        // When
        // 當文章新增一個回覆時
        $article->addComment($comment);

        // Then
        // 斷言 : 這個文章的所有關聯集合的第一個回復的標題與內容，會同等於回覆
        $this->assertEquals($article->comments()->first()->title, $comment->title);
        $this->assertEquals($article->comments()->first()->content, $comment->content);
    }
    /**
     * 測試一篇文章刪除一筆回覆的關聯
     *
     * 斷言經由關聯的方式取出的回覆為空值
     */
    public function testArticleCanRemoveAComment()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章及回覆各一筆，並進行關聯
        $article = factory(Article::class)->create(['title' => 'hello Comment']);
        $comment = factory(Comment::class)->create(['author' => 'newAuthor']);
        $article->addComment($comment);

        // When
        // 當文章卸除一個回覆關聯時
        $article->removeComment($comment);

        // Then
        // 斷言 : 取得文章的所有回覆的關聯集合時，結果會為空值
        $this->assertEmpty($article->comments()->get());

        // 斷言 : 原先產生的article與tag皆存在於DB中
        $this->assertNotEmpty(Article::where('title', 'hello Comment')->first()->get());
        $this->assertNotEmpty(Comment::where('author', 'newAuthor')->first()->get());
    }

    /**
     * 測試一篇文章直接刪除一筆回覆
     *
     * 斷言經由關聯的方式取出的回覆為空值
     * 且被刪除的回覆已不在資料庫中
     */
    public function testArticleCanDeleteAComment()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章及回覆各一筆，並進行關聯
        $article = factory(Article::class)->create(['title' => 'hello Comment']);
        $comment = factory(Comment::class)->create(['author' => 'newAuthor']);
        $article->addComment($comment);

        // When
        // 當文章刪除一個回覆關聯時
        $article->deleteComment($comment);

        // Then
        // 斷言 : 取得文章的所有回覆的關聯集合時，結果會為空值
        $this->assertEmpty($article->comments()->get());

        // 斷言 : 原先產生的article存在於DB中
        $this->assertNotEmpty(Article::where('title', 'hello Comment')->first()->get());
        // 斷言 : 原先產生的article不存在於DB中
        $this->assertNull(Comment::where('author', 'newAuthor')->first());
    }

    /**
     * 測試一篇文章加入一筆Tag.
     *
     * 斷言經由關聯的方式取出的Tag同等於加入的那筆Tag
     */
    public function testArticleCanAddATag()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章及Tag各一筆
        $article = factory(Article::class)->create(['title' => 'hello Tag']);
        $tag = factory(Tag::class)->create(['name' => 'PHPtag']);

        // When
        // 當文章新增一個Tag時
        $article->addTag($tag);

        // Then
        // 斷言 : 這個文章的所有關聯集合的第一個Tag的名稱與使用頻率，會同等於Tag
        $this->assertEquals($article->tags()->first()->name, $tag->name);
        $this->assertEquals($article->tags()->first()->frequency, $tag->frequency);
    }
    /**
     * 測試一篇文章刪除一筆Tag.
     *
     * 斷言經由關聯的方式取出的Tag為空值
     */
    public function testArticleCanRemoveATag()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章及Tag各一筆，並進行關聯
        $article = factory(Article::class)->create(['title' => 'hello Tag']);
        $tag = factory(Tag::class)->create(['name' => 'PHPtag']);
        $article->addTag($tag);
        // When
        // 當文章卸除一個Tag關聯時
        $article->removeTag($tag);

        // Then
        // 斷言 : 取得文章的所有Tag關聯集合時，結果會為空值
        $this->assertEmpty($article->tags()->get());

        // 斷言 : 原先產生的article與tag皆存在於DB中
        $this->assertNotEmpty(Article::where('title', 'hello Tag')->first()->get());
        $this->assertNotEmpty(Tag::where('name', 'PHPtag')->first()->get());
    }
}
