<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\design;
use App\account;
use App\type_contract;
class DesignController extends Controller {
	
	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}

	public function getList(){
		
		$design=design::all(); 
		return view('design.list',['design'=>$design]); 
									
	}
	public function getAdd(){
		$account=account::all();
		$typecontract=type_contract::all();
		return view('design.add',['account'=>$account, 'typecontract'=>$typecontract]);
	}
	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'register_date' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'home_add' =>'required',
				'street' =>'required',
				'ward' =>'required',
				'district' =>'required',
				'area_s' =>'required',
				'area_sth' =>'required',
				'area_stsd' =>'required',
				'min_cost' =>'required',
				'received_cost' =>'required',
				'time' =>'required',
			],
			[
				'id_account.required' => 'Bạn chưa chọn nhân viên thụ hưởng',
				'id_typecontract.required' => 'Bạn chưa chọn loại hợp đồng',
				'register_date.required' => 'Bạn chưa chọn ngày đăng ký',
				'customer.required' => 'Bạn chưa nhập tên khách hàng',
				'customer.min' => 'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Tên khách hàng phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ khách hàng',
				'cus_phone.required' => 'Bạn chưa nhập số điện thoại',
				'cus_phone.min' => 'Số điện thoại phải có độ dài 10 hoặc 11 số',
				'cus_phone.max' =>'Số điện thoại phải có độ dài 10 hoặc 11 số',
				'home_add.required' => 'Bạn chưa nhập địa chỉ nhà',
				'street.required' => 'Bạn chưa nhập số đường',
				'ward.required' => 'Bạn chưa nhập phường',
				'district.required' => 'Bạn chưa quận',
				'area_s.required' => 'Bạn chưa nhập diện tích sàn sử dụng, ban công',
				'area_sth.required' => 'Bạn chưa nhập diện tích sân thượng, hiên',
				'area_stsd.required' => 'Bạn chưa nhập diện tích sân trống, đất trống',
				'min_cost.required' => 'Bạn chưa nhập giá trị tối thiểu của một bản vẽ',
				'received_cost.required' => 'Bạn chưa nhập giá trị tạm ứng hợp đồng',
				'time.required' => 'Bạn chưa nhập thời gian khảo sát nhà',
			]);

			$design= new design();

			$stt = DB::table('design')->count();
			$stt++;
			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
			$design->home_add = $request->home_add;
			$design->street = $request->street;
			$design->ward = $request->ward;
			$design->district = $request->district;
			$design->area_s = $request->area_s;
			$design->area_stsd = $request->area_stsd;
			$design->area_sth = $request->area_sth;
			$design->min_cost = $request->min_cost;
			$design->received_cost = $request->received_cost;
			$design->time = $request->time;
			$design->id_typecontract = $request->id_typecontract;
			$design->id_account = $request->id_account;

			foreach ($typecontract as $con) {
				if($design->id_typecontract == $con->id)
				{
					$design->id = $con->idtype."".$this->add_nol($stt,5);
					$design->name=$con->type;
				}
			}

			$design->save();
		
		return redirect('design/list') ->with('thongbao', 'Thêm thành công');
	}
	
	public function getUpdate($id){
		$design = design::find($id);
		return view('design.update',['design' => $design]);
	}
	public function postUpdate(Request $request, $id){
		
		
	}
	public function getDelete($id){
		
		return redirect('design/list') ->with('thongbao', 'Xóa thành công');
	}
}