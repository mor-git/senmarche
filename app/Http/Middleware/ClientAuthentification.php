<?php

namespace App\Http\Middleware;

use Closure;

class ClientAuthentification
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
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( Auth::user()->isAdmin() ) {
                 return redirect(route('admin_dashboard'));
            }
            // allow user to proceed with request
            else if ( Auth::user()->isUser() ) {
                 return $next($request);
            }
        }
        abort(404);  // for other user throw 404 error
        // return $next($request);
    }
}
