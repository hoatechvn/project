<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\account;
use App\permision;
class AccountController extends Controller {

	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}

	public function getList(){
		
		$account=account::all();
		return view('account.list',['account'=>$account]);

	}
	public function getAdd(){
		$permision=permision::all();
		return view('account.add',['permision'=>$permision]);
	}

	public function postAdd(Request $request){
		
		$this->validate($request, 
			[
				'permision' =>'required',
				'username' =>'required|unique:account,username|min:3|max:100',
				'name' =>'required|min:3|max:100',
				'position' =>'required|min:3|max:100',
				'password'=>'required',
				'confirm_password'=>'required'

			], 
			[
				'permision.required' => 'Bạn chưa chọn loại phân quyền',
				'username.required' => 'Bạn chưa nhập tên tài khoản',
				'username.unique' => 'Tên tài khoản đã tồn tại',
				'username.min' => 'Tên tài khoản phải có độ dài từ 3 đến 100 ký tự',
				'username.max' =>'Tên tài khoản phải có độ dài từ 3 đến 100 ký tự',
				'name.required' => 'Bạn chưa nhập tên nhân viên',
				'name.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'name.max' =>'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'position.required' => 'Bạn chưa nhập tên nhân viên',
				'position.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'position.max' =>'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'confirm_password.required' => 'Xác nhận mật khẩu'
			]);
			$stt = DB::table('account')->count();
			$stt++;
			$account = new account();	
			$permision = permision::all();
			$account->username=$request->username;
			$account->password=md5($request->password);
			$account->name=$request->name;
			$account->position=$request->position;
			$account->email=$request->email;
			$account->id_permision=$request->permision;
			foreach ($permision as $per) {
				if($account->id_permision == $per->id)
					$account->id = $per->type."".$this->add_nol($stt,5);
			}
			
			$account->save();
			
		return redirect('account/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$permision=permision::all();
		$account = account::find($id);
		return view('account.update',['account' => $account, 'permision'=>$permision]);
	}
	public function postUpdate(Request $request, $id){
		$account = account::find($id);
		$this->validate($request, 
			[
				'permision' =>'required',
				'username' =>'required|min:3|max:100',
				'name' =>'required|min:3|max:100',
				'position' =>'required|min:3|max:100',
				'password'=>'required',
				'confirm_password'=>'required'

			], 
			[
				'permision.required' => 'Bạn chưa chọn loại phân quyền',
				'username.required' => 'Bạn chưa nhập tên tài khoản',
				'username.min' => 'Tên tài khoản phải có độ dài từ 3 đến 100 ký tự',
				'username.max' =>'Tên tài khoản phải có độ dài từ 3 đến 100 ký tự',
				'name.required' => 'Bạn chưa nhập tên nhân viên',
				'name.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'name.max' =>'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'position.required' => 'Bạn chưa nhập tên nhân viên',
				'position.min' => 'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'position.max' =>'Tên nhân viên phải có độ dài từ 3 đến 100 ký tự',
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'confirm_password.required' => 'Xác nhận mật khẩu'
			]);
			$account->username=$request->username;
			$account->password=md5($request->password);
			$account->name=$request->name;
			$account->position=$request->position;
			$account->email=$request->email;
			$account->id_permision=$request->permision;
			$account->save();
			
		return redirect('account/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		try{
			$account = account::findOrFail($id);
			$account->delete();
			return redirect('account/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			
		}
	}
}
