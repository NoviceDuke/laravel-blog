<?php

namespace App\Accounts;

use App\Core\AuthEloquent;
use App\Articles\Article;

class User extends AuthEloquent
{
    /*------------------------------------------------------------------------**
    ** Entity 定義                                                            **
    **------------------------------------------------------------------------*/
    protected $fillable = [
        'name',
        'email',
        'password',
        'about_me',         //關於我
        'picture',          //照片
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

    /**
     * 於當下使用者新增一個社群帳號.
     *
     * @param SocialAccount::Class
     */
    public function addSocialAccount(SocialAccount $socialAccount)
    {
        return $this->socailAccount()->save($socialAccount);
    }
}
