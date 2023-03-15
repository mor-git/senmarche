<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers; 

    /**
     * Where to redirect users after login. 
     *
     * @var string
     */
    // protected $redirectTo;
    protected $redirectTo = '/';
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); 
    }

    public function redirectTo(){ 

        if( Auth::user()->profil_id == 1 ) {        
            return '/showProduitCategorie';
        }elseif(Auth::user()->profil_id == 2) {
            return '/showProduitCategorie';
        }elseif(Auth::user()->profil_id == 3) {
            return '/showProduitCategorie';
        }else {
            return redirect('/');
        }

        abort(404);  // for other user throw 404 error
       // return $next($request);       
    }
}
