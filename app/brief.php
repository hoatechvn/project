<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class brief extends Model {

	//
	protected $table="brief";
	public $timestamps = false;

	public function detailbrief()
	{
		return $this->hasMany('App\detailbrief','id_brief','id');
	}

}
