<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\brief;
class BriefController extends Controller {

	public function getList(){
		
		$brief=brief::all();
		return view('brief.list',['brief'=>$brief]);

	}

	public function getAdd(){
		return view('brief.add');
	}

	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'name' =>'required|min:3|max:100',
			],
			[
				'name.required' => 'Bạn chưa nhập tên hồ sơ',
				'name.min' => 'Tên hồ sơ phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên hồ sơ phải có độ dài từ 3 đến 100 ký tự',
				
			]);

		$brief = new brief();
		$brief->name = $request->name;
		$brief->description = $request->description;
		$brief->save();

		return redirect('brief/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$brief = brief::find($id);
		return view('brief .update',['brief ' => $brief ]);
	}
	public function postUpdate(Request $request, $id){
		$brief = brief::find($id);
		$this->validate($request, 
			[
				'name' =>'required|min:3|max:100',
			],
			[
				'name.required' => 'Bạn chưa nhập tên hồ sơ',
				'name.min' => 'Tên hồ sơ phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên hồ sơ phải có độ dài từ 3 đến 100 ký tự',
			
				
			]);

		$brief ->name = $request->name;
		$brief ->description = $request->description;
		$brief ->save();
		return redirect('brief/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		try{
			$brief  = brief::find($id);
			$brief->delete();
			return redirect('brief/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa hồ sơ này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}
