<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class sign extends Model {

	public $timestamps = false;
	protected $table = "sign";

	public function type_draw()
 	{
 		return $this->belongsTo('App\type_draw','id_typedraw','id');
 	}

 	public function account()
	{
		$this->belongsTo('App\account','id_account','id');
	}
	
	public function customer()
 	{
 		return $this->belongsTo('App\customer','id_customer','id');
 	}

}
