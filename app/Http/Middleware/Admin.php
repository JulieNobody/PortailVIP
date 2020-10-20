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

        //user connecté mais pas admin
        if(auth()->user()->Acces[8] != 1)
        {
            return redirect('/interventions');
        }

        return $next($request);
    }
}
