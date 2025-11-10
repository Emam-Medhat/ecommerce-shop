<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isSeller
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role !== 'seller') {
            return redirect('/'); // Redirect non-admin users to home or another page
        }
        return $next($request);
    }
}
