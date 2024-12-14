<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
{
     \Log::info('Roles allowed: ', $roles);
    \Log::info('User role: ', [Auth::user()->role]);
    if (!Auth::check() || !in_array(Auth::user()->role, $roles)) {
        return redirect()->route('/')->with('error', 'Access Denied!');
    }

    return $next($request);
}

}
