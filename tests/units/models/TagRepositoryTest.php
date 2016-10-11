<?php

namespace Tests\units\models;

use Tests\TestCase;
use App\Articles\Tag;
use App\Articles\TagRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagRepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @var TagRepository
     */
    protected $repository;

    public function setUp()
    {
        parent::setUp();
        // $this->articleProphecy = $this->prophesize(Article::class);
        $this->repository = $this->app->make(TagRepository::class);
    }

     /**
      * 測試產生數個Tag.
      *
      * @group unit
      * @group repository
      */
     public function testCanCreateManyTagByNames()
     {
         $this->printTestStartMessage(__FUNCTION__);
         $names = ['happy', 'second', 'hello'];
         $tags = $this->repository->createByNames($names);

         $this->assertEquals($tags->first()->name, 'happy');
         $this->assertEquals($tags->last()->name, 'hello');

     }
}
