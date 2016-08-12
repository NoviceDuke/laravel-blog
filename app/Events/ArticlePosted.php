<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use App\Article;

class ArticlePosted extends Event
{
    use SerializesModels;
    public $article;
    /**
     * Create a new event instance.
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
