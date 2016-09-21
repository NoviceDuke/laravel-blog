<?php

namespace App\Listeners\ArticleListeners;

use App\Events\ArticleEvents\ArticleWasPosted;
use Log;

class ArticleLogsListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param ArticleWasPosted $event
     */
    public function handle($event)
    {
        $method = 'on'.class_basename($event);
        if (method_exists($this, $method)) {
            call_user_func([$this, $method], $event);
        }
    }

    private function onArticleWasPosted($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被建立: '.$event->article);
    }

    private function onArticleWasDeleted($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被刪除: '.$event->article);
    }

    private function onArticleWasUpdated($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被更新: '.$event->article);
    }

    private function onArticleWasRead($event)
    {
        Log::useDailyFiles(storage_path().'/logs/article.log');
        Log::info('文章被閱讀: '.$event->article);
    }
}
