<?php

namespace App\Listeners;

class ArticleEventListener
{
    public function onArticlePosted($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被建立: '.$event->article);
    }
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ArticlePosted',
            'App\Listeners\ArticleEventListener@onArticlePosted'
        );
    }
}
