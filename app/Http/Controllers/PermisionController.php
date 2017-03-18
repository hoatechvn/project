<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\permision;
class PermisionController extends Controller {

	public function getList(){
		
		$permision=permision::all();
		return view('permision.list',['permision'=>$permision]);

	}

	public function getAdd(){
		return view('permision.add');
	}

	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'typePermision' => 'required',
				'namePermision' =>'required|unique:permision,namePermision|min:3|max:100',
			],
			[
				'typePermision.required' => 'Bạn chưa chọn mã phân quyền',
				'namePermision.required' => 'Bạn chưa nhập loại phân quyền',
				'namePermision.min' => 'Loại phân quyền phải có độ dài từ 3 đến 100 ký tự',
				'namePermision.max' => 'Loại phân quyền phải có độ dài từ 3 đến 100 ký tự',
				'namePermision.unique' => 'Tên phân quyền đã tồn tại',
				
			]);

		$permision = new permision();
		$permision->name = $request->namePermision;
		$permision->type = $request->typePermision;
		$permision->description = $request->description;
		$permision->save();

		return redirect('permision/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$permision = permision::find($id);
		return view('permision.update',['permision' => $permision]);
	}
	public function postUpdate(Request $request, $id){
		$permision = permision::find($id);
		$this->validate($request, 
			[
				'namePermision' => 'required|min:3|max:100',
				'typePermision' => 'required'
			
			],
			[
				'typePermision.required' => 'Bạn chưa chọn mã phân quyền',
				'namePermision.required' => 'Bạn chưa nhập tên phân quyền',
				'namePermision.min' => 'Loại phân quyền phải có độ dài từ 3 đến 100 ký tự',
				'namePermision.max' => 'Loại phân quyền phải có độ dài từ 3 đến 100 ký tự',
				
			]);

		$permision->name = $request->namePermision;
		$permision->type = $request->typePermision;
		$permision->description = $request->description;

		$permision->save();

		return redirect('permision/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		try{
			$permision = permision::findOrFail($id);
			$permision->delete();
			return redirect('permision/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa loại phân quyền này do nó đã được tham chiếu"); window.location.href = "/Louis/public/permision/list";</script>';
		}
	}
}
