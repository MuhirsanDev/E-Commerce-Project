<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Pengondisian jika user tidak bertype 'admin' maka akan diredirect ke route ('/')
        if(Auth::user()->usertype != 'admin'){
            return redirect('/');
        }
        // Tapi jika user bertype 'admin' maka akan diredirect ke route 'admin/dashboard'
        return $next($request);
    }
}
