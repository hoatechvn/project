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
			],
			[
				
				'name.required' => 'Bạn chưa nhập tên Khách hàng',
				'name.min' => 'Tên Khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'name.max' => 'Tên Khách hàng phải có độ dài từ 3 đến 100 ký tự',
				
			]);

		$customer->name = $request->name;
		$customer->address = $request->address;
		$customer->phone = $request->phone;
		$customer->email = $request->email;

		$customer->save();

		return redirect('customer/list') ->with('thongbao', 'Cập nhật thành công');
		

	}

	public function getDelete($id){
		
	}
}
