<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\bill;
use App\design;

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
		return view('bill.list', ['bill' => $bill, 'design' => $design]);
	}

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
				'created_date.required' => 'Bạn chưa ngày viết phiếu',
				'issued_date.required' => 'Bạn chưa ngày ký phiếu',
			]);

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
			$bill->id_contract = $id;
			$bill->receipts = 1;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			$bill->id = "PT"."".$this->add_nol($stt,5);

			$bill->save();

		
		return redirect('bill/list') ->with('thongbao', 'Thêm thành công');
	}

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
				'created_date.required' => 'Bạn chưa ngày viết phiếu',
				'issued_date.required' => 'Bạn chưa ngày ký phiếu',
			]);

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
			$bill->id_contract = $id;
			$bill->receipts = 0;
			$bill->note = $request->note;
			$bill->created_date = $request->created_date;
			$bill->issued_date = $request->issued_date;
			$bill->id = "PC"."".$this->add_nol($stt,5);

			$bill->save();

		
		return redirect('bill/list') ->with('thongbao', 'Thêm thành công');
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
