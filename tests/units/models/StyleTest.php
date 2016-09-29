<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Article;
use App\Articles\Category;
use App\Articles\Comment;
use App\Articles\Style;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StyleTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * 測試使用factory產生Style.
     *
     * @group unit
     * @group eloquent
     */
    public function testCreateStyleByFactory()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建2筆Style
        factory(Style::class, 2)->create();

        // When
        // 當取得所有Style時
        $styles = Style::all();

        // Then
        // 斷言 : 所有Style數量相等於10
        $this->assertCount(2, $styles);

        //斷言 : 第一個Style有被賦予值
        $style = $styles->first();
        $this->assertNotEmpty($style->name);
    }

    /**
     * 測試使用Category連結已存在的Style.
     *
     * @group unit
     * @group eloquent
     */
    public function testCategoryCanStyle()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建1筆Style、1筆類別
        $style = factory(Style::class)->create();
        $category = factory(Category::class)->create();
        // When
        $category->style()->save($style);
        $category->style()->save($style);
        // Then
        $this->assertEquals(1, $category->style()->count());
    }

    /**
     * 測試使用Category連結已存在的Style.
     *
     * @group unit
     * @group eloquent
     */
    public function testStyleCanStyleable()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 創建1筆Style、1筆類別
        $style = factory(Style::class)->create();
        $category = factory(Category::class)->create();
        // When
        $category->useStyle($style);
        // Then
        $this->assertEquals($category->name, $style->styleable->name);
    }

}
