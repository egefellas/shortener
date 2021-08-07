<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class SetCookies
{
    const COOKIE_KEY = 'user.linKey';
    
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Cookie::get(self::COOKIE_KEY)) {
            Cookie::queue(self::COOKIE_KEY, uniqid('linKey'), 10080); // 1 week
        }

        return $next($request);

    }
}
