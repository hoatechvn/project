<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model {

	//
	protected $table="account";
	public $timestamps = false;

	public function permision()
	{
		return $this->belongsTo('App\permision','id_permision','id');
	}

	public function design()
	{
		return $this->hasMany('App\design', 'id_account', 'id');
	}
	
	public function sign()
	{
		return $this->hasMany('App\sign', 'id_account', 'id');
	}

	public function service()
	{
		return $this->hasMany('App\service', 'id_account', 'id');
	}

}
