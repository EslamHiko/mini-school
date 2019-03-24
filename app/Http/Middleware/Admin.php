<?php

namespace MiniSchool\Http\Middleware;

use Closure;
use MiniSchool\User;
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

    public function handle($request, Closure $next, $guard = null)
    {
      try {
        if(Auth::user()->admin)
          return $next($request);
      } catch (Exception $e) {
        echo $e;
      }
        return redirect('/');
    }
}
