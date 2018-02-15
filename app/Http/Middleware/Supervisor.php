<?php

namespace App\Http\Middleware;

use Closure;

class Supervisor
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
      if ( Auth::check() && Auth::user()->isSuper() )
        {
          Log::info('user is supervisor');
          return $next($request);
        }
          Log::info('user is NOT supervisor');
          return redirect('home');
    }
}
