<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOrSeller
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        if ($role !== 'admin' && $role !== 'seller') {
            return redirect('/')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
