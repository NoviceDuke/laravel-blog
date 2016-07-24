<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
            'author_email', 'title', 'content', 'tags', 'pic_url', 'slug',
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
     *  反向資料庫關聯 文章屬於使用者
     *  更改預設的ForeignKey 成 author_email !!!! Laravel關聯預設是user_id.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'author_email');
    }

    /**
     *  反向資料庫關聯 文章屬於使用者
     *  更改預設的ForeignKey 成 author_email !!!! Laravel關聯預設是user_id.
     */
    public function path()
    {
        return '/post/'.$this->slug;
    }
}
