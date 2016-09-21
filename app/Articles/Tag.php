<?php

namespace App\Articles;

use App\Core\Eloquent;
use App\Articles\Article;

class Tag extends Eloquent
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'tags';
    protected $fillable = [
        'name',            // tag名稱
        'frequency',       // 被使用次數
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    /**
     *  多篇文章 對 多個標籤
     *  中間表名稱慣例  aaas_bbb 底線前後位由首字母排序，這裡是article_tag
     *  laravel 默認的是 article_tag 單數的表名稱
     *  自動維護中間表的時間欄位.
     */
    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }

    /*------------------------------------------------------------------------**
    ** 存取器 Accessors                                                        **
    **------------------------------------------------------------------------*/

    /**
     *  自動傳入原始欄位值 $frequency
     *  存取器處理Relation Count，算這個Tag被使用多少次
     *  如果資料不正確就自動維護欄位內容.
     */
    public function getFrequencyAttribute($frequency)
    {
        if ($frequency != $this->articles()->count()) {
            $this->attributes['frequency'] = $this->articles()->count();
            $this->save();
        }

        return $this->attributes['frequency'];
    }

    /**
     *  在使用Tag Model設定name時，會進入此存取器
     *  自動判斷重複的name並給予新的name
     *  自動填補slug
     */
    public function setNameAttribute($value)
    {
        // 判斷name是否重複
        if (($count = $this->where('name', $value)->count()) != 0) {
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
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/

    /**
     *  在當下的Tag新增一個Article.
     *
     *  @param Article::Class
     */
    public function addArticle(Article $article)
    {
        if(!$this->articles()->find($article->id))
            return $this->articles()->attach($article);
    }

    public function path()
    {
        return '/tag/'.$this->slug;
    }
}
