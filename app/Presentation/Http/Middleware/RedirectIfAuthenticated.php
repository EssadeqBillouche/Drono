<?php

namespace App\Presentation\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Redirect based on user role
            $role = Auth::user()->role;

            if ($role === 'seller') {
                return redirect()->route('seller.dashboard');
            } elseif ($role === 'client') {
                return redirect()->route('profile');
            }

            // Default redirect if role doesn't match specific cases
            return redirect()->route('index');
        }

        return $next($request);
    }
}
