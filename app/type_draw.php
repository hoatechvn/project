<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class type_draw extends Model {

	//
	public $timestamps = false;
<<<<<<< HEAD
	protected $table = "type_draw";

	public function sign()
 	{
 		return $this->hasMany('App\draw','id_typedraw','id');
 	}
=======
	protected $table="type_draw";

	
>>>>>>> origin/master

}
