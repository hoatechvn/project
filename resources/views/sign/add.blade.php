@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin lấy dấu
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
                </div>
            @endif
            <form action="sign/add" method="POST">
                <div class="col-lg-12" style="padding-bottom:50px">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Nhân viên thụ hưởng <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_account">
                        	<option>Chọn nhân viên thụ hưởng</option>
                            @foreach ($account as $acc)
                            <option value="{{$acc->id}}">{{$acc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại bản vẽ lấy dấu <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_typedraw">
                            <option value="0">Chọn loại bản vẽ </option>
                            @foreach ($typedraw as $draw)
                            <option value="{{$draw->id}}">{{$draw->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Họ và tên chủ nhà <font style="color: red;">*</font></label>
                        <input class="form-control" name="owed_home" placeholder="Nhập họ và tên chủ nhà"/>
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ <font style="color: red;">*</font> </label>
                        <input class="form-control" name="address"  placeholder="Nhập địa chỉ chủ nhà" />
                    </div>
                    <div class="form-group">
                        <label> Họ và tên người lấy dấu <font style="color: red;">*</font></label>
                        <input class="form-control" name="customer"  placeholder="Nhập họ và tên người lấy dấu" />
                    </div>
                    
                    <div class="form-group">
                        <label> Số điện thoại</label>
                        <input  class="form-control" name="phone" placeholder="Nhập số điện thoại người lấy dấu" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Ngày lấy dấu <font style="color: red;">*</font></label>
                        <input class="form-control" name="created_date" type="date"/>
                    </div>
                    <div class="form-group">
                    	<label> Nhập số tiền tạm ứng (VNĐ)</label>
	                    <input onChange="format_curency(this);" class="form-control" name="received_cost" placeholder="Nhập số tiền tạm ứng (trong khoảng từ 0 - 9)" onkeydown="return ( event.ctrlKey || event.altKey 
	                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
	                    || (95<event.keyCode && event.keyCode<106)
	                    || (event.keyCode==8) || (event.keyCode==9) 
	                    || (event.keyCode>34 && event.keyCode<40) 
	                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
	               	 	<label>Lưu ý</label>
	                	<textarea class="form-control" rows="3" name="note"></textarea>
                	</div>
                	<button type="submit" class="btn btn-default">Lưu</button>
                	<button type="reset" class="btn btn-default">Làm mới</button>
                </div>
             
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<script type="text/javascript">
    function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
</script>
<!-- /#page-wrapper -->
@endsection
<!-- /#page-wrapper -->
