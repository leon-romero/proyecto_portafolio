<?php

namespace App\Http\Middleware;

use Closure;

class AccesoEmpleado
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
        if (auth('empleado')->check()){
            return $next($request);   
        }
        return redirect('/'); 
    }
}
