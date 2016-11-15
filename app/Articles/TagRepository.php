<?php

namespace App\Articles;

use App\Core\EloquentRepository;
use App\Accounts\User;

/**
 *  負責處理 Article Query的邏輯.
 */
class TagRepository extends EloquentRepository
{
    /**
     * @var Tag
     */
    protected $model;

    /**
     *  建構子依賴注入 Tag.
     *
     *  @param Tag::class
     */
    public function __construct(Tag $tag)
    {
        $this->model = $tag;
    }
    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/

    public function createByNames(array $names)
    {
        $tags = collect();
        foreach ($names as $name) {
            $tag = $this->model->firstOrCreate(['name'=>$name]);
            $tags->push($tag);
        }
        return $tags;
    }

    /**
     *  回傳Vue Tag Selector可用的Json陣列
     */
    public function getAllForTagSelector()
    {
        $tags = $this->model->all()->pluck(['name'])->toArray();
        return json_encode($tags);
    }
}
