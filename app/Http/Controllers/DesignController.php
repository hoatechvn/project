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
<<<<<<< HEAD
use App\service;
=======
>>>>>>> origin/master
class DesignController extends Controller {
	
	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}

	function format_curency($a) 
	{
    	return preg_replace('/(\d)(?=(\d{3})+(?!\d))/', '$1.',$a);
    	
	}

	public function getList(){
		$design=design::all(); 
<<<<<<< HEAD
		return view('design.list',['design'=>$design]);			
=======
		return view('design.list',['design'=>$design]);

									
>>>>>>> origin/master
	}
	public function getAdd(){
		$account=account::all();
		$typecontract=type_contract::all();
		$service = service::all();
		return view('design.add',['account'=>$account, 'typecontract'=>$typecontract, 'service' => $service]);
	}
	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
<<<<<<< HEAD
=======
				
				
>>>>>>> origin/master
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
<<<<<<< HEAD
=======
				
				
>>>>>>> origin/master
			]);
			$array = array();
			$variable = design::all();
			$design= new design();

			$typecontract = type_contract::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			if($request->changeadd == "on")
<<<<<<< HEAD
  			{
  				$design->cus_address1 = $request->add1;
 			}
 			else
 			{
 				$design->cus_address1 = $request->cus_address;
 			}
			$design->cus_phone = $request->cus_phone;
			$design->cus_email = $request->cus_mail;
=======
 			{

			$design->cus_address1 = $request->add1;

			}
			else
			{
			$design->cus_address1 = $request->cus_address;
			}
			$design->cus_phone = $request->cus_phone;
			$design->cus_email = $request->cus_mail;
		
>>>>>>> origin/master
			$design->id_typecontract = $request->id_typecontract;
			$design->id_account = $request->id_account;
			$design->sum_cost = $request->tong_tien;
			$design->received_cost = "1.400.000";
			$design->id_service = $request->id_service;
			foreach ($typecontract as $con) 
			{
				if($con->id == $request->id_typecontract)
					$time=$con->time;
			}
			$design->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',strtotime($request->register_date)) , date('d',strtotime($request->register_date))+$time, date('Y',strtotime($request->register_date))));
			$dates=array();
			$dem=0;
			$start=strtotime($request->register_date);
			$end= strtotime($design->return_date);
			while($start<=$end)
			{
				array_push($dates, $start);
				$start= strtotime('+1 day', $start);
			}
			foreach ($dates as $key) 
			{
				if(date('w',$key) == 6 || date('w',$key) == 0 )
				{
					$dem++;
				}
				
			}
			$design->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',$end) , date('d',$end)+$dem	, date('Y',$end)));
			if(date('w',strtotime($design->return_date)) == 6)
				$design->return_date = date('Y-m-d', strtotime('+2 day', strtotime($design->return_date)));
			if(date('w',strtotime($design->return_date)) == 0)
				$design->return_date = date('Y-m-d', strtotime('+1 day', strtotime($design->return_date)));

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
			$design->sum_cost = $request->tong_tien;
			$design->received_cost = "1.400.000";
			$design->id_service = $request->id_service;
			foreach ($typecontract as $con) 
			{
				if($con->id == $request->id_typecontract)
					$time=$con->time;
			}
			$design->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',strtotime($request->register_date)) , date('d',strtotime($request->register_date))+$time, date('Y',strtotime($request->register_date))));
			$dates=array();
			$dem=0;
			$start=strtotime($request->register_date);
			$end= strtotime($design->return_date);
			while($start<=$end)
			{
				array_push($dates, $start);
				$start= strtotime('+1 day', $start);
			}
			foreach ($dates as $key) 
			{
				if(date('w',$key) == 6 || date('w',$key) == 0 )
				{
					$dem++;
				}
				
			}
			$design->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',$end) , date('d',$end)+$dem	, date('Y',$end)));
			if(date('w',strtotime($design->return_date)) == 6)
				$design->return_date = date('Y-m-d', strtotime('+2 day', strtotime($design->return_date)));
			if(date('w',strtotime($design->return_date)) == 0)
				$design->return_date = date('Y-m-d', strtotime('+1 day', strtotime($design->return_date)));
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
<<<<<<< HEAD
 		$typecontract=type_contract::all();
 		return view('contracttemplate.contractdesign',['design' =>$design,'cost' =>$cost,'typecontract' => $typecontract]);
 	}
=======
		$typecontract=type_contract::all();
		return view('contracttemplate.contractdesign',['design' =>$design,'cost' =>$cost,'typecontract' => $typecontract]);
	}
>>>>>>> origin/master
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
				
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
<<<<<<< HEAD
=======
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
>>>>>>> origin/master
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
				
<<<<<<< HEAD
			
=======
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
>>>>>>> origin/master
			]);
			$typecontract = type_contract::all();
			$cost = cost::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
<<<<<<< HEAD
			$design->sum_cost = $request->sum_cost;
			$design->area_s = $request->area_s;
			$design->area_sth = $request->area_sth;	
			$design->area_stsd = $request->area_stsd;
			$design->id_service = $request->id_service;
			
			if($request->changeend == "on")
			{	
				if(preg_replace('/[^a-z]+/i',"",$id) == 'HTND')
				{
					$this->validate($request, 
					[
					'area_s' => 'required',
					'area_sth' => 'required',
					'area_stsd' => 'required',
					],
					[
					'area_s.required' => 'Bạn phải nhập diện tích sàn sử dụng, ban công',
					'area_sth.required' => 'Bạn phải nhập diện tích sân thượng, hiên, sân mái che',
					'area_stsd.required' => 'Bạn phải nhập diện tích sân trống, đất trống',
					]);
				}
				else
				{
					$this->validate($request, 
					[
					'chang_fi' => 'required'
					],
					[
					'chang_fi.required' => 'Bạn phải nhập giá trị mới cho tổng tiền'
					]);
				}
				
				if($request->chang_fi != "")		
	 				$design->sum_cost_fi = $request->chang_fi;
	 			else
	 			{
	 				foreach ($cost as $cos) {
	 					if($cos->id == 'BC') $area_s = (float) str_replace(".","",$cos->cost);
	 					if($cos->id == 'ST') $area_sth = (float) str_replace(".","",$cos->cost);
	 					if($cos->id == 'DT') $area_stsd = (float) str_replace(".","",$cos->cost);	
	 				}
	 				$design->sum_cost_fi = $this->format_curency((string)($area_s * $design->area_s  + $area_sth * $design->area_sth + $area_stsd * $design->area_stsd ));
	 			}
	 		}
	 		else
	 		{
	 			$design->sum_cost_fi = $request->sum_cost;
	 		}
=======
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
>>>>>>> origin/master
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
			$typecontract = type_contract::all();
			$cost = cost::all();

			$design->register_date = $request->register_date;
			$design->customer = $request->customer;
			$design->cus_address = $request->cus_address;
			$design->cus_phone = $request->cus_phone;
			$design->sum_cost = $request->sum_cost;
			$design->area_s = $request->area_s;
			$design->area_sth = $request->area_sth;	
			$design->area_stsd = $request->area_stsd;
			$design->id_service = $request->id_service;
			
			if($request->changeend == "on")
			{	
				if(preg_replace('/[^a-z]+/i',"",$id) == 'HTND')
				{
					$this->validate($request, 
					[
					'area_s' => 'required',
					'area_sth' => 'required',
					'area_stsd' => 'required',
					],
					[
					'area_s.required' => 'Bạn phải nhập diện tích sàn sử dụng, ban công',
					'area_sth.required' => 'Bạn phải nhập diện tích sân thượng, hiên, sân mái che',
					'area_stsd.required' => 'Bạn phải nhập diện tích sân trống, đất trống',
					]);
				}
				else
				{
					$this->validate($request, 
					[
					'chang_fi' => 'required'
					],
					[
					'chang_fi.required' => 'Bạn phải nhập giá trị mới cho tổng tiền'
					]);
				}
				
				if($request->chang_fi != "")		
	 				$design->sum_cost_fi = $request->chang_fi;
	 			else
	 			{
	 				foreach ($cost as $cos) {
	 					if($cos->id == 'BC') $area_s = (float) str_replace(".","",$cos->cost);
	 					if($cos->id == 'ST') $area_sth = (float) str_replace(".","",$cos->cost);
	 					if($cos->id == 'DT') $area_stsd = (float) str_replace(".","",$cos->cost);	
	 				}
	 				$design->sum_cost_fi = $this->format_curency((string)($area_s * $design->area_s  + $area_sth * $design->area_sth + $area_stsd * $design->area_stsd ));
	 			}
	 		}
	 		else
	 		{
	 			$design->sum_cost_fi = $request->sum_cost;
	 		}
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
		 return view('contracttemplate.contractdesign',['design' =>$design,'cost' =>$cost,'typecontract' => $typecontract]);
	}

	public function getAddoldcus($id){
		$design=customer::find($id);
		$account=account::all();
		$typecontract=type_contract::all();
<<<<<<< HEAD
		$service = service::all();
		return view('design.addoldcus',['design' => $design, 'account' => $account, 'typecontract' => $typecontract, 'service' => $service]);
=======
		return view('design.addoldcus',['design' => $design, 'account' => $account, 'typecontract' => $typecontract]);
>>>>>>> origin/master
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