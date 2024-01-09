<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Auth;

class AdminProduksiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next): Response
    {
        if (Auth::check()) {
            if(Auth::user()->role_id == '3')
            {
                return $next($request);
            }
            else {
                abort(403);
            }
        }
        else {
            return redirect('login')->with('silahkan login');
        }
    }
}
