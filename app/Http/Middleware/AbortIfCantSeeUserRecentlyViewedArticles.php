<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use Auth;
use App\User;

class AbortIfCantSeeUserRecentlyViewedArticles
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
        $user = User::find($request->route()->parameter('users'));

        if (!$user || !can_see_user_recently_viewed_articles($user)) {
            return redirect('/');
        }

        return $next($request);
    }
}

