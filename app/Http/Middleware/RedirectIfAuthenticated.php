<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {                    
        if (Auth::guard($guard)->check()) {
            //return redirect('/home');  
            $user_role = currentUser()->role; 
            
            if ($user_role == 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user_role == 'investigator') {                
                return redirect()->route('inv-dashboard');
            } else {
                return redirect()->route('items');
            }
        }

        return $next($request);        
    }
}
