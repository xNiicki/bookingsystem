<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $type)
    {
        if (!Auth::check()) {
            return $type === 'admin'
                ? redirect()->route('admin.login')
                : redirect()->route('login');
        }

        if (Auth::user()->type == $type) {
            return $next($request);
        }

        return $type === 'admin'
            ? redirect()->route('admin.login')
            : redirect()->route('login');
    }
}
