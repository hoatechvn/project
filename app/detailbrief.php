<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class detailbrief extends Model {

	//
	protected $table="detailbrief";
	public $timestamps = false;

	public function brief()
	{
		return $this->belongsTo('App\brief','id_brief','id');
	}

	public function service()
	{
		return $this->belongsTo('App\service','id_service','id');
	}
}
