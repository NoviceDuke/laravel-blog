<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Unisharp\Laravelfilemanager\Events\ImageWasUploaded;
use App\Listeners\UploadListener;
use App\Listeners\ArticleListeners\ArticleLogsListener;
use App\Events\ArticleEvents;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ImageWasUploaded::class => [
            UploadListener::class,
        ],
        ArticleEvents\ArticleWasPosted::class => [
            ArticleLogsListener::class,
        ],
        ArticleEvents\ArticleWasDeleted::class => [
            ArticleLogsListener::class,
        ],
        ArticleEvents\ArticleWasUpdated::class => [
            ArticleLogsListener::class,
        ],
        ArticleEvents\ArticleWasRead::class => [
            ArticleLogsListener::class,
        ],
    ];

    /**
     * 註冊事件監聽器.
     */
    protected $subscribe = [

    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
