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
        $article = Article::find($request->route()->parameter('articles'));

        if (!$article || !can_manage_article($article)) {
            return redirect('/');
        }

        return $next($request);
    }
}
