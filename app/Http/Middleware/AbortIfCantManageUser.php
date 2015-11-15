<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

use App\User;

class AbortIfCantManageUser
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
        $user = User::findOrFail($request->route()->parameter('users'));

        if (!can_manage_user($user)) {
            return abort(403);
        }

        return $next($request);
    }
}
