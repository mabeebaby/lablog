<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin {
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->isAdmin == 0){
            return redirect(route('account'));
        }

        return $next($request);
//        if(auth()->check() && auth()->user()->is_admin == 0){
//            return redirect(route('account'));
//        }
//
//        return $next($request);
    }
}
