@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết hợp đồng
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr align="center">
                   <th>ID</th>
                    <th>Tên</th>
                    <th>Ngày đăng ký</th>
                    <th>Tên khách hàng</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($design as $des)    <!--$type_contract được truyền qua từ controller tương ứng (ở phần key, value)-->
                <tr class="odd gradeX" align="center">
                    <td>{{$des->id}}</td>
                    <td>{{$des->name}}</td>
                    <td>{{$des->register_date}}</td>
                    <td>{{$des->customer}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="design/update/{{$des->id}}">Chỉnh sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="design/delete/{{$des->id}}"> Xóa</a></td>
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