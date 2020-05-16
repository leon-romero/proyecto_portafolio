<?php

namespace App\Http\Middleware;

use Closure;

class AccesoProveedor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('proveedor')->check()){
            return $next($request);   
        }
        return redirect('/'); 
    }
}
