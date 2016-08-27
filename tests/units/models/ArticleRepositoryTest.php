<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Article;
use App\Accounts\User;
use App\Articles\ArticleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @var Prophecy
     */
    protected $articleProphecy;

    /**
     * @var ArticleRepository
     */
    protected $repository;


    /**
     * Setup 測試生命週期setUp時建構ArticleRepository.
     * 使用$this->app->make(); 會自動依賴注入.
     */
    public function setUp()
    {
        parent::setUp();
        $this->articleProphecy = $this->prophesize(Article::class);
        $this->repository = $this->app->make(ArticleRepository::class);
    }

    /**
     * Clean 測試生命週期tearDown時，清除各個資料.
     */
    public function tearDown()
    {
        $this->repository = null;
        $this->articleProphecy = null;
        parent::tearDown();
    }

    /**
     * 測試 可以透過slug取得文章.
     *
     * 斷言 使用Repository取得的文章標題 等同於 手動創建的文章標題
     */
    public function testRepositoryCanGetAArticleFromSlug()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        factory(Article::class, 2)->create();
        $articleWithSlug = factory(Article::class)->create(['slug' => 'hey-this-is-my-slug']);

        // When
        $articleFromTaget = $this->repository->getFromSlug('hey-this-is-my-slug');

        // Then
        $this->assertEquals($articleFromTaget->title, $articleWithSlug->title);
    }

    /**
     * 測試 可以透過slug取得文章.
     *
     * 斷言 使用Repository取得的文章標題 等同於 手動創建的文章標題
     */
    public function testRepositoryCanCreateArticleFromUser()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 給予一個user、想創建的article內容
        $user = factory(User::class)->create(['name' => 'TestAutor']);
        $articledatas = [
        'title' => 'hello world',
        'content' => 'hey im not null',
        'slug' => 'hey-this-is-my-slug',
        ];
        // When
        // 執行createFromUser()
        $article = $this->repository->createFromUser($articledatas, $user);

        // Then
        // 斷言 透過createFromUse取得的文章標題 等同於 從Article::take(1)取得的文章標題
        $this->assertEquals($article->title, Article::take(1)->first()->title);

        //斷言 透過createFromUse取得的user_id 等同於 Given時的$user->id
        $this->assertEquals($article->user_id, $user->id);
    }

    /**
     * 測試 可以透過某個article取得接下來的數筆article.
     *
     * 斷言 使用Repository取得的數筆文章 等同於 手動創建的數筆文章
     */
    public function testRepositoryCanGetNextArticles()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 給予一個user、想創建的article內容

        $articleIndex = factory(Article::class)->create();
        $NextArticles = factory(Article::class, 5)->create();


        // When
        // 執行getNextArticles()
        $articles =$this->repository->getNextArticles($articleIndex, 3);

        // Then
        // 斷言 透過getNextArticles取得的$articles內的第一筆資烙 等同於 $NextArticles的第一筆資料
        $this->assertEquals($articles->first()->title, $NextArticles->first()->title);

    }
}
