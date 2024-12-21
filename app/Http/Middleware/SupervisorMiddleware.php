<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SupervisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            Auth::guard('supervisor')->check() &&
            Auth::guard('supervisor')->user()->role == 'supervisor' &&
            Auth::guard('supervisor')->user()->status == 'active' &&
            Auth::guard('supervisor')->user()->deleted_at == null
        ) {
            return $next($request);
        }
        return redirect(route('supervisor.login'));
    }
}
