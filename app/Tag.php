<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
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
    ** 存取器 Mutators                                                        **
    **------------------------------------------------------------------------*/

    /**
     *  自動傳入原始 $frequency
     *  存取器處理Relation Count，算這個Tag被使用多少次
     *  如果資料不正確就自動維護欄位內容.
     */
    public function getFrequencyAttribute($frequency)
    {
        if ($frequency != $this->articles()->count()) {
            $frequency = $this->articles()->count();
            $this->update(['frequency' => $frequency]);
        }

        return $frequency;
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
        return $this->articles()->save($article);
    }
}
