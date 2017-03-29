<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class design extends Model {

	//
	protected $table="design";
	public $timestamps = false;

	public function account()
	{
		$this->belongsTo('App\account','id_account','id');
	}

	public function type_contract()
 	{
 		return $this->belongsTo('App\type_contract','id_typecontract','id');
 	}

 	public function customer()
 	{
 		return $this->belongsTo('App\customer','id_customer','id');
 	}

 	public function bill()
	{
		return $this->hasMany('App\bill', 'id_design', 'id');
	}
}
