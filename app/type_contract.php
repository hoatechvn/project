<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class type_contract extends Model {

	//
	public $timestamps = false;
	protected $table="type_contract";

	public function design()
 	{
 		return $this->hasMany('App\design','id_typecontruct','id');
 	}

}
