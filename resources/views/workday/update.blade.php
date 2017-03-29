@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa công việc
                <small>{{$workday->type}}</small>
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
            <form action="workday/update/{{$workday->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Loại hợp đồng <font style="color: red;">*</font></label>
                    <select class="form-control" name="id_typecontract">
                        @foreach ($typecontract as $con)
                        <option 
                        @if($workday->id_typecontract == $con->id)
                            {{'selected'}}
                        @endif
                        value="{{$con->id}}">{{$con->type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nhập mã loại công việc <font style="color: red;">*</font></label>
                    <input class="form-control" name="type" placeholder="Nhập mã loại công việc" value="{{$workday->type}}" />
                </div>
                <div class="form-group">
                    <label>Tên công việc <font style="color: red;">*</font></label>
                    <input class="form-control" name="name" placeholder="Nhập tên công việc" value="{{$workday->name}}" />
                </div>
                <div class="form-group">
                <label>Thời gian<font style="color: red;">*</font></label>
                   <input class="form-control" name="time" placeholder="Nhập thời gian thực hiện" value="{{$workday->time}}" />
                </div>
                <div class="form-group">
               	 	<label>Mô tả</label>
                	<textarea class="form-control" rows="3" name="description">{{$workday->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<script>
function format_curency(a) {
    a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
</script>
@endsection
<!-- /#page-wrapper -->