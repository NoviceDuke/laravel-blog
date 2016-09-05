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

    /**
     *  在某一個User下建立Article.並回傳該Article.
     *
     *  建立的Article內容值以傳入的data為基準.
     *  $data = ['title'=>'hello', ... ];
     *  @return Article
     */
    public function createFromUser($data, User $user)
    {
        $article = $this->create($data);
        $user->addArticle($article);

        return $article;
    }

    /**
     *  回傳以$article為基準的下$count筆Articles.
     *
     *  @return array|Builder
     */
    public function getNextArticles(Article $article, $count = null)
    {
        $standardId = $article->id;

        $count = ($count) ? $count:1;
        $articles = $this->model->where('id', '>', $standardId)->orderBy('id', 'ASC')->take($count)->get();

        return $articles;
    }

    /**
     *  回傳以$article為基準的上$count筆Articles.
     *
     *  @return array|Builder
     */
    public function getPreviousArticles(Article $article, $count = null)
    {
        $standardId = $article->id;
        $articles = $this->model->where('id', '<', $standardId)->orderBy('id', 'DESC')->take($count)->get()->reverse();

        return $articles;
    }

    /**
     *  回傳單數的數筆Articles.
     *
     *  @return array|Builder
     */
    public function getOddArticles()
    {
        return $this->model->whereRaw('id%2=1');
    }

    /**
     *  回傳偶數的數筆Articles.
     *
     *  @return array|Builder
     */
    public function getEvenArticles()
    {
        return $this->model->whereRaw('id%2=0');
    }
}
