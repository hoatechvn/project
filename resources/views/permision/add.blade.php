@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm phân quyền truy cập
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
            <form action="permision/add" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                        <label>Mã phân quyền</label>
                        <select class="form-control" name="typePermision">
                            <option value="">Chọn mã phân quyền</option>
                            <option value="AD">AD</option>
                            <option value="TK">TK</option>
                            <option value="DV">DV</option>
                            <option value="KT">KT</option>
                            <option value="LD">LD</option>
                        </select>
                </div>
                <div class="form-group">
                    <label>Tên phân quyền</label>
                    <input class="form-control" name="namePermision" placeholder="Nhập tên quyền truy cập" />
                </div>
                
                <div class="form-group">
               	 	<label>Mô tả</label>
                	<textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Thêm</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->