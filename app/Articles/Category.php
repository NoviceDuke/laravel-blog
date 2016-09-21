<?php

namespace App\Articles;

use App\Core\Eloquent;

class Category extends Eloquent
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
    ** 存取器                                                                 **
    **------------------------------------------------------------------------*/

    /**
     *  在使用Category Model設定name時，會進入此存取器
     *  自動判斷重複的name並給予新的name
     *  自動填補slug
     */
    public function setNameAttribute($value)
    {
        // 判斷name是否重複
        if (($count = $this->where('name', 'like', '%'.$value.'%')->count()) != 0) {
            $this->attributes['name'] = $value.'-'.$count;
        } else {
            $this->attributes['name'] = $value;
        }
        // 自動填補slug
        if (empty($this->slug)) {
            $this->attributes['slug'] = str_slug($this->attributes['name'], '-');
        }
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
        return '/category/'.$this->slug;
    }
}
