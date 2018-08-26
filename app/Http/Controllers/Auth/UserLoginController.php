<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

//Added....
use Session;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth\Request as Request;
 

class UserLoginController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	 /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */

	public function showLoginForm(){
        return view('auth.user.login');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
	protected function guard(){
		return Auth::guard();
	}
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
	protected function username(){
		return 'email';
	}
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed*/
     
    protected function authenticated($request, $user){
		//dd($user);
        Session::flash('success','Logged in as a regular user!');
    }
}
