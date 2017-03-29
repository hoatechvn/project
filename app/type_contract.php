<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class type_contract extends Model {

	//
	public $timestamps = false;
	protected $table="type_contract";

	public function design()
 	{
 		return $this->hasMany('App\design','id_typecontract','id');
 	}
 	public function workday()
 	{
 		return $this->hasMany('App\workday','id_typecontract','id');
 	}

}
