<?php

namespace App\Articles;

use Illuminate\Database\Eloquent\Model;
use App\Articles\ArticleRepository;
use App\Category;

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
     *  中間表名稱慣例  aaas_bbb 底線前後位由首字母排序，這裡是article_tag
     *  laravel 默認的是 article_tag 單數的表名稱
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
     *  靜態function
     *  使用 Article::repository()
     *  細部功能定義於 ArticleRepository
     *  @return string
     */
    // public static function repository()
    // {
    //     return new ArticleRepository($this);
    // }

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

    /**
     *  在當下的Article新增一個tag.
     *
     *  @param Tag::Class
     */
    public function addTag(Tag $tag)
    {
        return $this->tags()->save($tag);
    }
}
