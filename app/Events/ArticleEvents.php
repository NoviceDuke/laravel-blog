<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Articles\Article;

class ArticleEvents extends Event
{
    use SerializesModels;

    /**
     * 宣告事件處理會使用到的變數.
     */
    public $article;
    public $type;

    /**
     * 建立事件實體.
     * 建立此事件時，必須傳入兩個參數.
     *
     * @param Article::class 觸發此事件的Article
     * @param $type string 此事件的類別(自定義於 $type_container)
     */
    public function __construct(Article $article, $type)
    {
        $this->article = $article;
        $this->type = $type;
    }

    /**
     * Get the channels the event should be broadcast on.
     * 廣播的部分，還沒用到.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
