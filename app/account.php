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

}
