<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\detailbrief;
use App\brief;
class DetailbriefController extends Controller {

	public function getList(){
		$detailbrief = detailbrief::all();
		return view('detailbrief.list',['detailbrief' =>$detailbrief]);
	}

	public function getAdd(){
		$brief = brief::all();
		return view('detailbrief.add',['brief' => $brief]);
	}

	public function postAdd(Request $request){
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
  		 		$detailbrief->save();
  		 	}
	

		return redirect('detailbrief/list') ->with('thongbao', 'Thêm thành công');
	}
	
	

	public function getDelete($id){
		
	}
}
