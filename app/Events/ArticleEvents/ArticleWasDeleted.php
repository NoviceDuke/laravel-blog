<?php

namespace App\Events\ArticleEvents;

use App\Events\Event;
use App\Articles\Article;
use Illuminate\Queue\SerializesModels;

class ArticleWasDeleted extends Event
{
    use SerializesModels;

    /**
     * @var Article
     */
    public $article;

    /**
     * 建立事件實體.
     * 建立此事件時，必須傳入觸發此事件的文章.
     *
     * @param Article::class 觸發此事件的Article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
