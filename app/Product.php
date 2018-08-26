<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['site_id','product_category_id','name','price','description'];
	
	public function site(){
		return $this->belongsTo('App\Site');
	}
	public function category(){
		return $this->belongsTo('App\ProductCategory');
	}
	public function gallery(){
		return $this->hasMany('App\ProductGallery');
	}
	public function tags(){
		return $this->belongsToMany('App\Tag');
	}
}
