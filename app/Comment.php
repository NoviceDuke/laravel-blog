<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    //  //反向資料庫關聯 回覆留言屬於文章
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
