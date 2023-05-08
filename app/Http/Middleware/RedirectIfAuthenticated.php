<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if(Auth::guard('user')->check()){
            
            if (Auth::guard('user')->user()->role === 'admin') {
                // Pengguna memiliki peran admin
                return redirect()->route('dashboard.index');
            } elseif (Auth::guard('user')->user()->role === 'guest') {
                // Pengguna memiliki peran guest
                return redirect()->route('welcome.index');
            } else {
                // Pengguna memiliki peran lainnya
            }
        }

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
