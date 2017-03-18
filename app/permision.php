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

}
