<?php

namespace App\Http\Middleware;

use Closure;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if($request->user()->role === $role){
            return $next($request);
        }else{
            abort(403);
        }
        
    }
}
