<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->type !=='admin')
        {
            abort(403,'شما دست رسی به این قسمت ندارین');
        }

        return $next($request);
    }
}
