<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteCategory extends Model
{
    protected $fillable = ['name'];
	
	public function sites(){
		return $this->hasMany('App\Site');
	}
}
