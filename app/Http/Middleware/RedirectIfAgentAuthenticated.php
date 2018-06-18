<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAgentAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'agent')
    {
        if (!Auth::guard($guard)->check()) {
            Session::put('oldUrl', $request->url());
            flash('You need to login first')->success();
            return redirect(route('user.login.register'));
        }
        return $next($request);
    }
}
