<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\ArticleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;

class ArticleRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @var Mock
     */
    protected $mockArticle;
    protected $targetArticleRepository;
    /**
     * Setup 測試生命週期setUp時Mock Article.
     */
    public function setUp()
    {
        parent::setUp();
        $this->mockArticle = Mockery::mock(Article::class);
        $this->targetArticleRepository = $this->app->make(ArticleRepository::class);
    }

    /**
     * Clean 測試生命週期tearDown時，清除mock.
     */
    public function tearDown()
    {
        $this->mockArticle = null;
        $this->targetArticleRepository = null;
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
        $articleFromTaget = $this->targetArticleRepository->getFromSlug('hey-this-is-my-slug');

        // Then
        $this->assertEquals($articleFromTaget->title, $articleWithSlug->title);
    }
}
