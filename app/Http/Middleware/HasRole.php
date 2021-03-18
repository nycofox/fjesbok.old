<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (auth()->check() && auth()->user()->hasRole($role)) {
            return $next($request);
        }

        App::abort(404);
    }
}
