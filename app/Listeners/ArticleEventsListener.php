<?php

namespace App\Listeners;

use Exception;
use Log;

class ArticleEventsListener
{
    /**
     * 將事件Class與監聽函數綁定.
     *
     * @param event
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\ArticleEvents',
            'App\Listeners\ArticleEventsListener@articleEventSwitcher'
        );
    }

    /**
     * 將事件類型分類並指定至各function處理.
     * $event->type將由ArticleEvents給定.
     *
     * @param event
     */
    public function articleEventSwitcher($event)
    {
        switch ($event->type) {
            case 'posted':
                $this->onArticlePosted($event);
                break;
            default:
                throw new Exception('Article Event Type ['.$event->type."] Not Found at App\Listeners\ArticleEventsListener@articleEventSwitcher", 1);
                break;
        }
    }

    /**
     * 事件發生時的處理.
     *
     * @param event
     */
    private function onArticlePosted($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被建立: '.$event->article);
    }
}
