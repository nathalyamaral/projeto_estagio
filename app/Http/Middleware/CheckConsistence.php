<?php

namespace App\Http\Middleware;

use Closure;

class CheckConsistence
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
        if(isset($_COOKIE["PHPSESSID"]) or $_COOKIE['laravel_session']) {
            return $next($request);
        }

        return response('Not valid token provider.', 401);
    }
}
