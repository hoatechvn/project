<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model {

	//
	public $timestamps = false;
	protected $table="design";

	public function type_contract()
	{
		return $this->belongsTo('App\type_contract','id_typecontruct','id');
	}
}
