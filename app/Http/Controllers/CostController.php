<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\cost;
class CostController extends Controller {

	public function getList(){
		
		$cost=cost::all();
		return view('cost.list',['cost'=>$cost]);

	}

	public function getAdd(){
		return view('cost.add');
	}

	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id' => 'required',
				'name' =>'required|min:3|max:100',
				'cost' =>'required'
			],
			[
				'id.required' => 'Bạn chưa nhập tham số diện tích',
				'name.required' => 'Bạn chưa nhập tên tham số diện tích',
				'name.min' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'cost.required' => 'Bạn chưa nhập giá',
				
			]);

		$cost = new cost();
		$cost->id = $request->id;
		$cost->name = $request->name;
		$cost->cost = $request->cost;
		$cost->description = $request->description;
		$cost->save();

		return redirect('cost/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$cost = cost::find($id);
		return view('cost.update',['cost' => $cost]);
	}
	public function postUpdate(Request $request, $id){
		$cost= cost::find($id);
		$this->validate($request, 
			[
		
				'name' =>'required|min:3|max:100',
				'cost' =>'required'
			],
			[
				
				'name.required' => 'Bạn chưa nhập tên tham số diện tích',
				'name.min' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên tham số diện tích phải có độ dài từ 3 đến 100 ký tự',
				'cost.required' => 'Bạn chưa nhập giá',
				
			]);

		$cost->name = $request->name;
		$cost->cost = $request->cost;
		$cost->description = $request->description;
		$cost->save();
		return redirect('cost/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		try{
			$cost = cost::find($id);
			$cost->delete();
			return redirect('cost/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa giá diện tích này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}
