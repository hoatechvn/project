@extends('layout.index')

@section('content')
<!-- Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tạo hợp đồng dịch vụ
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
            <form id="form1" action="service/add" method="POST">
                <div class="col-lg-4" style="padding-bottom:50px">
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
                        <input class="form-control" name="customer" value="{{$service->name}}" placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng <font style="color: red;">*</font></label>
                        <input class="form-control" name="cus_address" value="{{$service->address}}"  placeholder="Nhập địa chỉ của khách hàng" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="changeadd" name="changeadd"> 
                        <label> Địa chỉ căn nhà </label>
                        <input class="form-control add1" name="add1" id="add1" placeholder="Nhập địa chỉ căn nhà" disabled="" />
                    </div>

                    <div class="form-group">
                        <label> Số điện thoại <font style="color: red;">*</font></label>
                        <input class="form-control" name="cus_phone" placeholder="Nhập số điện thoại" value="{{$service->phone}}" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Email </label>
                        <input class="form-control" name="cus_mail" placeholder="Nhập email" type="email" value="{{$service->email}}"/>
                    </div>
                    <div class="form-group">
                        <label> Tổng tiền (VNĐ) </label>
                        <input class="form-control"  onChange="format_curency(this);"  name="tong_tien" placeholder="Nhập tổng tiền"/>
                    </div>
                    <div class="form-group">
                        <label> Tạm ứng (VNĐ) </label>
                        <input class="form-control"  onChange="format_curency(this);"  name="received_cost" placeholder="Nhập số tiền tạm ứng"/>
                    </div>

                    
                    <button type="submit" class="btn btn-default" onclick="submitForm('service/add')" >Lưu</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button type="submit" class="btn btn-default" onclick="submitForm('service/addprint')" formtarget="_blank" >Lưu và in </button>
                </div>
                                     
                <div class="col-lg-8" style="padding-bottom:50px">
                    <div id="box">
                        <div class="col-lg-3" >
                            <label>Loại hồ sơ</label>
                            <select class="form-control" name="brief[]">
                                <option value="1">Hồ sơ</option>
                                @foreach ($brief as $bri)
                                @if ($bri->id !== 1)
                                    <option value="{{$bri->id}}">{{$bri->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label>Chi tiết </label>
                            <input  class="form-control" name="name[]"  placeholder="Chi tiết">
                        </div>
                        <div class="col-lg-3" >
                            <label>Bản chính</label>
                            <input  class="form-control" name="main[]"  placeholder="Bản chính">
                        </div>
                        <div class="col-lg-3" style="padding-bottom:30px" >
                            <label>Bản photo</label>
                            <input  class="form-control" name="photo[]"  placeholder="Bản photo">
                        </div>
                    </div>  
                    <div class="col-lg-3">
                        <a id="add">Thêm</button>
                    </div>  
                </div>
            </form> 

            
       
        
        
</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
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
<!-- /#page-wrapper -->
<script type="text/javascript">
$(document).ready(function(){
    
    $('#add').click(function(){
        
        var inp = $('#box');
        
        var i = $('input').size() + 1;
        
        $('<div id="box' + i +'"><div class="col-lg-3" ><select class="form-control" name="brief[]"><option value="1">Hồ sơ</option> @foreach ($brief as $bri) @if ($bri->id !== 1) <option value="{{$bri->id}}">{{$bri->name}}</option> @endif @endforeach  </select> </div><div class="col-lg-3" ><input  class="form-control" name="name[]"  placeholder="Chi tiết"> </div><div class="col-lg-3" ><input  class="form-control" name="main[]"  placeholder="Bản chính"> </div><div class="col-lg-3" >   <input  class="form-control" name="photo[]"  placeholder="Bản photo"></div><a <i class="fa fa-trash-o  fa-fw" id="remove" ></i></a> </div>').appendTo($('#box '));
        
        i++;
        
    });
    
    
    
    $('body').on('click','#remove',function(){
        
        $(this).parent('div').remove();

        
    });

        
});
</script>
@endsection


 @section('script')
 
<script>
    $(document).ready(function(){
         $("#changeadd").change(function(){
             if($(this).is(":checked"))
             {
                 $(".add1").removeAttr('disabled');
             }
             else
             {
                 $(".add1").attr('disabled','');
             }
 
         });
     });
 </script>

 @endsection
<!-- /#page-wrapper -->