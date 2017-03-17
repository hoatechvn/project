@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm tài khoản
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
                <form action="account/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Loại phân quyền</label>
                        <select class="form-control" name="permision">
                        	<option value="0">Chọn loại phân quyền</option>
                        	@foreach ($permision as $per)
                            <option value="{{$per->id}}">{{$per->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input class="form-control" name="username" placeholder="Nhập tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label> Mật khẩu</label>
                        <input class="form-control" name="password" type="password" id="password" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label> Xác nhận mật khẩu</label>
                        <input class="form-control" name="confirm_password" id="confirm_password" type="password" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Tên nhân viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên nhân viên" />
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <input class="form-control" name="position" placeholder="Nhập chức vụ" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type ="email" placeholder="Nhập email" />
                    </div>
                 
                    
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
<!-- /#page-wrapper -->
