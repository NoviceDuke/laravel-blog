<?php

namespace App\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*------------------------------------------------------------------------**
    ** Relation 定義                                                          **
    **------------------------------------------------------------------------*/

    /**
     * 關聯資料庫  一個使用者 對 多個文章.
     */
    public function socailAccount()
    {
        return $this->hasOne(SocialAccount::class);
    }

    /**
     * 關聯資料庫  一個使用者 對 多個文章.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /*------------------------------------------------------------------------**
    ** 自訂功能函數                                                            **
    **------------------------------------------------------------------------*/

    /**
     * 於當下使用者新增一個Article文章.
     *
     * @param Article::Class
     */
    public function addArticle(Article $article)
    {
        return $this->articles()->save($article);
    }
}
