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
                        <label>Ngày đăng ký </label>
                        <input class="form-control" name="register_date" value="{{$design->register_date}}" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng </label>
                        <input class="form-control" name="customer" value="{{$design->customer}}" placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng </label>
                        <input class="form-control" name="cus_address" value="{{$design->cus_address}}" placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
<<<<<<< HEAD
=======
                        <label> Tổng tiền đầu tiên </label>
                        <input class="form-control" name="sum_cost" value="{{$design->sum_cost}}" readonly="" />
                    </div>

                     <div class="form-group">
                        <input type="checkbox" id="changeend" name="changeend"> 
                        <label> Tổng tiền cuối cùng </label>
                        <input class="form-control chang_fi" name="chang_fi" id="chang_fi" placeholder="Tổng tiền cuối cùng" disabled="" />
                    </div>

                    <div class="form-group">
>>>>>>> origin/master
                        <label> Số điện thoại </label>
                       <input onChange="format_curency(this);" class="form-control" name="cus_phone" value="{{$design->cus_phone}}"
                       placeholder="Nhập số điện thoại" onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                    </div>
<<<<<<< HEAD
                    <div class="form-group">
                        <label> Tổng tiền đầu tiên </label>
                        <input class="form-control" name="sum_cost" value="{{$design->sum_cost}}" readonly="" />
                    </div>

                     <div class="form-group">
                        <input type="checkbox" id="changeend" name="changeend"> 
                        <label> Tổng tiền cuối cùng </label>
                        @if(preg_replace('/[^a-z]+/i',"",$design->id) == 'HTND')
                            <input class="form-control chang_fi"  name="area_s" id="chang_fi" placeholder="Diện tích sàn sử dụng, ban công" disabled="" /></br>
                            <input class="form-control chang_fi"  name="area_sth" id="chang_fi" placeholder="Diện tích sân thượng, hiên, sân mái che" disabled="" /></br>
                            <input class="form-control chang_fi"  name="area_stsd" id="chang_fi" placeholder="Diện tích sân trống, đất trống" disabled="" />
                        @else
                        <input class="form-control chang_fi" onChange="format_curency(this);" name="chang_fi" id="chang_fi" placeholder="Tổng tiền cuối cùng" disabled="" />
                        @endif

                    </div>
=======
                   
>>>>>>> origin/master
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
                        <input id="status_com" name="status"  value="1"
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
