<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class ClearanceMiddleware
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

        if(Auth::user()->hasPermissionTo('Adminster role & Permissions')){
            return $next($request);   
        }
        if($request->is('products/create')){
            if(!Auth::user()->hasPermissionTo('Create Product')){
                about('401');
            }else{
                return $next($request);
            }
        }
        if($request->is('products/*/edit')){
            if(!Auth::user()->hasPermissionTo('Edit Product')){
                about('401');
            }else{
                return $next($request);
            }
        }
        if($request->isMethod('Delete')){
            if(!Auth::user()->hasPermissionTo('Delete Product')){
                abort('401');
            }else{
                return $next($request); 
            }
        }
        return $next($request);
    }
}
