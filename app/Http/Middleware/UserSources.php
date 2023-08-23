<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UserSources
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $VALID_COOKIE = ['online','expo'];
    public function handle(Request $request, Closure $next)
    {
        $param_key = 'from';
        $cookie_key = 'source';
        if($request->has($param_key) && in_array($request->input($param_key), $this->VALID_COOKIE) && !$request->cookie($cookie_key)) {
            $cookie = $request->input($param_key);
            $oneYear = 525960; // 1 Year in Minutes
            $cookie_instance = cookie($cookie_key, $cookie, $oneYear);
            return $next($request)->withCookie($cookie_instance);
        }
        return $next($request);
    }
}
