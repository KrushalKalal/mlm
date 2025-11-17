<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
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
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            //  dd($user);
            if ($user->role == 'admin') {
                //  dd("hear");
                return $next($request); // User is admin, allow the request
            }
            if ($user->role == 'user') {
                // dd("hear");
                return $next($request); // User is admin, allow the request
            }
           
        }else{
            return redirect()->route('admin.login'); 

        }

        // If user is not authenticated or does not have the 'admin' role, redirect or handle accordingly
    }
}
