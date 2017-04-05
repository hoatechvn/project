@extends('layout.index')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm hồ sơ chi tiết
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

     
    
    <div class="row">
        <div class="col-lg-3">
                <button id="add" class="form-control">Thêm</button>
        </div>
    </div>
    <div id="box">
        <form action="detailbrief/add" method="POST">
        <button type="submit" class="btn btn-default">Lưu</button>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
              
                <div class="col-lg-3" >
                 <label>Loại hồ sơ</label>
                    <select class="form-control" name="brief[]">
                        <option value="1">Chọn loại hồ sơ</option>
                        @foreach ($brief as $bri)
                        @if ($bri->id !== 1)
                            <option value="{{$bri->id}}">{{$bri->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-3">
                  <label>Chi tiết hồ sơ</label>
                <input  class="form-control" name="name[]"  placeholder="Nhập chi tiết hồ sơ">
                </div>
                 <div class="col-lg-3" >
                 <label>Bản chính</label>
                <input  class="form-control" name="main[]"  placeholder="Nhập số lượng bản chính">
                </div>
                <div class="col-lg-3" style="padding-bottom:30px" >
                 <label>Bản photo</label>
                <input  class="form-control" name="photo[]"  placeholder="Nhập số lượng bản photo">
                </div>
            </div>    

            
           
        </form>
        
</div>
       
 
    <!-- /.container-fluid -->
</div>
</div>
</div>
 

<script type="text/javascript">
$(document).ready(function(){
    
    $('#add').click(function(){
        
        var inp = $('#box');
        
        var i = $('input').size() + 1;
        
        $('<div id="box' + i +'"><div class="col-lg-3" ><select class="form-control" name="brief[]"><option value="1">Chọn loại hồ sơ</option> @foreach ($brief as $bri) @if ($bri->id !== 1) <option value="{{$bri->id}}">{{$bri->name}}</option> @endif @endforeach  </select> </div><div class="col-lg-3" ><input  class="form-control" name="name[]"  placeholder="Nhập chi tiết hồ sơ"> </div><div class="col-lg-3" ><input  class="form-control" name="main[]"  placeholder="Nhập số lượng bản chính"> </div><div class="col-lg-3" >   <input  class="form-control" name="photo[]"  placeholder="Nhập số lượng bản photo"></div><a <i class="fa fa-trash-o  fa-fw" id="remove" ></i></a> </div>').appendTo($('#box form'));
        
        i++;
        
    });
    
    
    
    $('body').on('click','#remove',function(){
        
        $(this).parent('div').remove();

        
    });

        
});
</script>
@endsection

<!-- /#page-wrapper -->