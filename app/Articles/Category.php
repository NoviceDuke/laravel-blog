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

    /**
     * 取得當下Category關聯的Style。
     */
    public function style()
    {
        return $this->morphOne(Style::class, 'styleable');
    }

    /*------------------------------------------------------------------------**
    ** 存取器                                                                 **
    **------------------------------------------------------------------------*/
    public function getStyleAttribute($style)
    {
        if($this->style()->count())
            return $this->getRelationValue('style');
        else {
            return Style::findName('Default');
        }
    }
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

    /**
     * 在此類別連結一個Style
     */
    public function useStyle(Style $style)
    {
        return $this->style()->save($style);
    }

    public function path()
    {
        return '/category/'.$this->slug;
    }
}
