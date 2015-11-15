<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use App\Comment;

class AbortIfCantManageComment
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
        $comment = Comment::findOrFail($request->route()->parameter('comments'));

        if (!can_manage_comment($comment)) {
            return abort(403);
        }

        return $next($request);
    }
}
