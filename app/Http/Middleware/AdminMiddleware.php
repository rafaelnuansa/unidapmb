<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        // Redirect to a restricted page or show an error message.
        return redirect()->route('restricted')->with('error', 'Access denied. You are not an admin.');
    }
}
