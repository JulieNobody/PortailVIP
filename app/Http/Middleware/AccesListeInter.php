<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccesListeInter
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

        if(auth()->user()->Acces[0] != 1)
        {
            return redirect('/interventions');
        }
        return $next($request);
    }
}
