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
        // 創建2筆Tag
        factory(Tag::class, 2)->create();

        // When
        // 當取得所有Tag時
        $tags = Tag::all();

        // Then
        // 斷言 : 所有Tag數量相等於10
        $this->assertCount(2, $tags);

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
        // 新增tag、文章各一筆
        $tag = factory(Tag::class)->create(['name' => 'newTag']);
        $article = factory(Article::class)->create(['title' => 'hello Article']);

        // When
        // 當文章tag新增(關聯)一個文章時
        $tag->addArticle($article);

        // Then
        // 斷言 : 經由關聯的方式取出的文章同等於加入的那筆文章
        $this->assertEquals($tag->articles()->first()->title, $article->title);
    }
    /**
     * 測試一篇Tag能夠自動產生slug.
     *
     * 斷言取出的slug不為Null
     *
     * @group unit
     * @group eloquent
     */
    public function testTagCanAutoCreateSlug()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增文章
        $tag = factory(Tag::class)->create();

        // When
        $slug = $tag->slug;

        // Then
        // 斷言 : 取出的slug不為Null
        $this->assertNotNull($slug);
    }

    /**
     * 測試一篇Tag能夠辨別相同的標題，並產出不同的name、slug.
     *
     * @group unit
     * @group eloquent
     */
    public function testTagCanAutoChangeNameWhenSameName()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增Catgory
        $tag = factory(Tag::class)->create(['name'=>'abc']);

        // When
        $tag2 = factory(Tag::class)->create(['name'=>'abc']);
        $tag3 = factory(Tag::class)->create(['name'=>'abc']);
        $tag4 = factory(Tag::class)->create(['name'=>'abc']);
        $tag5 = factory(Tag::class)->create(['name'=>'abc']);


        // Then
        // 斷言 : 取出的name不相同
        $this->assertNotEquals($tag->name, $tag2->name);
        $this->assertEquals("abc-1", $tag2->name);
        $this->assertEquals("abc-2", $tag3->name);
        $this->assertEquals("abc-3", $tag4->name);
        $this->assertEquals("abc-4", $tag5->name);
    }

    /**
     * 測試一個tag能夠取得自己的slug路徑.
     *
     * 斷言取出的路徑同等於預設的路徑
     * @group unit
     * @group eloquent
     */
    public function testTagCanGetAPath()
    {
        $this->printTestStartMessage(__FUNCTION__);
        // Given
        // 新增tag
        $tag = factory(Tag::class)->create();

        // When
        // 當tag被賦予name時
        $tag->slug = 'helloman';

        // Then
        // 斷言 : 取出的路徑同等於預設的路徑
        $this->assertEquals($tag->path(), '/tag/helloman');
    }
}
