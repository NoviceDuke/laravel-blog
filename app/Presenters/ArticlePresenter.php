<?php

namespace App\Presenters;

use App\Articles\Article;
use Carbon\Carbon;

class ArticlePresenter
{
    /**
     * 輔助View的邏輯處理.
     */
    public function getCreatedAt(Article $article)
    {

        return $article->created_at->format('l jS \\of F Y h:i:s A');
    }
}
