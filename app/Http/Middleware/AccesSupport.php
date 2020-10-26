<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccesSupport
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //user connecté mais pas admin
        if(auth()->user()->Acces[3] != 1)
        {
            return redirect('/interventions');
        }

        return $next($request);
    }
}
