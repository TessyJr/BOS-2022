<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role == 1
        ||Auth::user()->role == 2
        ||Auth::user()->role == 3
        ||Auth::user()->role == 4
        ||Auth::user()->role == 5) {
            return $next($request);
        }

        return abort(404);
        //return back()->with('alert', 'You are not an admin!');
    }
}
