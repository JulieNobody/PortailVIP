<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        //user pas connecté
       /* if(auth()->user() == null)
        {
            return redirect('/interventions');
        }*/

        //user connecté mais pas admin
        if(auth()->user()->Admin != 1)
        {
            return redirect('/interventions');
        }

        return $next($request);
    }
}
