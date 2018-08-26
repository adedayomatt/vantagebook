<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
class VendorSiteDashboardController extends Controller
{
    public function __construct(){
		$this->middleware('auth:vendor');
	}
	public function showDashboard(){
		return view('site.dashboard')->with('site',Auth::guard('vendor')->user()->site);
	}}
