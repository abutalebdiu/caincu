<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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

        $user = Auth::user();

        if($user->role_id == 1 || $user->role_id == 2 || $user->role_id == 3){
            return "/home";
        }else if($user->role_id == 4){
            return "/doctor-dashboard";
        }
        else if($user->role_id == 5){
            return "/medicalcenter-dashboard";
        }
        else if($user->role_id == 6){
            return "/hospital-dashboard";
        }
        else if($user->role_id == 7){
            return "/pharmacy-dashboard";
        }
        else if($user->role_id == 8){
            return "/gym-dashboard";
        }
        else if($user->role_id == 9){
            return "/beautycare-dashboard";
        }
        
        else{
            return "/error";
        }

    }


}
