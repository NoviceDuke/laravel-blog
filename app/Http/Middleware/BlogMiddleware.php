<?php

namespace App\Http\Middleware;

use Closure;
use App\Articles\Tag;
use App\Articles\Category;

class BlogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $categories = Category::all();
        $tags = Tag::all();
        view()->share(compact('categories','tags'));
        return $next($request);
    }
}
