<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\type_draw;
use App\sign;
use App\customer;
use App\account;
class SignController extends Controller {
	
	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}

	public function getList(){
		$typedraw = type_draw::all();
		$sign=sign::all(); 
		return view('sign.list',['sign'=>$sign, 'typedraw' =>$typedraw]); 
									
	}
	public function getAdd(){
		$account = account::all();
		$typedraw = type_draw::all();
		return view('sign/add',['account' => $account, 'typedraw' =>$typedraw]);
	}
	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typedraw' =>'required',
				'created_date' =>'required',
				'owed_home' =>'required|min:3|max:100',
				'address' =>'required',
				'phone'=> 'min:10|max:11',
				'customer' =>'required|min:3|max:100',
			],
			[
				'id_account.required' => 'Bạn chưa chọn nhân viên thụ hưởng',
				'id_typedraw.required' => 'Bạn chưa chọn loại bản vẽ',
				'created_date.required' => 'Bạn chưa chọn ngày đăng ký',
				
			
				'customer.required' => 'Bạn chưa nhập tên khách hàng',
				'customer.min' => 'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'address.required' => 'Bạn chưa nhập địa chỉ chủ nhà',
				
				'phone.min' => 'Số điện thoại phải có độ dài 10 hoặc 11 số',
				'phone.max' =>'Số điện thoại phải có độ dài 10 hoặc 11 số',
				
				'owed_home.required' => 'Bạn chưa nhập tên chủ nhà',
				'owed_home.min' => 'Tên chủ nhà phải có độ dài từ 3 đến 100 ký tự',
				'owed_home.max' =>'Tên chủ nhà phải có độ dài từ 3 đến 100 ký tự',
			]);
			$array = array();
			$variable = sign::all();
			$sign= new sign();

			$typedraw = type_draw::all();

			$sign->id_typedraw = $request->id_typedraw;
			$sign->id_account = $request->id_account;
			$sign->owed_home = $request->owed_home;
			$sign->address = $request->address;
			$sign->customer = $request->customer;
			$sign->phone = $request->phone;
			$sign->created_date = $request->created_date;
			$sign->received_cost = $request->received_cost;
			$sign->note = $request->note;

			foreach ($typedraw as $draw) {
				if($sign->id_typedraw == $draw->id)
				{
					foreach ($variable as $key) 
					{
						if($draw->idtype == preg_replace('/[^a-z]+/i',"",$key->id))
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
					$sign->id = $draw->idtype."".$this->add_nol($stt,5);
				}
			}

			$sign->save();

			$getall=customer::all();
			$dem=0;
			foreach ($getall as $all) 
			{

				if($all->phone == $request->cus_phone)
					$dem++;
			}
				
			if($dem==0)
			{
				$customer= new customer();
				$customer->name=$request->customer;
				$customer->phone=$request->phone;
				$customer->save();	
			}		
		
		return redirect('sign/list') ->with('thongbao', 'Thêm thành công');
		
	}

	
	public function getUpdate($id){
		$sign = sign::find($id);
		$account = account::all();
		$typedraw = type_draw::all();
		return view('sign/update',['account' => $account, 'typedraw' =>$typedraw, 'sign' =>$sign]);
	}
	public function postUpdate(Request $request, $id){
		$sign = sign::find($id);
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typedraw' =>'required',
				'created_date' =>'required',
				'owed_home' =>'required|min:3|max:100',
				'address' =>'required',
				'phone'=> 'min:10|max:11',
				'customer' =>'required|min:3|max:100',
			],
			[
				'id_account.required' => 'Bạn chưa chọn nhân viên thụ hưởng',
				'id_typedraw.required' => 'Bạn chưa chọn loại bản vẽ',
				'created_date.required' => 'Bạn chưa chọn ngày đăng ký',
				'customer.required' => 'Bạn chưa nhập tên khách hàng',
				'customer.min' => 'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'address.required' => 'Bạn chưa nhập địa chỉ chủ nhà',
				
				'phone.min' => 'Số điện thoại phải có độ dài 10 hoặc 11 số',
				'phone.max' =>'Số điện thoại phải có độ dài 10 hoặc 11 số',
				
				'owed_home.required' => 'Bạn chưa nhập tên chủ nhà',
				'owed_home.min' => 'Tên chủ nhà phải có độ dài từ 3 đến 100 ký tự',
				'owed_home.max' =>'Tên chủ nhà phải có độ dài từ 3 đến 100 ký tự',
			]);
		
			$sign->id_typedraw = $request->id_typedraw;
			$sign->id_account = $request->id_account;
			$sign->owed_home = $request->owed_home;
			$sign->address = $request->address;
			$sign->customer = $request->customer;
			$sign->phone = $request->phone;
			$sign->created_date = $request->created_date;
			$sign->received_cost = $request->received_cost;
			$sign->note = $request->note;

			$sign->save();

			$getall=customer::all();
			$dem=0;
			foreach ($getall as $all) 
			{

				if($all->phone == $request->cus_phone)
					$dem++;
			}
				
			if($dem==0)
			{
				$customer= new customer();
				$customer->name=$request->customer;
				$customer->phone=$request->phone;
				$customer->save();	
			}		
		
		return redirect('sign/list') ->with('thongbao', 'Cập nhật thành công');
	}

	public function getAddoldcus($id){
		$customer = customer::find($id);
		$account=account::all();
		$typedraw=type_draw::all();
		return view('sign.addoldcus',['customer' => $customer, 'account' => $account, 'typedraw' => $typedraw]);
	}
	
	public function getDelete($id){
		try{
			$sign = sign::find($id);
			$sign->delete();
			return redirect('sign/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa hợp đồng lấy dấu này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}