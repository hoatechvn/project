@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hợp đồng 
                <small>{{$design->name}}</small>
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
            
            
            <form action="design/update/{{$design->id}}" id="form1" method="POST">
                <div class="col-lg-6" style="padding-bottom:50px">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h2> Thông tin chung</h2><br>
                    <div class="form-group">
                        <label>Nhân viên thụ hưởng <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_account">
                        	@foreach ($account as $acc)
                            <option 
                            @if($design->id_account == $acc->id)
                                {{'selected'}}
                            @endif
                            value="{{$acc->id}}">{{$acc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại hợp đồng <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_typecontract">
                            @foreach ($typecontract as $con)
                            <option 
                            @if($design->id_typecontract == $con->id)
                                {{'selected'}}
                            @endif
                            value="{{$con->id}}">{{$con->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng ký <font style="color: red;">*</font></label>
                        <input class="form-control" name="register_date" value="{{$design->register_date}}" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng <font style="color: red;">*</font></label>
                        <input class="form-control" name="customer" value="{{$design->customer}}" placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng <font style="color: red;">*</font></label>
                        <input class="form-control" name="cus_address" value="{{$design->cus_address}}" placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại <font style="color: red;">*</font></label>
                       <input onChange="format_curency(this);" class="form-control" name="cus_phone" value="{{$design->cus_phone}}"
                       placeholder="Nhập số điện thoại" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" name="cus_email" value="{{$design->cus_email}}" type="email" placeholder="Nhập email" />
                    </div>
<<<<<<< HEAD
                    <div class="form-group">
                        <label> Trạng thái hoàn thành</label>
                        <br>
                        <label class="radio-inline"> 
                            <input name="status" value="0"
                            @if($design->status ==0)
                                {{"checked"}}
                            @endif
                            type="radio"> Chưa hoàn thành
                        </label>
                        <label class="radio-inline"> 
                        <input id="status_com" name="status" value="1"
                            @if($design->status == 1)
                                {{"checked"}}
                            @endif
                            type="radio" > Hoàn thành
                        <li id="show-me" style="display:none"> <label> Ngày hoàn thành:&nbsp;  </label><input  style="border: none;" name="complete_date" value="{{date('Y-m-d')}}" readonly="" /></li>
                       </label>
                    </div>
                    <div class="form-group">
                         <label> Ghi chú</label>
                         <textarea class="form-control" rows="3" name="note" >{{$design->note}}</textarea>
                    </div>    
=======

                    <div class="form-group">
                        <label> Trạng thái hoàn thành</label>
                        <br>
                         <label class="radio-inline"> 
                         <input name="status" value="0"
                        @if($design->status ==0)
                         {{"checked"}}
                         @endif
                         type="radio"> Chưa hoàn thành
                         </label>

                          <label class="radio-inline"> 

                         <input id="status_com" name="status" value="1"
                                 @if($design->status == 1)
                                     {{"checked"}}
                                 @endif
                         type="radio" > Hoàn thành
                           <li id="show-me" style="display:none"> <label> Ngày hoàn thành:&nbsp;  </label><input  style="border: none;" name="complete_date" value="{{date('Y-m-d')}}" readonly="" /></li>
                         </label>

                    </div>
                    <div class="form-group">
                        <label> Ghi chú</label>
                        <textarea class="form-control" rows="3" name="note" >{{$design->note}}</textarea>
                      
                    </div>


>>>>>>> origin/master
                </div>
                <div class="col-lg-6" style="padding-bottom:50px"> 
                    <h2> Thông tin chi tiết</h2><br>
                    <div class="form-group">
                        <label>Số nhà <font style="color: red;">*</font> </label>
                        <input class="form-control" name="home_add" value="{{$design->home_add}}" placeholder="Nhập số nhà " />
                    </div>
                    <div class="form-group">
                        <label>Đường <font style="color: red;">*</font></label>
                        <input class="form-control" name="street" value="{{$design->street}}" placeholder="Nhập đường " />
                    </div>
                    <div class="form-group">
                        <label> Phường <font style="color: red;">*</font></label>
                        <input class="form-control" name="ward" value="{{$design->ward}}" placeholder="Nhập phường " />
                    </div>
                    <div class="form-group">
                        <label> Quận <font style="color: red;">*</font></label>
                        <input class="form-control" name="district" value="{{$design->district}}" placeholder="Nhập quận " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sàn sử dụng, ban công (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_s" value="{{$design->area_s}}" placeholder="Nhập diện tích sàn sử dụng, ban công " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân thượng, hiên (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_sth" value="{{$design->area_sth}}" placeholder="Nhập diện tích sân thượng, hiên " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân trống, đất trống (m2) <font style="color: red;">*</font></label>
                        <input class="form-control" name="area_stsd" value="{{$design->area_stsd}}" placeholder="Nhập diện tích sân trống, đất trống " />
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        <label> Giá trị tối thiểu của một bản vẽ (VNĐ) <font style="color: red;">*</font> </label>
                        <input onChange="format_curency(this);" class="form-control" name="min_cost"  placeholder="Nhập giá trị tối thiểu của bản vẽ (trong khoảng từ 0 đến 9)" value="{{$design->min_cost}}" onkeydown="return ( event.ctrlKey || event.altKey 
=======
                        <label> Giá trị tối thiểu của một bản vẽ (VNĐ) </label>
                        <input onChange="format_curency(this);" class="form-control" name="min_cost" value="{{$design->min_cost}}"  placeholder="Nhập giá trị tối thiểu của bản vẽ (trong khoảng từ 0 đến 9)" onkeydown="return ( event.ctrlKey || event.altKey 
>>>>>>> origin/master
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
                        <label> Số tiền tạm ứng (VNĐ) <font style="color: red;">*</font></label>
=======
                        <label> Số tiền tạm ứng (VNĐ) </label>
>>>>>>> origin/master
                        <input onChange="format_curency(this);" class="form-control" name="received_cost" value="{{$design->received_cost}}" placeholder="Nhập số tiền tạm ứng (trong khoảng từ 0 đến 9) " onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Thời gian khảo sát nhà (ngày) <font style="color: red;">*</font></label>
                        <input class="form-control" name="time" value="{{$design->time}}" placeholder="Nhập thời gian khảo sát nhà" />
                    </div>
                    <button type="submit" class="btn btn-default" onclick="submitForm('design/update/{{$design->id}}')">Lưu</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button type="submit" class="btn btn-default" onclick="submitForm('design/updateprint/{{$design->id}}')" >Lưu và in </button>
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

<script type="text/javascript">
 
});
</script>
@endsection
@section('script')
<script>
     $("input[name=status]").click(function () {
    $('#show-me').css('display', ($(this).val() === '1') ? 'block':'none');

});
</script>

@endsection
@section('script')
<script>
    $("input[name=status]").click(function () {
    $('#show-me').css('display', ($(this).val() === '1') ? 'block':'none');
});
</script>
@endsection         
<!-- /#page-wrapper -->
