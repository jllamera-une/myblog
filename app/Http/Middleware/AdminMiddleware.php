<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the authenticated user is an admin
            if (Auth::user()->role === 'admin') {
                return $next($request);
            } else {
                // If not an admin, redirect to home page or show unauthorized message
                return redirect('/')->with('error', 'Unauthorized access.');
            }
        }

        // If not authenticated, redirect to login
        return redirect('login');
    }
}
