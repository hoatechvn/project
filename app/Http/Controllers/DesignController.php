<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\design;
use App\account;
use App\type_contract;
use App\customer;
use App\cost;
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
				
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				
				
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
				
				
			]);
			$array = array();
			$variable = design::all();
			$design= new design();

			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			if($request->changeadd == "on")
 			{

			$design->cus_address1 = $request->add1;

			}
			else
			{
			$design->cus_address1 = $request->cus_address;
			}
			$design->cus_phone = $request->cus_phone;
			$design->cus_email = $request->cus_mail;
		
			$design->id_typecontract = $request->id_typecontract;
			$design->id_account = $request->id_account;

			foreach ($typecontract as $con) {
				if($design->id_typecontract == $con->id)
				{
					$design->name=$con->type;
					foreach ($variable as $key) 
					{
						if($con->idtype == preg_replace('/[^a-z]+/i',"",$key->id))
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
					$design->id = $con->idtype."".$this->add_nol($stt,5);
				}
			}
			$design->sum_cost = $request->tong_tien;


			$design->save();

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
				$customer->address=$request->cus_address;
				$customer->phone=$request->cus_phone;
				$customer->email=$request->cus_email;
				$customer->save();	
			}		
		
		return redirect('design/list') ->with('thongbao', 'Thêm thành công');
	}

	public function postAddprint(Request $request){
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
				'area_s' =>'required|numeric',
				'area_sth' =>'required|numeric',
				'area_stsd' =>'required|numeric',
				'min_cost' =>'required',
				'received_cost' =>'required',
				'time' =>'required|integer',
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
				'area_s.numeric' => 'Diện tích sàn sử dụng, ban công phải là số thực ',
				'area_sth.required' => 'Bạn chưa nhập diện tích sân thượng, hiên',
				'area_sth.numeric' => 'Diện tích sàn sân thượng, hiên phải là số thực ',
				'area_stsd.required' => 'Bạn chưa nhập diện tích sân trống, đất trống',
				'area_stsd.numeric' => 'Diện tích diện tích sân trống, đất trống phải là số thực ',
				'min_cost.required' => 'Bạn chưa nhập giá trị tối thiểu của một bản vẽ',
				'received_cost.required' => 'Bạn chưa nhập giá trị tạm ứng hợp đồng',
				'time.required' => 'Bạn chưa nhập thời gian khảo sát nhà',
				'time.integer' => 'Thời gian khảo sát nhà phải là số nguyên'
			]);
			$array = array();
			$variable = design::all();
			$design= new design();

			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
			$design->cus_email = $request->cus_email;
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
					$design->name=$con->type;
					
					foreach ($variable as $key) 
					{
						if($con->idtype == preg_replace('/[^a-z]+/i',"",$key->id))
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
					$design->id = $con->idtype."".$this->add_nol($stt,5);
					$c = $con->idtype."".$this->add_nol($stt,5);
				}
			}
			$design->save();

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
				$customer->address=$request->cus_address;
				$customer->phone=$request->cus_phone;
				$customer->email=$request->cus_email;
				$customer->save();	
			}		
		return redirect('design/detail/'.$c);
	}
	
	public function getPrintTem($id)
	{
		$design=design::find($id);
		$cost=cost::all();
		$typecontract=type_contract::all();
		return view('contracttemplate.contractdesign',['design' =>$design,'cost' =>$cost,'typecontract' => $typecontract]);
	}
	public function getUpdate($id){
		$design = design::find($id);
		$account=account::all();
		$typecontract=type_contract::all();
		return view('design.update',['design' => $design, 'account' => $account, 'typecontract' => $typecontract]);
	}
	public function postUpdate(Request $request, $id){
		$design=design::find($id);
		$this->validate($request, 
			[
	/*			'id_account' =>'required',
				'id_typecontract' =>'required',
				'register_date' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'home_add' =>'required',
				'street' =>'required',
				'ward' =>'required',
				'district' =>'required',
				'area_s' =>'required|numeric',
				'area_sth' =>'required|numeric',
				'area_stsd' =>'required|numeric',
				'min_cost' =>'required',
				'received_cost' =>'required',
				'time' =>'required|integer',*/
			],
			[
			/*	'id_account.required' => 'Bạn chưa chọn nhân viên thụ hưởng',
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
				'area_s.numeric' => 'Diện tích sàn sử dụng, ban công phải là số thực ',
				'area_sth.required' => 'Bạn chưa nhập diện tích sân thượng, hiên',
				'area_sth.numeric' => 'Diện tích sàn sân thượng, hiên phải là số thực ',
				'area_stsd.required' => 'Bạn chưa nhập diện tích sân trống, đất trống',
				'area_stsd.numeric' => 'Diện tích diện tích sân trống, đất trống phải là số thực ',
				'min_cost.required' => 'Bạn chưa nhập giá trị tối thiểu của một bản vẽ',
				'received_cost.required' => 'Bạn chưa nhập giá trị tạm ứng hợp đồng',
				'time.required' => 'Bạn chưa nhập thời gian khảo sát nhà',
				'time.integer' => 'Thời gian khảo sát nhà phải là số nguyên'*/
			]);
			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
			//$design->cus_email = $request->cus_email;
			//$design->home_add = $request->home_add;
			//$design->street = $request->street;
			//$design->ward = $request->ward;
			//$design->district = $request->district;
			//$design->area_s = $request->area_s;
			//$design->area_stsd = $request->area_stsd;
			//$design->area_sth = $request->area_sth;
			//$design->min_cost = $request->min_cost;
			$design->sum_cost = $request->sum_cost;
			$design->sum_cost_fi = $request->chang_fi;
			//$design->time = $request->time;
			$design->id_typecontract = $request->id_typecontract;
			$design->id_account = $request->id_account;
			$design->status = $request->status;
 			$design->note = $request->note;

 			if($request->status == "1")
 			{
  
   				$design->complete_date =$request->complete_date;
  			}

			foreach ($typecontract as $con) {
				if($design->id_typecontract == $con->id)
				{
					$design->name=$con->type;
				}
			}

			$design->save();
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
				$customer->address=$request->cus_address;
				$customer->phone=$request->cus_phone;
				$customer->email=$request->cus_email;
				$customer->save();	
			}		
		return redirect('design/list') ->with('thongbao', 'Cập nhật thành công');
	}

	public function postUpdateprint(Request $request, $id){
		$design=design::find($id);
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
				'area_s' =>'required|numeric',
				'area_sth' =>'required|numeric',
				'area_stsd' =>'required|numeric',
				'min_cost' =>'required',
				'received_cost' =>'required',
				'time' =>'required|integer',
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
				'area_s.numeric' => 'Diện tích sàn sử dụng, ban công phải là số thực ',
				'area_sth.required' => 'Bạn chưa nhập diện tích sân thượng, hiên',
				'area_sth.numeric' => 'Diện tích sàn sân thượng, hiên phải là số thực ',
				'area_stsd.required' => 'Bạn chưa nhập diện tích sân trống, đất trống',
				'area_stsd.numeric' => 'Diện tích diện tích sân trống, đất trống phải là số thực ',
				'min_cost.required' => 'Bạn chưa nhập giá trị tối thiểu của một bản vẽ',
				'received_cost.required' => 'Bạn chưa nhập giá trị tạm ứng hợp đồng',
				'time.required' => 'Bạn chưa nhập thời gian khảo sát nhà',
				'time.integer' => 'Thời gian khảo sát nhà phải là số nguyên'
			]);
			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
			$design->cus_email = $request->cus_email;
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
					$design->name=$con->type;
				}
			}

			$design->save();

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
				$customer->address=$request->cus_address;
				$customer->phone=$request->cus_phone;
				$customer->email=$request->cus_email;
				$customer->save();	
			}		
		$design = design::find($id);
		return view('contracttemplate.contractdesign',['design' => $design]);
	}

	public function getAddoldcus($id){
		$design=customer::find($id);
		$account=account::all();
		$typecontract=type_contract::all();
		return view('design.addoldcus',['design' => $design, 'account' => $account, 'typecontract' => $typecontract]);
	}
	
	public function getDelete($id){
		try{
			$design = design::find($id);
			$design->delete();
			return redirect('design/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa hợp đồng này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}