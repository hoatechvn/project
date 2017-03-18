<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\customer;
class CustomerController extends Controller {

	public function getList(){
		
		$customer=customer::all();
		return view('customer.list',['customer'=>$customer]);

	}

	public function getUpdate($id){
		$customer = customer::find($id);
		return view('customer.update',['customer' => $customer]);
	}
	public function postUpdate(Request $request, $id){
		$customer = customer::find($id);
		$this->validate($request, 
			[
				'name' => 'required|min:3|max:100',
				'address' => 'required',
				'phone' => 'required|min:10|max:11'
			
			],
			[
				'address.required' => 'Bạn chưa nhập địa chỉ khách hàng',
				'name.required' => 'Bạn chưa nhập tên Khách hàng',
				'name.min' => 'Tên Khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên Khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'phone.required' => 'Bạn chưa nhập số điện thoại khách hàng',
				'phone.min' =>'Số điện thoại phải là 10 hoặc 11 chữ số',
				'phone.max' => 'Số điện thoại phải là 10 hoặc 11 chữ số'
			]);

		$customer->name = $request->name;
		$customer->address = $request->address;
		$customer->phone = $request->phone;

		$customer->save();

		return redirect('customer/list') ->with('thongbao', 'Cập nhật thành công');
		

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
