@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm loại bản vẽ
                </h1>
        </div>
            <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:50px">
        @if(count($errors) > 0)
        	<div class="alert alert-danger">
        		@foreach($errors->all() as $err)
        			{{$err}}<br>
        		@endforeach
        	</div>
        @endif
            <form action="draw/add" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên loại bản vẽ <font style="color: red;">*</font></label>
                    <input class="form-control" name="typedraw" placeholder="Nhập tên loại bản vẽ" />
                </div>
                <div class="form-group">
                <label>Mã loại bản vẽ <font style="color: red;">*</font></label>
                   <input class="form-control" name="idtypedraw" placeholder="Nhập mã loại bản vẽ" />
                </div>
                <div class="form-group">
                        <label> Giá trị (VNĐ) <font style="color: red;">*</font></label>
                        <input onChange="format_curency(this);" class="form-control" name="cost" placeholder="Nhập số tiền lấy dấu cho bản vẽ (trong khoảng từ 0 đến 9) " onkeydown="return ( event.ctrlKey || event.altKey 
                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                    || (95<event.keyCode && event.keyCode<106)
                    || (event.keyCode==8) || (event.keyCode==9) 
                    || (event.keyCode>34 && event.keyCode<40) 
                    || (event.keyCode==46) )" />
                </div>
                <div class="form-group">
               	 	<label>Mô tả</label>
                	<textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
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
@endsection
<!-- /#page-wrapper -->