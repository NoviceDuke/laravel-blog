<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
            'user_id',      // ForeignKey
            'category_id',   // ForeignKey
            'title',        // 文章標題
            'content',      // 文章內容
            'tags',         // 文章tag
            'pic_url',      // 圖片連結
            'slug',         // slug
    ];

    /**
     *  關聯資料庫  一篇文章 對 多個回覆留言
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
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

    /**
     *  反向資料庫關聯 文章屬於使用者.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     *  資料庫關聯 文章會有一種文章種類 Nullable
     *  常理判斷不是一定要設定文章種類.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     *  取得當下的slug，回傳已經串上slug的路徑.
     *
     *  @return string
     */
    public function path()
    {
        return '/post/'.$this->slug;
    }
}
