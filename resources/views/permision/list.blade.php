@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách phân quyền truy cập
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
                    <th>Tên phân quyền</th>
                    <th>Mô tả</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($permision as $per)
                <tr class="odd gradeX" align="center">
                    <td>{{$per->id}}</td>
                    <td>{{$per->name}}</td>
                    <td>{{$per->description}}</td>
                    <td class="center"><a href="permision/update/{{$per->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="permision/delete/{{$per->id}}" onclick="return confirm('Bạn có muốn xóa loại phân quyền này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->