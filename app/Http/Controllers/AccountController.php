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
				'password'=>'required|min:8|max:32',
				'confirm_password'=>'required|same:password'

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
				'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
				'password.max' => 'Mật khẩu có nhiều nhất 32 ký tự',
				'confirm_password.required' => 'Bạn chưa nhập lại mật khẩu',
				'confirm_password.same' => 'Mật khẩu nhập lại chưa khớp'
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
				
			]);
			$account->username=$request->username;
			if($request->changepass == "on")
			{


				$this->validate($request, 
			[
				
				'password'=>'required|min:8|max:32',
				'confirm_password'=>'required|same:password'

			], 
			[
				
				'password.required' => 'Bạn chưa nhập mật khẩu',
				'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
				'password.max' => 'Mật khẩu có nhiều nhất 32 ký tự',
				'confirm_password.required' => 'Bạn chưa nhập lại mật khẩu',
				'confirm_password.same' => 'Mật khẩu nhập lại chưa khớp'
			]);
				$account->password=md5($request->password);
			}
			
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
			return '<script type="text/javascript">alert("Không thể xóa tài khoản này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}
