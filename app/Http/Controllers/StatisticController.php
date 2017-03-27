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
		$design=design::all();
		$account=account::all();
		return view('statistic.list', ['design' => $design,'account' => $account]);
	}
	function postFilter(Request $request)
	{	
		$account=account::all();
		$idaccount = $request->id_account;
		$issued_month = $request->search_year."-".$request->search_month;
		$design = design::where('id_account','like', "%$idaccount%")->where('complete_date','like', "%$issued_month%")->paginate(DB::table('design')->count());
		return view('statistic.filter',['design' => $design, 'idaccount' =>$idaccount, 'issued_month' =>$issued_month,'account' =>$account]);	
	}
}