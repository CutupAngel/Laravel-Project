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
    //protected $redirectTo = RouteServiceProvider::HOME;

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
        $type = Auth::user()->role;

        // Check user role
        switch ($type) {
            case '1':
                return RouteServiceProvider::ADMIN;
                break;
            case '2':
                return RouteServiceProvider::ACCOUNT;
                break;
            case '3':
                return RouteServiceProvider::CLIENT;
                break;
            case '4':
                return  RouteServiceProvider::STAFF;
                break;
            case '5':
                return  RouteServiceProvider::DEPART;
                break;
        }
    }
}
