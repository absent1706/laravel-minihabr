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
        $user = User::find($request->route()->parameter('users'));

        if (!$user || !can_manage_user($user)) {
            return redirect('/');
        }

        return $next($request);
    }
}
