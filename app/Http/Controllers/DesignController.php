<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\design;

class DesignController extends Controller {

	public function getList(){
		
		$design=design::all(); //type_contract cua model, khong phai table
		return view('design.list',['design'=>$design]); 
									//key: type_contract   value:$type_contract (value được truyền sang cho view o ham foreach)
	}

	public function getAdd(){
		return view('design.add');
	}

	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'typecontract' => 'required|min:3|max:100' //// typecontract lấy request từ name của input bên view (ví dụ: name="typecontract" placeholder="Nhập tên quyền truy cập")
			],
			[
				'typecontract.required' => 'Bạn chưa nhập loại hợp đồng',
				'typecontract.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'typecontract.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'idtypecontract.required' => 'Bạn chưa nhập mã loại hợp đồng',
			]);

		$design = new design();  // tạo type_contract model mới
		$design->type = $request->typecontract;  // typecontract lấy request từ name của input bên view (ví dụ: name="typecontract" placeholder="Nhập tên quyền truy cập")
		$design->description = $request->description; // tương tự như trên
		$design->idtype = $request->idtypecontract;
		$design->save();

		return redirect('design/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$design = design::find($id);
		return view('design.update',['design' => $design]);
	}
	public function postUpdate(Request $request, $id){
		$design = design::find($id);
		$this->validate($request, 
			[
				'typecontract' => 'required|min:3|max:100'
			],
			[
				'typecontract.required' => 'Bạn chưa nhập loại hợp đồng',
				'typecontract.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'typecontract.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'idtypecontract.required' => 'Bạn chưa nhập mã loại hợp đồng',
			]);

		$design->type = $request->typecontract;
		$design->description = $request->description;
		$design->idtype = $request->idtypecontract;
		$design->save();

		return redirect('design/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		$design = design::findOrFail($id);
		$design->delete();
		return redirect('design/list') ->with('thongbao', 'Xóa thành công');
	}

}
