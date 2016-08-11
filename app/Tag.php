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
        'frenquecy',       // 被使用次數
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
