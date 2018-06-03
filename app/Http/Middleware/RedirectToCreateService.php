<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class RedirectToCreateService
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
        if (!Auth::guard('user')->check()) {
            Session::put('redirect_to_create_service', URL::full());
            flash('Please login first')->error();
            return redirect(route('user.login.register'));
        }

        return $next($request);
    }
}
