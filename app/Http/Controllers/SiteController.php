<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use App\Site;
class SiteController extends Controller
{
	
	public function __construct(){
		$this->middleware('auth:vendor')->except(['index','show']);
	}
	
	public function validationRules(){
		return [
			'business_name' => 'required',
			'address' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'alt_phone' => 'required|numeric',
			'slug' => 'required'
		];
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		if(Auth::guard('vendor')->user()->site){//If Already have a site
		$slug = Auth::guard('vendor')->user()->site->slug;
			return redirect()->route('vendor.site',['slug' => $slug]);
		}
        return view('site.siteCreationForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->validationRules);
		
		$site = Site::create([
					'vendor_id' => Auth::guard('vendor')->id(),
					'name' => $request->business_name,
					'address' => $request->address,
					'email' => $request->email,
					'phone1' => $request->phone,
					'phone2' => $request->alt_phone,
					'slug' => str_slug($request->slug)
		]);
		Session::flash('success','Your site has been created');
		
		return redirect()->route('vendor.site',['slug' => $site->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('site.show')->with('site', Site::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('site.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request,$this->validationRules);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
