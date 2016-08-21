<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\Article;

class Category extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'categories';
    protected $fillable = [
            'name',         //種類名稱
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    /**
     * 一個種類擁有多個文章.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /*------------------------------------------------------------------------**
    ** 自訂功能函數                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 在此類別下新增一筆文章.
     */
    public function addArticle(Article $article)
    {
        return $this->articles()->save($article);
    }

    public function path()
    {
        return '/category/'.$this->name;
    }
}
