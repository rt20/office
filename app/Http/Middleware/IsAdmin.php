<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        //jika user login & user adalah ADMIN maka akan diteruskan, jika tidak maka akan balik ke halaman /
        // if(Auth::user() && Auth::user()->roles == 'ADMIN')
        // {
        //     return $next($request);
        // }
        // return redirect('/');
        
    }
}
