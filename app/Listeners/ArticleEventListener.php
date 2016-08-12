<?php

namespace App\Listeners;

class ArticleEventListener
{
    /**
     * 事件發生時的處理.
     *
     * @param event
     */
    public function onArticlePosted($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被建立: '.$event->article);
    }
    /**
     * 將事件Class與監聽函數綁定.
     *
     * @param event
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ArticlePosted',
            'App\Listeners\ArticleEventListener@onArticlePosted'
        );
    }
}
