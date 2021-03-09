<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if(!Session()->has('LoggedUser')&&($request->path()!='authentication/login'&& $request->path()!='authentication/register'))
        {
            return redirect('authentication/login')->with('fail','You Must be login');
        }
        if(Session()->has('LoggedUser')&&($request->path()=='authentication/login'|| $request->path()=='authentication/register'))
        {
            return back();
        }
       

        return $next($request);
    }
}
