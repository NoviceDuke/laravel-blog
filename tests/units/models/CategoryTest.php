<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\Category;
use App\Articles\Comment;
use App\Articles\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 測試使用factory產生Category.
     *
     * 斷言所有Category內的欄位都有資料
     */
    public function testCreateCategoriesByFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建10筆Category
        factory(Category::class, 10)->create();

        // When
        // 當取得所有Category時
        $categories = Category::all();

        // Then
        // 斷言 : 所有Category數量相等於10
        $this->assertCount(10, $categories);

        //斷言 : 第一個Category有被賦予值
        $category = $categories->first();
        $this->assertNotEmpty($category->name);
    }

    /**
     * 測試一個文章種類加入一篇文章.
     *
     * 斷言經由關聯的方式取出的文章同等於加入的那筆文章
     */
    public function testCategoryCanAddArticle()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章種類、文章各一筆
        $category = factory(Category::class)->create(['name' => 'newCategory']);
        $article = factory(Article::class)->create(['title' => 'hello Article']);

        // When
        // 當文章文章種類新增(關聯)一個文章時
        $category->addArticle($article);

        // Then
        // 斷言 : 經由關聯的方式取出的文章同等於加入的那筆文章
        $this->assertEquals($category->articles()->first()->title, $article->title);
    }

}
