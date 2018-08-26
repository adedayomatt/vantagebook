<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

//Added...
use Illuminate\Support\Facades\Password;

class VendorForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('nonvendor');
    }
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('auth.vendor.passwords.email');
    }
    /**
     * Get the broker to be used during password reset. This overrides the default password broker
	 * provided by the trait in illuminate/Foundation/Auth/SendPasswordResetEmail. So I'm using the password broker 'vendors' created in config/auth.php
	 * which uses the provider 'vendors' with Eloquent App\Vendor.
	 * please refer to https://laravel.com/docs/5.3/passwords/#password-customization for proper documentation
     *
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('vendors');
    }
}
