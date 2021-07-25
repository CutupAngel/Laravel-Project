<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = auth()->user()->role;
                if($role == 1) {
                    return redirect(RouteServiceProvider::ADMIN);
                }else if($role == 2 ){
                    return redirect(RouteServiceProvider::ACCOUNT);
                }
                else if($role == 3 ){
                    return redirect(RouteServiceProvider::CLIENT);
                }else if($role == 4){
                    return redirect(RouteServiceProvider::STAFF);
                }else{
                    return redirect(RouteServiceProvider::DEPART);
                }
                
            }
        }

        return $next($request);
    }
}
