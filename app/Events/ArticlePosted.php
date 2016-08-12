<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Article;

class ArticlePosted extends Event
{
    use SerializesModels;

    // 宣告
    public $article;
    /**
     * 建立事件實體.
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the channels the event should be broadcast on.
     * 沒用到.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
