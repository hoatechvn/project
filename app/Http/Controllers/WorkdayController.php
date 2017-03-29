<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\workday;
use App\type_contract;
class WorkdayController extends Controller {


	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}
	public function getList(){
		$typecontract = type_contract::all();
		$workday=workday::all();
		return view('workday.list',['workday'=>$workday, 'typecontract' => $typecontract]);

	}

	public function getAdd(){
		$typecontract = type_contract::all();
		return view('workday.add',['typecontract' => $typecontract]);
	}

	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id_typecontract' =>'required',
				'type' => 'required',
				'name' =>'required|min:3|max:100',
				'time' =>'required|integer'
			],
			[
				'type.required' => 'Bạn chưa nhập mã loại công việc',
				'name.required' => 'Bạn chưa nhập tên tham số diện tích',
				'name.min' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'time.required' => 'Bạn chưa nhập giá',
				'time.integer' =>'Thời gian phải là số nguyên',
				'id_typecontract.required' => 'Bạn chưa chọn loại hợp đồng',
			]);

		$array = array();
		$variable = workday::all();
		$workday = new workday();
		$workday->type = $request->type;
		$workday->name = $request->name;
		$workday->time = $request->time;
		$workday->description = $request->description;
		$workday->id_typecontract = $request->id_typecontract;
		foreach ($variable as $key) 
		{
			if($request->type == preg_replace('/[^a-z]+/i',"",$key->id))
			{
				array_push($array, (int)preg_replace('/[^0-9]+/i',"",$key->id));
			}
		}
		if(count($array) == 0)
		{
			$stt=0;
		}
		else
			$stt=max($array);
		$stt++;
		$workday->id = $request->type."".$this->add_nol($stt,5);
		$workday->save();

		return redirect('workday/list') ->with('thongbao', 'Thêm thành công');
	}
	public function getUpdate($id){
		$workday = workday::find($id);
		$typecontract = type_contract::all();
		return view('workday.update',['workday' => $workday,'typecontract' =>$typecontract]);
	}
	public function postUpdate(Request $request, $id){
		$workday= workday::find($id);
		$this->validate($request, 
			[
				'id_typecontract' =>'required',
				'type' => 'required',
				'name' =>'required|min:3|max:100',
				'time' =>'required|integer'
			],
			[
				'type.required' => 'Bạn chưa nhập mã loại công việc',
				'name.required' => 'Bạn chưa nhập tên tham số diện tích',
				'name.min' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'time.required' => 'Bạn chưa nhập giá',
				'time.integer' =>'Thời gian phải là số nguyên',
				'id_typecontract.required' => 'Bạn chưa chọn loại hợp đồng',
			]);

		$array = array();
		$variable = workday::all();
		$workday->type = $request->type;
		$workday->name = $request->name;
		$workday->time = $request->time;
		$workday->description = $request->description;
		$workday->id_typecontract = $request->id_typecontract;
	
		$workday->save();

		return redirect('workday/list') ->with('thongbao', 'Thêm thành công');

	}

	public function getDelete($id){
		try{
			$workday = workday::find($id);
			$workday->delete();
			return redirect('workday/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa công việc này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}

}
