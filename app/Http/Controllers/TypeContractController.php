<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\type_contract;
class TypeContractController extends Controller {
	public function getList(){
		
		$type_contract=type_contract::all(); //type_contract cua model, khong phai table
		return view('typecontract.list',['type_contract'=>$type_contract]); 
									//key: type_contract   value:$type_contract (value được truyền sang cho view o ham foreach)
	}
	public function getAdd(){
		return view('typecontract.add');
	}
	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'typecontract' => 'required|min:3|max:100',
				'idtypecontract' => 'required' //// typecontract lấy request từ name của input bên view (ví dụ: name="typecontract" placeholder="Nhập tên quyền truy cập")
			],
			[
				'typecontract.required' => 'Bạn chưa nhập loại hợp đồng',
				'typecontract.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'typecontract.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'idtypecontract.required' => 'Bạn chưa nhập mã loại hợp đồng',
			]);
			$type_contract = new type_contract();  // tạo type_contract model mới
			$type_contract->type = $request->typecontract;  // typecontract lấy request từ name của input bên view (ví dụ: name="typecontract" placeholder="Nhập tên quyền truy cập")
			$type_contract->description = $request->description; // tương tự như trên
			$type_contract->idtype = $request->idtypecontract;
			$type_contract->save();
			return redirect('contract/list') ->with('thongbao', 'Thêm thành công');
		}
	
	public function getUpdate($id){
		$type_contract = type_contract::find($id);
		return view('typecontract.update',['type_contract' => $type_contract]);
	}
	public function postUpdate(Request $request, $id){
		$type_contract = type_contract::find($id);
		$this->validate($request, 
			[
				'typecontract' => 'required|min:3|max:100',
				'idtypecontract' => 'required' 
			],
			[
				'typecontract.required' => 'Bạn chưa nhập loại hợp đồng',
				'typecontract.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'typecontract.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
				'idtypecontract.required' => 'Bạn chưa nhập mã loại hợp đồng',
			]);
		$type_contract->type = $request->typecontract;
		$type_contract->description = $request->description;
		$type_contract->idtype = $request->idtypecontract;
		$type_contract->save();
		return redirect('contract/list') ->with('thongbao', 'Cập nhật thành công');
		
	}
	public function getDelete($id){
		$type_contract = type_contract::findOrFail($id);
		$type_contract->delete();
		return redirect('contract/list') ->with('thongbao', 'Xóa thành công');
	}
}