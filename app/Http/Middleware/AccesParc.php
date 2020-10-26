<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccesParc
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

        //Pour l'instant, pas utilisé
        if(auth()->user()->Acces[7] != 1)
        {
            return redirect('/interventions');
        }
        return $next($request);
    }
}
