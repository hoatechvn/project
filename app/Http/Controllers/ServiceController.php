<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\service;
use App\account;
use App\type_contract;
use App\customer;
use App\cost;
use App\detailbrief;
use App\brief;

class ServiceController extends Controller {

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
		$service=service::all(); 
		return view('service.list',['service'=>$service]);			
	}
	public function getAdd(){
		$account=account::all();
		$typecontract=type_contract::all();
		$brief=brief::all();
		return view('service.add',['account'=>$account, 'typecontract'=>$typecontract,'brief' => $brief]);
	}
	public function postAdd(Request $request){
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'register_date' =>'required',
				'tong_tien' =>'required'
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
				'tong_tien.required' => 'Bạn chưa nhập tổng tiền của hợp đồng'
			]);
			$array = array();
			$variable = service::all();
			$service= new service();

			$typecontract = type_contract::all();

			$service->register_date = $request->register_date;
			$service->customer = $request->customer;
			$service->cus_address = $request->cus_address;
			if($request->changeadd == "on")
  			{
  				$service->cus_address1 = $request->add1;
 			}
 			else
 			{
 				$service->cus_address1 = $request->cus_address;
 			}
			$service->cus_phone = $request->cus_phone;
			$service->cus_email = $request->cus_mail;
			$service->id_typecontract = $request->id_typecontract;
			$service->id_account = $request->id_account;
			$service->sum_cost = $request->tong_tien;
			$service->received_cost = $request->received_cost;
			foreach ($typecontract as $con) 
			{
				if($con->id == $request->id_typecontract)
					$time=$con->time;
			}
			$service->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',strtotime($request->register_date)) , date('d',strtotime($request->register_date))+$time, date('Y',strtotime($request->register_date))));
			$dates=array();
			$dem=0;
			$start=strtotime($request->register_date);
			$end= strtotime($service->return_date);
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
			$service->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',$end) , date('d',$end)+$dem, date('Y',$end)));
			if(date('w',strtotime($service->return_date)) == 6)
				$service->return_date = date('Y-m-d', strtotime('+2 day', strtotime($service->return_date)));
			if(date('w',strtotime($service->return_date)) == 0)
				$service->return_date = date('Y-m-d', strtotime('+1 day', strtotime($service->return_date)));

			foreach ($typecontract as $con) {
				if($service->id_typecontract == $con->id)
				{
					$service->name=$con->type;
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
					$service->id = $con->idtype."".$this->add_nol($stt,5);
					$id=$con->idtype."".$this->add_nol($stt,5);
				}
			}

			$service->save();

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
		for($i=0;$i<count($request->input('name')); $i++)
  		 	{
  		 		$detailbrief = new detailbrief();
  		 		$brief = brief::all();
  		 		foreach ($brief as $bri) {
  		 			if($bri->id == $request->get('brief')[$i])
  		 				$detailbrief->name = $bri->name." ".$request->get('name')[$i];
  		 		}
  		 		$detailbrief->main = $request->get('main')[$i];
  		 		$detailbrief->photo = $request->get('photo')[$i];
  		 		$detailbrief->id_brief = $request->get('brief')[$i];
  		 		$detailbrief->id_service = $id;
  		 		$detailbrief->save();
  		 	}
		return redirect('service/list') ->with('thongbao', 'Thêm thành công');
	}

	public function postAddprint(Request $request){
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'register_date' =>'required',
				'tong_tien' =>'required'
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
				'tong_tien.required' => 'Bạn chưa nhập tổng tiền của hợp đồng'
			]);
			$array = array();
			$variable = service::all();
			$service= new service();

			$typecontract = type_contract::all();

			$service->register_date = $request->register_date;
			$service->customer = $request->customer;
			$service->cus_address = $request->cus_address;
			if($request->changeadd == "on")
  			{
  				$service->cus_address1 = $request->add1;
 			}
 			else
 			{
 				$service->cus_address1 = $request->cus_address;
 			}
			$service->cus_phone = $request->cus_phone;
			$service->cus_email = $request->cus_mail;
			$service->id_typecontract = $request->id_typecontract;
			$service->id_account = $request->id_account;
			$service->sum_cost = $request->tong_tien;
			$service->received_cost = $request->received_cost;
			foreach ($typecontract as $con) 
			{
				if($con->id == $request->id_typecontract)
					$time=$con->time;
			}
			$service->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',strtotime($request->register_date)) , date('d',strtotime($request->register_date))+$time, date('Y',strtotime($request->register_date))));
			$dates=array();
			$dem=0;
			$start=strtotime($request->register_date);
			$end= strtotime($service->return_date);
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
			$service->return_date=date('Y-m-d', mktime(0, 0, 0, date('m',$end) , date('d',$end)+$dem, date('Y',$end)));
			if(date('w',strtotime($service->return_date)) == 6)
				$service->return_date = date('Y-m-d', strtotime('+2 day', strtotime($service->return_date)));
			if(date('w',strtotime($service->return_date)) == 0)
				$service->return_date = date('Y-m-d', strtotime('+1 day', strtotime($service->return_date)));

			foreach ($typecontract as $con) {
				if($service->id_typecontract == $con->id)
				{
					$service->name=$con->type;
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
					$service->id = $con->idtype."".$this->add_nol($stt,5);
					$id=$con->idtype."".$this->add_nol($stt,5);
				}
			}

			$service->save();

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
		for($i=0;$i<count($request->input('name')); $i++)
  		 	{
  		 		$detailbrief = new detailbrief();
  		 		$brief = brief::all();
  		 		foreach ($brief as $bri) {
  		 			if($bri->id == $request->get('brief')[$i])
  		 				$detailbrief->name = $bri->name." ".$request->get('name')[$i];
  		 		}
  		 		$detailbrief->main = $request->get('main')[$i];
  		 		$detailbrief->photo = $request->get('photo')[$i];
  		 		$detailbrief->id_brief = $request->get('brief')[$i];
  		 		$detailbrief->id_service = $id;
  		 		$detailbrief->save();
  		 	}
  		 	return redirect('service/detail/'.$c);
	}

	public function getPrintTem($id)
	{
		$service=service::find($id);
		$service=cost::all();
 		$typecontract=type_contract::all();
 		return view('contracttemplate.contractservice',['service' =>$service,'cost' =>$cost,'typecontract' => $typecontract]);
 	}

 	public function getUpdate($id){
		$service = service::find($id);
		$account=account::all();
		$typecontract=type_contract::all();
		$detailbrief = detailbrief::all();
		$brie = brief::all();
		return view('service.update',['service' => $service, 'account' => $account, 'typecontract' => $typecontract, 'detailbrief' => $detailbrief, 'brie' => $brie]);
	}

	public function postUpdate(Request $request, $id)
	{
		$service = service::find($id);
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'register_date' =>'required',
				
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

			$service->register_date = $request->register_date;
			$service->customer = $request->customer;
			$service->cus_address = $request->cus_address;
			if($request->changeadd == "on")
  			{
  				$service->cus_address1 = $request->add1;
 			}
 			else
 			{
 				$service->cus_address1 = $request->cus_address;
 			}
			$service->cus_phone = $request->cus_phone;
			$service->cus_email = $request->cus_mail;
			$service->id_typecontract = $request->id_typecontract;
			$service->id_account = $request->id_account;
			$service->sum_cost = $request->sum_cost;
			$service->received_cost = $request->received_cost;
			$service->status = $request->status;

			if($request->changeend == "on")
			{
				$this->validate($request, 
					[
					'chang_fi' => 'required'
					],
					[
					'chang_fi.required' => 'Bạn phải nhập giá trị mới cho tổng tiền'
					]);
				$service->sum_cost_fi = $request->chang_fi;
			}
			else
			{
				$service->sum_cost_fi = $request->sum_cost;
			}
			if($request->status == "1")
 			{
  
   				$service->complete_date =$request->complete_date;
  			}
			$service->save();

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
			$d=0;
			$detail = detailbrief::all();
			foreach ($detail as $key ) 
			{
				if($key->id_service == $id)
					$d++;

			}		
		for($i=$d;$i<count($request->input('name')); $i++)
  		 	{
  		 		$detailbrief = new detailbrief();
  		 		$brief = brief::all();
  		 		foreach ($brief as $bri) {
  		 			if($bri->id == $request->get('brief')[$i])
  		 				$detailbrief->name = $bri->name." ".$request->get('name')[$i];
  		 		}
  		 		$detailbrief->main = $request->get('main')[$i];
  		 		$detailbrief->photo = $request->get('photo')[$i];
  		 		$detailbrief->id_brief = $request->get('brief')[$i];
  		 		$detailbrief->id_service = $id;
  		 		$detailbrief->save();
  		 	}
  		return redirect('service/list') ->with('thongbao', 'Cập nhật thành công');
	}

	public function postUpdateprint(Request $request, $id){
		$service = service::find($id);
		$this->validate($request, 
			[
				'id_account' =>'required',
				'id_typecontract' =>'required',
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'cus_phone'=> 'required|min:10|max:11',
				'register_date' =>'required',
				
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

			$service->register_date = $request->register_date;
			$service->customer = $request->customer;
			$service->cus_address = $request->cus_address;
			if($request->changeadd == "on")
  			{
  				$service->cus_address1 = $request->add1;
 			}
 			else
 			{
 				$service->cus_address1 = $request->cus_address;
 			}
			$service->cus_phone = $request->cus_phone;
			$service->cus_email = $request->cus_mail;
			$service->id_typecontract = $request->id_typecontract;
			$service->id_account = $request->id_account;
			$service->sum_cost = $request->sum_cost;
			$service->received_cost = $request->received_cost;

			if($request->changeend == "on")
			{
				$this->validate($request, 
					[
					'chang_fi' => 'required'
					],
					[
					'chang_fi.required' => 'Bạn phải nhập giá trị mới cho tổng tiền'
					]);
				$service->sum_cost_fi = $request->chang_fi;
			}
			else
			{
				$service->sum_cost_fi = $request->sum_cost;
			}
			$service->save();

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
			$d=0;
			$detail = detailbrief::all();
			foreach ($detail as $key ) 
			{
				if($key->id_service == $id)
					$d++;

			}		
		for($i=$d;$i<count($request->input('name')); $i++)
  		 	{
  		 		$detailbrief = new detailbrief();
  		 		$brief = brief::all();
  		 		foreach ($brief as $bri) {
  		 			if($bri->id == $request->get('brief')[$i])
  		 				$detailbrief->name = $bri->name." ".$request->get('name')[$i];
  		 		}
  		 		$detailbrief->main = $request->get('main')[$i];
  		 		$detailbrief->photo = $request->get('photo')[$i];
  		 		$detailbrief->id_brief = $request->get('brief')[$i];
  		 		$detailbrief->id_service = $id;
  		 		$detailbrief->save();
  		 	}
  		 return view('contracttemplate.contractservice',['service' =>$service,'cost' =>$cost,'typecontract' => $typecontract]);
	}
	public function getAddoldcus($id){
		$service=customer::find($id);
		$account=account::all();
		$typecontract=type_contract::all();
		$brief=brief::all();
		return view('service.addoldcus',['service' => $service, 'account' => $account, 'typecontract' => $typecontract, 'brief' => $brief]);
	}
	
	public function getDelete($id){
		try{
			$service = service::find($id);
			$service->delete();
			return redirect('service/list') ->with('thongbao', 'Xóa thành công');
		}
		catch(\Exception $e)
		{
			return '<script type="text/javascript">alert("Không thể xóa hợp đồng này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
		}
	}
}
