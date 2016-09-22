<?php

namespace Tests\units\contollers;

use Auth;
use Tests\TestCase;
use Tests\units\traits\Prophesizable;
use App\Articles\Article;
use App\Accounts\User;
use App\Articles\ArticleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Http\Controllers\Blog\ArticleController;

/**
 *  測試 App\Http\Controllers\Blog\ArticleController.
 *
 *  測試Controller主要目的是要測試各個function內的商業邏輯是否有被Trigger
 */
class BlogArticleControllerTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;
    use WithoutMiddleware;
    use Prophesizable;
     /**
      * @var Prophecy
      */
     protected $repository;

    /**
     * @var ArticleController
     */
    protected $controller;

    /**
     * Setup 測試生命週期setUp時建構ArticleController.
     * 使用$this->app->make(); 會自動依賴注入.
     */
    public function setUp()
    {
        parent::setUp();
        $this->repository = $this->initProphesize(ArticleRepository::class);
        $this->controller = $this->app->make(ArticleController::class);
    }

    /**
     * Clean 測試生命週期tearDown時，清除各個資料.
     */
    public function tearDown()
    {
        $this->controller = null;
        parent::tearDown();
    }

    /**
     * 測試 ArticleController成功被建立.
     */
    public function testCanInitController()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->assertNotNull($this->controller);
    }

    /**
     * 測試 ArticleRepository成功被建立.
     */
    public function testCanInitRepository()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->assertNotNull($this->repository);
    }
    /**
     * 測試 ArticleController index.
     */
    public function testCanIndex()
    {
        $this->printTestStartMessage(__FUNCTION__);
        $this->assertNotNull($this->controller->index());
    }

    /**
     * 測試 ArticleController show.
     */
    public function testShowTriggers()
    {
        $this->printTestStartMessage(__FUNCTION__);

        // Given
        $article = factory(Article::class)->create(['slug' => 'hello']);

        // Prophecy and Mock
        $this->repository->getFromSlug('hello')
        ->shouldBeCalledTimes(1)->willReturn($article);
        $this->repository->getNextArticles($article, 1)->willReturn('');
        $this->repository->getPreviousArticles($article, 1)->willReturn('');

        // When
        $view = $this->controller->show('hello');

        $this->assertEquals($view->article, $article);
    }

    /**
     * 測試 ArticleController store.
     */
    public function testStoreTriggers()
    {
        $this->printTestStartMessage(__FUNCTION__);

        // Given
        $this->withoutEvents();
        $user = factory(User::class)->create();
        $requestValue = [
            'title' => 'Sally hi',
            'date' => '2016-08-29',
            'content' => 'content heyhey',
        ];
        $mergeValue = [
            'title' => 'Sally hi',
            'date' => '2016-08-29',
            'content' => 'content heyhey',
        ];
        $article = factory(Article::class)->create([
            'title' => 'Sally hi',
            'content' => 'content heyhey',
            'slug' => 'sally-hi',
        ]);

        // Prophecy and Mock
        $this->repository->createFromUser($mergeValue, $user)->shouldBeCalled()->willReturn($article);
        Auth::shouldReceive('user')->once()->andReturn($user);

        // When
        $this->call('POST', '/article', $requestValue);

        //Then
        $this->assertRedirectedTo('/article/sally-hi');
        $this->seeInDatabase('articles', ['slug' => 'sally-hi']);
    }
}
