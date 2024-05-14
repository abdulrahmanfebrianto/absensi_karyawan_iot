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
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $userRole = Auth::user()->role;
                switch ($userRole) {
                    case 'admin':
                        return redirect()->intended('/dashboard');
                        break;
                    case 'karyawan':
                        return redirect()->intended('/employee/profile/show');
                        break;
                    default:
                        return redirect()->intended('/');
                        break;
                }
            }
        }

        return $next($request);
    }
}
