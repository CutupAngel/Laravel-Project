<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnlyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // Admin is 1
    // Account is 2
    // Client is 3
    // User is 4


    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) 
        {
            return redirect('/');  
        }
        
        if (Auth::check())
        {
            $user = Auth::user();

            if ($user->role != 1)
            {
                return redirect('/');     
            }
        }
        return $next($request);
    }
}
