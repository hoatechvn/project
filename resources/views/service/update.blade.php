@extends('layout.index')

@section('content')
<!-- Page Content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hợp đồng 
                <small>{{$service->name}}</small>
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
            
            
            <form action="service/update/{{$service->id}}" id="form1" method="POST">
                <div class="col-lg-4" style="padding-bottom:50px">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                 <h2> Thông tin chung</h2><br>
                 <div class="form-group">
                        <label>Nhân viên thụ hưởng <font style="color: red;">*</font></label>
                        <select class="form-control" name="id_account">
                            @foreach ($account as $acc)
                            <option 
                            @if($service->id_account == $acc->id)
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
                            @if($service->id_typecontract == $con->id)
                                {{'selected'}}
                            @endif
                            value="{{$con->id}}">{{$con->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng ký </label>
                        <input class="form-control" name="register_date" value="{{$service->register_date}}" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng </label>
                        <input class="form-control" name="customer" value="{{$service->customer}}" placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng </label>
                        <input class="form-control" name="cus_address" value="{{$service->cus_address}}" placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại </label>
                       <input onChange="format_curency(this);" class="form-control" name="cus_phone" value="{{$service->cus_phone}}"
                       placeholder="Nhập số điện thoại" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
                    <div class="form-group">
                        <label> Tổng tiền đầu tiên </label>
                        <input class="form-control" name="sum_cost" value="{{$service->sum_cost}}" readonly="" />
                    </div>

                     <div class="form-group">
                        <input type="checkbox" id="changeend" name="changeend"> 
                        <label> Tổng tiền cuối cùng </label>
                        <input class="form-control chang_fi" onChange="format_curency(this);" name="chang_fi" id="chang_fi" placeholder="Tổng tiền cuối cùng" disabled="" />

                    </div>
                    <div class="form-group">
                        <label> Trạng thái hoàn thành</label>
                        <br>
                        <label class="radio-inline"> 
                            <input name="status" value="0"
                            @if($service->status ==0)
                                {{"checked"}}
                            @endif
                            type="radio"> Chưa hoàn thành
                        </label>
                        <label class="radio-inline"> 
                        <input id="status_com" name="status"  value="1"
                            @if($service->status == 1)
                                {{"checked"}}
                            @endif
                            type="radio" > Hoàn thành
                        <li id="show-me" style="display:none"> <label> Ngày hoàn thành:&nbsp;  </label><input  style="border: none;" name="complete_date" value="{{date('Y-m-d')}}" readonly="" /></li>
                       </label>
                    </div>
                    <div class="form-group">
                         <label> Ghi chú</label>
                         <textarea class="form-control" rows="3" name="note" >{{$service->note}}</textarea>
                    </div>  
                     <button type="submit" class="btn btn-default" onclick="submitForm('service/update/{{$service->id}}')">Lưu</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button type="submit" class="btn btn-default" onclick="submitForm('service/updateprint/{{$service->id}}')" >Lưu và in </button>
        
                </div>
                <div class="col-lg-8" style="padding-top:80px">
                    <div id="box">
                    @foreach($detailbrief as $brief)
                        @if($brief->id_service == $service->id)
                        <div class="col-lg-6" >
                            <label>Loại hồ sơ</label>
                            <select class="form-control" name="brief[]" readonly="">
                                <option value="{{$brief->id}}">{{$brief->name}}</option>	
                            </select>
                        </div>
                        <div class="col-lg-2" >
                            <label>Bản chính</label>
                            <input  class="form-control" name="main[]" value="{{$brief->main}}" placeholder="Bản chính" readonly="">
                        </div>
                        <div class="col-lg-2" style="padding-bottom:30px" >
                            <label>Bản photo</label>
                            <input  class="form-control" name="photo[]" value="{{$brief->photo}}"  placeholder="Bản photo" readonly="">
                        </div>
                        @endif
                    @endforeach
                    </div>  
                    <div class="col-lg-3">
                        <a id="add">Thêm</button>
                    </div>  
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
$(document).ready(function(){
    
    $('#add').click(function(){
        
        var inp = $('#box');
        
        var i = $('input').size() + 1;
        
        $('<div id="box' + i +'"><div class="col-lg-3" ><select class="form-control" name="brief[]"><option value="1">Hồ sơ</option> @foreach ($brie as $bri) @if ($bri->id !== 1)<option value="{{$bri->id}}">{{$bri->name}}</option> @endif @endforeach</select> </div><div class="col-lg-3" ><input  class="form-control" name="name[]"  placeholder="Chi tiết"> </div><div class="col-lg-3" ><input  class="form-control" name="main[]"  placeholder="Bản chính"> </div><div class="col-lg-3" >   <input  class="form-control" name="photo[]"  placeholder="Bản photo"></div> </div>').appendTo($('#box '));
        
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
         $("#changeend").change(function(){
             if($(this).is(":checked"))
             {
                 $(".chang_fi").removeAttr('disabled');
             }
             else
             {
                 $(".chang_fi").attr('disabled','');
             }
 
         });
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
