<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class frontLogin
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
        if(empty(Session::get('frontSession'))){
            return redirect('/auth');
        }
        return $next($request);
    }
}
