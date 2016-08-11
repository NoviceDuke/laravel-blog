<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $table = 'articles';
    protected $fillable = [
            'user_id',      // ForeignKey
            'category_id',   // ForeignKey
            'title',        // 文章標題
            'content',      // 文章內容
            'tags',         // 文章tag
            'pic_url',      // 圖片連結
            'slug',         // slug
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    /**
     *  一篇文章 對 多個回覆留言
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     *  多篇文章 對 多個標籤
     *  中間表名稱慣例  aaa_bbbs 底線前後位由首字母排序，這裡是post_tags
     *  自動維護中間表的時間欄位.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     *  文章屬於使用者.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     *  資料庫關聯 文章會有一種文章種類 Nullable
     *  常理判斷設定文章種類不是必要的動作.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*------------------------------------------------------------------------**
    ** 自訂函數方法                                                            **
    **------------------------------------------------------------------------*/

    /**
     *  取得當下的slug，回傳已經串上slug的路徑.
     *
     *  @return string
     */
    public function path()
    {
        return '/article/'.$this->slug;
    }

    /**
     *  在當下的Post新增一筆回覆留言
     *
     *  @param Comment::Class
     */
    public function addComment(Comment $comment)
    {
        return $this->comments()->save($comment);
    }
}
