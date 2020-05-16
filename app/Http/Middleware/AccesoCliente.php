<?php

namespace App\Http\Middleware;

use Closure;

class AccesoCliente
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
        if (auth('cliente')->check()){
            return $next($request);   
        }
        return redirect('/');
    }
}
