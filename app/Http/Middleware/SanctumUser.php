<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class SanctumUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $request->user = $request->user();
        return $next($request);
    }
}
