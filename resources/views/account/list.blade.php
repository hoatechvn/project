@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách tài khoản
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Email</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($account as $acc)
                <tr class="odd gradeX" align="center">
                    <td>{{$acc->id}}</td>
                    <td>{{$acc->username}}</td>
                    <td>{{$acc->password}}</td>
                    <td>{{$acc->name}}</td>
                    <td>{{$acc->position}}</td>
                    <td>{{$acc->email}}</td>
                    <td class="center"></i> <a href="account/update/{{$acc->id}}"><i class="fa fa-pencil fa-fw"></a></td>
                    <td class="center"><a href="account/delete/{{$acc->id}}" onclick="return confirm('Bạn có muốn xóa tài khoản này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>



@endsection 
