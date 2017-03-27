@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tạo hợp đồng thiết kế
                </h1>
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{$err}}<br>
                @endforeach
                </div>
            @endif
            <!-- /.col-lg-12 -->
            
          
            <form action="design/add" id="form1" method="POST">
                <div class="col-lg-6" style="padding-bottom:50px">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h2> Thông tin chung</h2><br>
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
                        <label>Loại hợp đồng <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_typecontract">
                            <option value="0">Chọn loại hợp đồng </option>
                            @foreach ($typecontract as $con)
                            <option value="{{$con->id}}">{{$con->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng ký <font style="color: red;">*</font></label>
                        <input class="form-control" name="register_date" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng <font style="color: red;">*</font></label>
                        <input class="form-control" name="customer" value="{{$design->name}}"  placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng <font style="color: red;">*</font></label>
                        <input class="form-control" name="cus_address" value="{{$design->address}}" placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại <font style="color: red;">*</font></label>
                        <input onChange="format_curency(this);" class="form-control" name="cus_phone" placeholder="Nhập số điện thoại" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" name="cus_email" value="{{$design->email}}" type="email" placeholder="Nhập email" />
                    </div>
                </div>
                <div class="col-lg-6" style="padding-bottom:50px"> 
                    <h2> Thông tin chi tiết </h2><br>
                    <div class="form-group">
                        <label>Số nhà <font style="color: red;">*</font></label>
                        <input class="form-control" name="home_add" placeholder="Nhập số nhà " />
                    </div>
                    <div class="form-group">
                        <label>Đường <font style="color: red;">*</font></label>
                        <input class="form-control" name="street" placeholder="Nhập đường " />
                    </div>
                    <div class="form-group">
                        <label> Phường <font style="color: red;">*</font></label>
                        <input class="form-control" name="ward" placeholder="Nhập phường " />
                    </div>
                    <div class="form-group">
                        <label> Quận <font style="color: red;">*</font></label>
                        <input class="form-control" name="district" placeholder="Nhập quận " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sàn sử dụng, ban công (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_s" placeholder="Nhập diện tích sàn sử dụng, ban công " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân thượng, hiên (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_sth" placeholder="Nhập diện tích sân thượng, hiên " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân trống, đất trống (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_stsd" placeholder="Nhập diện tích sân trống, đất trống " />
                    </div>
                    <div class="form-group">
                        <label> Giá trị tối thiểu của một bản vẽ (VNĐ) <font style="color: red;">*</font></label>
                        <input onChange="format_curency(this);" class="form-control" name="min_cost"  placeholder="Nhập giá trị tối thiểu của bản vẽ (trong khoảng từ 0 đến 9)" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Số tiền tạm ứng (VNĐ) <font style="color: red;">*</font> </label>
                        <input onChange="format_curency(this);" class="form-control" name="received_cost" placeholder="Nhập số tiền tạm ứng (trong khoảng từ 0 đến 9) " onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Thời gian khảo sát nhà (ngày) <font style="color: red;">*</font></label>
                        <input class="form-control" name="time" placeholder="Nhập thời gian khảo sát nhà" />
                    </div>
                    <button type="submit" class="btn btn-default" onclick="submitForm('design/add')" >Lưu</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button type="submit" class="btn btn-default" onclick="submitForm('design/addprint')" >Lưu và in </button>
                </div>

                <form>
        
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }

    function format_curency(a) {
        a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
</script>
@endsection
<!-- /#page-wrapper -->
