<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class permision extends Model {

	//
	public $timestamps = false;
	protected $table="permision";

	public function account()
	{
		return $this->hasMany('App\account','id_permision','id');
	}

	public function design()
	{
		return $this->hasManyThrough('App\design', 'App\account','id_permision','id_account', 'id');	
	}

	public function sign()
	{
		return $this->hasManyThrough('App\sign', 'App\account','id_permision','id_account', 'id');	
	}

	public function service()
	{
		return $this->hasManyThrough('App\service', 'App\account','id_permision','id_account', 'id');	
	}
}
