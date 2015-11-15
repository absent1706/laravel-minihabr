<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use App\Article;

class AbortIfCantManageArticle
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
        $article = Article::findOrFail($request->route()->parameter('articles'));

        if (!can_manage_article($article)) {
            return abort(403);
        }

        return $next($request);
    }
}
