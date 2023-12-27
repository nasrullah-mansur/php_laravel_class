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

        if(Auth::user()->email === 'superadmin@email.com') {
            return $next($request);
        }

        // return $next($request);

        // return response()->redirectToRoute('dashboard');

        return abort(403, 'ei route paoya jasse na');
    }
}
