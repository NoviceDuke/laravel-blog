<?php

namespace App\Articles;

use App\Core\EloquentRepository;
use App\Accounts\User;

class ArticleRepository extends EloquentRepository
{
    protected $model;

    /**
     *  建構子依賴注入 Article.
     *
     *  @param Article::class
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/

    /**
     *  回傳以Slug為搜尋目標的Article.
     *
     *  @return string
     */
    public function getFromSlug($slug)
    {
        return $this->model->whereSlug($slug)->first();
    }

    public function createFromUser($data, User $user)
    {
        $article = $this->create($data);
        $user->addArticle($article);

        return $article;
    }
}
