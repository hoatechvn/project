<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model {

	//
	public $timestamps = false;
	protected $table="customer";

	public function design()
	{
		return $this->hasMany('App\design','id_customer','id');
	}
	public function sign()
	{
		return $this->hasMany('App\sign','id_customer','id');
	}

	

}
