<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	//dd(Auth::guest());
    return view('welcome');
});
/**
	User Authentication routes
**/
Route::group(['prefix' => 'user'],function(){
	Route::get('login','Auth\UserLoginController@showLoginForm')->name('user.login');
	Route::post('login','Auth\UserLoginController@login');
	Route::post('logout','Auth\UserLoginController@logout')->name('user.logout');
	Route::get('password/reset','Auth\UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
	Route::post('password/email','Auth\UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
	Route::post('password/reset','Auth\UserResetPasswordController@reset');
	Route::get('password/reset/{token}','Auth\UserResetPasswordController@showResetForm')->name('user.password.reset');
	Route::get('register','Auth\UserRegisterController@showRegistrationForm')->name('user.register');
	Route::post('register','Auth\UserRegisterController@register');
	}
);
/**
	Vendor Authentication routes
**/
Route::group(['prefix' => 'vendor'],function(){
	Route::get('login','Auth\VendorLoginController@showLoginForm')->name('vendor.login');
	Route::post('login','Auth\VendorLoginController@login');
	Route::post('logout','Auth\VendorLoginController@logout')->name('vendor.logout');
	Route::get('password/reset','Auth\VendorForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
	Route::post('password/email','Auth\VendorForgotPasswordController@sendResetLinkEmail')->name('vendor.password.email');
	Route::post('password/reset','Auth\VendorResetPasswordController@reset');
	Route::get('password/reset/{token}','Auth\VendorResetPasswordController@showResetForm')->name('vendor.password.reset');
	Route::get('register','Auth\VendorRegisterController@showRegistrationForm')->name('vendor.register');
	Route::post('register','Auth\VendorRegisterController@register');
	}
);

Route::group([],function(){
	Route::resource('site','siteController');
	//Modifying some of the routes registered by the resources
	Route::get('@{site}','SiteController@show')->name('vendor.site');
	Route::get('@{site}/edit','SiteController@edit')->name('vendor.site.edit');
	Route::put('@{site}/edit','SiteController@update')->name('vendor.site.update');
	Route::delete('@{site}/delete','SiteController@destroy')->name('vendor.site.delete');
	
	Route::get('@{site}/dashboard','VendorSiteDashboardController@showDashboard')->name('vendor.site.dashboard');
	});
	
Route::get('/home', 'HomeController@index')->name('home');

