<?php

namespace App\Articles;
use App\Articles\Article;
use App\Core\EloquentRepository;

class ArticleRepository extends EloquentRepository
{
    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/
    protected $model;

    /**
     *  建構子依賴注入 Article
     *  @param Article::class
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
    /**
     *  回傳以Slug為搜尋目標的Article
     *
     *  @return string
     */
    public function getFromSlug($slug)
    {
        return $this->model->whereSlug($slug)->first();
    }
}
