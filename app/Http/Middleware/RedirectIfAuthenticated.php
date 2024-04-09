<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next )
    {
         if(auth('web')->check()){

            return redirect(RouteServiceProvider::HOME);
         }
         if(auth('is_BusinessUser')->check()){
            // \Log::info("Redirecting to: " . RouteServiceProvider::ADMIN);

            return redirect(RouteServiceProvider::ADMIN);
         }
         return $next($request);
    }
}
