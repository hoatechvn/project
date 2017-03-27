<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\bill;
use App\design;

class FilterController extends Controller {

	// Xem chi tiêu theo hợp đồng
	function postIdcontruct(Request $request)
	{	
		$design=design::all();
		$idcontract = $request->search_idcontract;
 		if($idcontract =="") $idcontract="ID*****";
		$bill = bill::where('id_contract','like', "%$idcontract%")->paginate(DB::table('bill')->count());
		return view('filter.idcontract',['bill' => $bill, 'idcontract' =>$idcontract, 'design' =>$design]);
	}

	//Xem chi tiêu theo ngày
	function postDate(Request $request)
	{	
		$design=design::all();
		$issued_date = $request->search_date; 
		if($issued_date  =="") $issued_date ="dd/mm/yyyy";
		$bill = bill::where('issued_date','like', "%$issued_date%")->paginate(DB::table('bill')->count());
		return view('filter.date',['bill' => $bill, 'issued_date' =>$issued_date, 'design' =>$design]);
	}

	//Xem chi tiêu theo tháng
	function postMonth(Request $request)
	{	
		$design=design::all();
		$issued_month = $request->search_year."-".$request->search_month;
		$bill = bill::where('issued_date','like', "%$issued_month%")->paginate(DB::table('bill')->count());
		return view('filter.month',['bill' => $bill, 'issued_month' =>$issued_month, 'design' =>$design]);
	}

	//Xem chi tiêu theo năm
	function postYear(Request $request)
	{	
		$design=design::all();
		$issued_year = $request->search_year;
		$bill = bill::where('issued_date','like', "%$issued_year%")->paginate(DB::table('bill')->count());
		return view('filter.year',['bill' => $bill, 'issued_year' =>$issued_year, 'design' =>$design]);
	}
<<<<<<< HEAD

	function postAcc(Request $request)
 	{	
 		$account=account::all();
 		$design=design::all();
 		$issued_month = $request->search_year."-".$request->search_month;
 		$bill = bill::where('issued_date','like', "%$issued_month%")->paginate(DB::table('bill')->count());
 		return view('filter.month',['bill' => $bill, 'issued_month' =>$issued_month, 'design' =>$design]);
 	}
=======
	//Xem thống kê hoa hồng
	function postAcc(Request $request)
	{	
		$account=account::all();
		$design=design::all();
		$issued_month = $request->search_year."-".$request->search_month;
		$bill = bill::where('issued_date','like', "%$issued_month%")->paginate(DB::table('bill')->count());
		return view('filter.month',['bill' => $bill, 'issued_month' =>$issued_month, 'design' =>$design]);
	}
>>>>>>> origin/master
}
