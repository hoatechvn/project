<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model {

	//
	protected $table="service";
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
		return $this->hasMany('App\bill', 'id_service', 'id');
	}

	public function detailbrief()
	{
		return $this->hasMany('App\detailbrief','id_service','id');
	}

	public function design()
	{
		return $this->hasMany('App\service', 'id_service', 'id');
	}


}
