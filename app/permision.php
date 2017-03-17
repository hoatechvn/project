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

}
