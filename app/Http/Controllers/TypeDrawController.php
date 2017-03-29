<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\type_draw;
class TypeDrawController extends Controller {
    public function getList(){
        
        $type_draw=type_draw::all(); //type_draw cua model, khong phai table
        return view('type_draw.list',['type_draw'=>$type_draw]); 
                                    //key: type_draw   value:$type_draw (value được truyền sang cho view o ham foreach)
    }
    public function getAdd(){
        return view('type_draw.add');
    }
    public function postAdd(Request $request){
        $this->validate($request, 
            [
                'typedraw' => 'required|min:3|max:100',
                'idtypedraw' => 'required', //// typedraw lấy request từ name của input bên view (ví dụ: name="typedraw" placeholder="Nhập tên quyền truy cập"),
                'cost' => 'required'
            ],
            [
                'typedraw.required' => 'Bạn chưa nhập loại hợp đồng',
                'typedraw.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
                'typedraw.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
                'idtypedraw.required' => 'Bạn chưa nhập mã loại hợp đồng',
                'cost.required' => 'Bạn phải nhập giá trị bản vẽ'
            ]);
            $type_draw = new type_draw();  // tạo type_draw model mới
            $type_draw->type = $request->typedraw;  // typedraw lấy request từ name của input bên view (ví dụ: name="typedraw" placeholder="Nhập tên quyền truy cập")
            $type_draw->idtype = $request->idtypedraw;
            $type_draw->description = $request->description; // tương tự như trên
            $type_draw->cost = $request->cost;
            $type_draw->save();
            return redirect('draw/list') ->with('thongbao', 'Thêm thành công');
        }
    
    public function getUpdate($id){
        $type_draw = type_draw::find($id);
        return view('type_draw.update',['type_draw' => $type_draw]);
    }
    public function postUpdate(Request $request, $id){
        $type_draw = type_draw::find($id);
        $this->validate($request, 
            [
                'typedraw' => 'required|min:3|max:100',
                'idtypedraw' => 'required',
                'cost' => 'required' 
            ],
            [
                'typedraw.required' => 'Bạn chưa nhập loại hợp đồng',
                'typedraw.min' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
                'typedraw.max' => 'loại hợp đồng phải có độ dài từ 3 đến 100 ký tự',
                'idtypedraw.required' => 'Bạn chưa nhập mã loại hợp đồng',
                'cost.required' => 'Bạn phải nhập giá trị bản vẽ'
            ]);
        $type_draw->type = $request->typedraw;
        $type_draw->description = $request->description;
        $type_draw->idtype = $request->idtypedraw;
        $type_draw->cost = $request->cost;
        $type_draw->save();
        return redirect('draw/list') ->with('thongbao', 'Cập nhật thành công');
        
    }
    public function getDelete($id){
        try{
            $type_draw = type_draw::findOrFail($id);
            $type_draw->delete();
            return redirect('draw/list') ->with('thongbao', 'Xóa thành công');
        }
        catch(\Exception $e)
        {
            return '<script type="text/javascript">alert("Không thể xóa loại bản vẽ này do nó đã được tham chiếu"); window.location.href = "../list";</script>';
        }
    }
}