<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\bill;
use App\design;
use App\sign;
use App\service;
use App\type_draw;
class BillController extends Controller {


	public function add_nol($number,$add_nol) {
	   while (strlen($number)<$add_nol) {
	       $number = "0".$number;
	   }
	   return $number;
	}

	public function getList()
	{
		$bill=bill::all();
		$design=design::all();
		$service = service::all();
		$sign = sign::all();
		$typedraw = type_draw::all();
		return view('bill.list', ['bill' => $bill, 'design' => $design, 'service' => $service, 'sign' => $sign, 'typedraw' => $typedraw]);
	}

	//Phiếu thu cho thiết kế
	public function getReceipts($id)
	{
		$design= design::find($id);
		return view('bill.receipts',['design' => $design]);
	}

	public function postReceipts(Request $request, $id){
		$this->validate($request, 
			[
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'reason' =>'required',
				'money' => 'required',
				'mon_character' =>'required',
				'created_date' => 'required',
				'issued_date' => 'required',
				
			
			],
			[
				'customer.required' => 'Bạn chưa nhập họ và tên người nộp tiền',
				'customer.min' => 'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ',
				'reason.required' => 'Bạn chưa nhập lý do nộp tiền',
				'money.required' => 'Bạn chưa nhập số tiền',
				'mon_character.required' => 'Bạn chưa nhập số tiền viết bằng chữ',
				'created_date.required' => 'Bạn chưa chọn ngày viết phiếu',
				
				'issued_date.required' => 'Bạn chưa chọn ngày ký phiếu',
			
			]);
			$array = array();
			$variable = bill::all();
			$bill= new bill();

			$bill->customer = $request->customer;
			$bill->address = $request ->cus_address;
			$bill->reason = $request->reason;
			$bill->money = $request->money;
			$bill->mon_character = $request->mon_character;
			$bill->attach = $request ->attach;
			$bill->owing = $request ->owing;
			$bill->have = $request->have;
			$bill->id_design = $id;
			$bill->receipts = 1;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			
			foreach ($variable as $key) 
			{
				if("PT" == preg_replace('/[^a-z]+/i',"",$key->id))
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
				$bill->id = "PT"."".$this->add_nol($stt,5);

			$bill->save();

			//lưu và chuyển đến trang in
 			$t="PT"."".$this->add_nol($stt,5);
 			return redirect('contracttemplate/receipts/'.$t);

	}

	public function getRecTem($id)
	{
		$billre= bill::find($id);
		return view('contracttemplate.receipts',['billre' => $billre]);
	}

	//Phiếu thu cho dịch vụ
	public function getReceiptsService($id)
	{
		$service= service::find($id);
		return view('bill.receiptsservice',['service' => $service]);
	}

	public function postReceiptsService(Request $request, $id){
		$this->validate($request, 
			[
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'reason' =>'required',
				'money' => 'required',
				'mon_character' =>'required',
				'created_date' => 'required',
				'issued_date' => 'required',
				
			
			],
			[
				'customer.required' => 'Bạn chưa nhập họ và tên người nộp tiền',
				'customer.min' => 'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ',
				'reason.required' => 'Bạn chưa nhập lý do nộp tiền',
				'money.required' => 'Bạn chưa nhập số tiền',
				'mon_character.required' => 'Bạn chưa nhập số tiền viết bằng chữ',
				'created_date.required' => 'Bạn chưa chọn ngày viết phiếu',
				
				'issued_date.required' => 'Bạn chưa chọn ngày ký phiếu',
			
			]);
			$array = array();
			$variable = bill::all();
			$bill= new bill();

			$bill->customer = $request->customer;
			$bill->address = $request ->cus_address;
			$bill->reason = $request->reason;
			$bill->money = $request->money;
			$bill->mon_character = $request->mon_character;
			$bill->attach = $request ->attach;
			$bill->owing = $request ->owing;
			$bill->have = $request->have;
			$bill->id_service = $id;
			$bill->receipts = 1;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			
			foreach ($variable as $key) 
			{
				if("PT" == preg_replace('/[^a-z]+/i',"",$key->id))
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
				$bill->id = "PT"."".$this->add_nol($stt,5);

			$bill->save();

			//lưu và chuyển đến trang in
 			$t="PT"."".$this->add_nol($stt,5);
 			return redirect('contracttemplate/receiptsservice/'.$t);

	}

	public function getRecTemSer($id)
	{
		$billre= bill::find($id);
		return view('contracttemplate.receipts',['billre' => $billre]);
	}


	// Phiếu chi cho thiết kế
	public function getPayment($id)
	{
		$design= design::find($id);
		return view('bill.payment',['design' => $design]);
	}

	public function postPayment(Request $request, $id){
		$this->validate($request, 
			[
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'reason' =>'required',
				'money' => 'required',
				'mon_character' =>'required',
				'created_date' => 'required',
				'issued_date' => 'required',
			],
			[
				'customer.required' => 'Bạn chưa nhập họ và tên người nhận tiền',
				'customer.min' => 'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ',
				'reason.required' => 'Bạn chưa nhập lý do nộp tiền',
				'money.required' => 'Bạn chưa nhập số tiền',
				'mon_character.required' => 'Bạn chưa nhập số tiền viết bằng chữ',
				'created_date.required' => 'Bạn chưa chọn ngày viết phiếu',
				'issued_date.required' => 'Bạn chưa chọn ngày ký phiếu',
			]);

			$array = array();
			$variable = bill::all();
			$bill= new bill();

			$stt = DB::table('bill')->count();
			$stt++;

			$bill->customer = $request->customer;
			$bill->address = $request ->cus_address;
			$bill->reason = $request->reason;
			$bill->money = $request->money;
			$bill->mon_character = $request->mon_character;
			$bill->attach = $request ->attach;
			$bill->owing = $request ->owing;
			$bill->have = $request->have;
			$bill->id_design = $id;
			$bill->receipts = 0;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			
			foreach ($variable as $key) 
			{
				if("PC" == preg_replace('/[^a-z]+/i',"",$key->id))
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
				$bill->id = "PC"."".$this->add_nol($stt,5);
			$bill->save();

			$c="PC"."".$this->add_nol($stt,5);
 			return redirect('contracttemplate/payment/'.$c);

	}

	public function getPayTem($id)
	{
		$billpayment= bill::find($id);
		return view('contracttemplate.paymenttem',['billpayment' => $billpayment]);
	}


	// Phiếu chi cho dịch vụ
	public function getPaymentservice($id)
	{
		$service= service::find($id);
		return view('bill.paymentservice',['service' => $service]);
	}

	public function postPaymentservice(Request $request, $id){
		$this->validate($request, 
			[
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'reason' =>'required',
				'money' => 'required',
				'mon_character' =>'required',
				'created_date' => 'required',
				'issued_date' => 'required',
			],
			[
				'customer.required' => 'Bạn chưa nhập họ và tên người nhận tiền',
				'customer.min' => 'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ',
				'reason.required' => 'Bạn chưa nhập lý do nộp tiền',
				'money.required' => 'Bạn chưa nhập số tiền',
				'mon_character.required' => 'Bạn chưa nhập số tiền viết bằng chữ',
				'created_date.required' => 'Bạn chưa chọn ngày viết phiếu',
				'issued_date.required' => 'Bạn chưa chọn ngày ký phiếu',
			]);

			$array = array();
			$variable = bill::all();
			$bill= new bill();

			$stt = DB::table('bill')->count();
			$stt++;

			$bill->customer = $request->customer;
			$bill->address = $request ->cus_address;
			$bill->reason = $request->reason;
			$bill->money = $request->money;
			$bill->mon_character = $request->mon_character;
			$bill->attach = $request ->attach;
			$bill->owing = $request ->owing;
			$bill->have = $request->have;
			$bill->id_service = $id;
			$bill->receipts = 0;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			
			foreach ($variable as $key) 
			{
				if("PC" == preg_replace('/[^a-z]+/i',"",$key->id))
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
				$bill->id = "PC"."".$this->add_nol($stt,5);
			$bill->save();

			$c="PC"."".$this->add_nol($stt,5);
 			return redirect('contracttemplate/paymentservice/'.$c);

	}

	public function getPayTemSer($id)
	{
		$billpayment= bill::find($id);
		return view('contracttemplate.paymenttem',['billpayment' => $billpayment]);
	}


	// Phiếu thu cho lấy dấu
	public function getSignReceipts($id)
	{
		$sign= sign::find($id);
		return view('bill.signreceipts',['sign' => $sign]);
	}

	public function postSignReceipts(Request $request, $id){
		$this->validate($request, 
			[
				'customer' =>'required|min:3|max:100',
				'cus_address' =>'required',
				'reason' =>'required',
				'money' => 'required',
				'mon_character' =>'required',
				'created_date' => 'required',
				'issued_date' => 'required',
			],
			[
				'customer.required' => 'Bạn chưa nhập họ và tên người nộp tiền',
				'customer.min' => 'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'customer.max' =>'Họ và tên người nộp tiền phải có độ dài từ 3 đến 100 ký tự',
				'cus_address.required' => 'Bạn chưa nhập địa chỉ hoặc số điện thoại',
				'reason.required' => 'Bạn chưa nhập lý do nộp tiền',
				'money.required' => 'Bạn chưa nhập số tiền',
				'mon_character.required' => 'Bạn chưa nhập số tiền viết bằng chữ',
				'created_date.required' => 'Bạn chưa chọn ngày viết phiếu',
				'issued_date.required' => 'Bạn chưa chọn ngày ký phiếu',
				
			]);
			$array = array();
			$variable = bill::all();
			$bill= new bill();

			$result=0;
			$sign = sign::find($id);
			$result = (int) str_replace(".","",$sign->received_cost) + (int) str_replace(".","",$request ->money);
			$sign->received_cost = number_format($result,0,",",".");
			$sign->save();

			$bill->customer = $request->customer;
			$bill->address = $request ->cus_address;
			$bill->reason = $request->reason;
			$bill->money = $request->money;
			$bill->mon_character = $request->mon_character;
			$bill->attach = $request ->attach;
			$bill->owing = $request ->owing;
			$bill->have = $request->have;
			$bill->id_sign = $id;
			$bill->receipts = 1;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			
			foreach ($variable as $key) 
			{
				if("PT" == preg_replace('/[^a-z]+/i',"",$key->id))
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
				$bill->id = "PT"."".$this->add_nol($stt,5);

			$bill->save();

			//lưu và chuyển đến trang in
 			$t="PT"."".$this->add_nol($stt,5);
 			return redirect('contracttemplate/signreceipts/'.$t);

	}

	public function getSignRecTem($id)
	{
		$billre= bill::find($id);
		return view('contracttemplate.receipts',['billre' => $billre]);
	}


	public function getUpdate($id)
	{
		$bill= bill::find($id);
		return view('bill.update',['bill' => $bill]);
	}

	public function postUpdate(Request $request, $id){
			$bill=bill::find($id);
			$bill->note = $request->note;

			$bill->save();

		
		return redirect('bill/list') ->with('thongbao', 'Chỉnh sửa thành công');
	}
}
