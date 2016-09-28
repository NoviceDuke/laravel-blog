<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Helpers\Alertable;
use Auth;
class BackendMiddleware
{
    use Alertable;

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->hasPermission('BrowseBackend') || Auth::user()->isSuperRoot()) {
            return $next($request);
        } else {
            $this->alert('Warning', '你沒有權限登入後台')->warning()->flashIt();
            return redirect()->route('blog.index');
        }
    }
}
