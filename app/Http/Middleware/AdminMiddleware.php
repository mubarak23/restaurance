<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
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
        $user = User::all()->count();
        if(!($user == 1)){
            if(!Auth::user()->hasPermissionTo('Administer roles & permissions')){
                about('401');
            }
        }
        return $next($request);
    }
}
