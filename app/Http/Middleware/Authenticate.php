<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('user.login');
        }
    }

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $user = Auth::user();
        $route = $request->route()->getName();
        if ($route == 'checkcouponok') {
            return $next($request);
        }
        if ($user->can($route)) {
            return $next($request);
        } else {
            return redirect()->route('error'); // bao lỗi 
        }
    }
}
