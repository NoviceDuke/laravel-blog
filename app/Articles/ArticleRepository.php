<?php

namespace App\Articles;

use App\Core\EloquentRepository;
use App\Accounts\User;

/**
 *  負責處理 Article Query的邏輯.
 */
class ArticleRepository extends EloquentRepository
{
    /**
     * @var Article
     */
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
     *  @return Article|Builder|null
     */
    public function getFromSlug(String $slug)
    {
        return $this->model->whereSlug($slug)->first();
    }

    public function createFromUser($data, User $user)
    {
        $article = $this->create($data);
        $user->addArticle($article);

        return $article;
    }

    public function getNextArticles(Article $article, $count)
    {
        $standardId = $article->id;
        $articles = $this->model->where('id', '>', $standardId)->orderBy('id', 'ASC')->take($count)->get();

        return $articles;
    }
    public function getPreviousArticles(Article $article, $count)
    {
        $standardId = $article->id;
        $articles = $this->model->where('id', '<', $standardId)->orderBy('id', 'DESC')->take($count)->get();

        return $articles;
    }
}
