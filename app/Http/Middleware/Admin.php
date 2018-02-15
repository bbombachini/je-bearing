<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
// // use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Auth;
// // use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;
use Auth;

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
  
      Log::info('checking if is admin');
        if ( Auth::check() && Auth::user()->isAdmin() )
      {
          Log::info('user is admin');
          return $next($request);
      }
      Log::info('user is NOT admin');
      return redirect('home');
    }
}
