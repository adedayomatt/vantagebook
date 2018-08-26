<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
	protected $fillable = ['vendor_id','site_category_id','name','address','email','phone1','phone2','slug','coverphoto','profilephoto'];

	public function vendor(){
		return $this->belongsTo('App\Vendor');
	}
	public function products(){
		return $this->hasMany('App\Product');
	}
	public function category(){
		return $this->belongsTo('App\SiteCategory');
	}
	public function setting(){
		return $this->hasOne('App\SiteSetting');
	}
}
