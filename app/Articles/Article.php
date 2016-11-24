<?php

namespace App\Articles;

use App\Core\Eloquent;
use Carbon\Carbon;
use App\Accounts\User;
class Article extends Eloquent
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
        return $this->hasMany(Comment::class);
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
        return $this->belongsTo(User::class);
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
    ** 存取器                                                                 **
    **------------------------------------------------------------------------*/

    /**
     *  在使用Article Model設定title時，會進入此存取器
     *  自動判斷重複的title並給予新的title
     *  自動填補slug.
     */
    public function setTitleAttribute($value)
    {
        // 判斷title是否重複  && 自己存不存在
        $count = $this->where('title', $value)->count();
        if ($count && !$this->exists) {
            $this->attributes['title'] = $value.'-'.$count;
        } else {
            $this->attributes['title'] = $value;
        }
        // 自動填補slug
        if (empty($this->slug)) {
            $slug = str_slug($this->attributes['title'], '-');
            if(empty($slug))
                $slug =  urlencode($this->attributes['title']);
            // dd($this->exists);
            $this->attributes['slug'] = $slug;
        }
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
    /**
     *  在當下的Post移除一筆回覆留言的關聯.
     *
     *  @param Comment::Class
     */
    public function removeComment(Comment $comment)
    {
        return $comment->update(['article_id' => null]);
    }

    /**
     *  在當下的Post刪除除一筆回覆留言
     *
     *  @param Comment::Class
     */
    public function deleteComment(Comment $comment)
    {
        return $comment->delete();
    }

    /**
     *  在當下的Article新增一個tag.
     *
     *  @param Tag::Class
     */
    public function addTag(Tag $tag)
    {
        if (!$this->tags()->find($tag->id)) {
            return $this->tags()->attach($tag);
        }
    }

    /**
     *  在當下的Article移除一個指定的tag.
     *
     *  @param Tag::Class
     */
    public function removeTag(Tag $tag)
    {
        return $this->tags()->detach($tag);
    }

    /**
     *  在當下的Article sync指定的tag_ids.
     *
     *  @param Tag::Class
     */
    public function syncTags($tags)
    {
        if (is_a($tags, "Illuminate\Support\Collection")) {
            $ids = $tags->map(function ($item, $key) {
                return $item->id;
            });
            return $this->tags()->sync($ids->toArray());
        }
        elseif(is_array($tags)){
            return $this->tags()->sync($tags);
        }
    }
}
