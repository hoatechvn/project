<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class workday extends Model {

	//
	protected $table="workday";
	public $timestamps = false;
	public function type_contract()
 	{
 		return $this->belongsTo('App\type_contract','id_typecontract','id');
 	}

}
