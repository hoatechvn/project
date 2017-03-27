<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\bill;
use App\design;
use App\account;
class StatisticController extends Controller {
	
	public function getList()
	{
		//$bill=bill::all();
		$design=design::all();
		$account=account::all();
		return view('statistic.list', ['design' => $design,'account' => $account]);
	}
	
}
