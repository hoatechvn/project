@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tài khoản
                <small>{{$account->username}}</small>
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
       <form action="account/update/{{$account->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Loại phân quyền</label>
                        <select class="form-control" name="permision">
                            @foreach ($permision as $per)
                            <option 
                            @if($account->id_permision == $per->id)
                                {{'selected'}}
                            @endif
                            value="{{$per->id}}">{{$per->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên tài khoản</label>
                        <input class="form-control" name="username" placeholder="Nhập tên tài khoản" value="{{$account->username}}" />
                    </div>
                    <div class="form-group">
                        <label> Mật khẩu</label>
                        <input class="form-control" name="password" type="password" id="password" placeholder="Nhập mật khẩu" value="{{$account->password}}" />
                    </div>
                    <div class="form-group">
                        <label> Xác nhận mật khẩu</label>
                        <input class="form-control" name="confirm_password" id="confirm_password" type="password" placeholder="Nhập lại mật khẩu" value="{{$account->password}}" />
                    </div>
                    <div class="form-group">
                        <label>Tên nhân viên</label>
                        <input class="form-control" name="name" placeholder="Nhập tên nhân viên" value="{{$account->name}}"/>
                    </div>
                    <div class="form-group">
                        <label>Chức vụ</label>
                        <input class="form-control" name="position" placeholder="Nhập chức vụ" value="{{$account->position}}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="email" type ="email" placeholder="Nhập email" value="{{$account->email}}" />
                    </div>
                 
                    
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->