<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBan
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
        if(auth()->user()->isBanned()) {
            return redirect()->route('account.banned');
        }
        return $next($request);
    }
}
