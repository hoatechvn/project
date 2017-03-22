<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model {

	//
	protected $table="bill";
	public $timestamps = false;
	public function design()
 	{
 		return $this->belongsTo('App\design','id_design','id');
 	}

}
