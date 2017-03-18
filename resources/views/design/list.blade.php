@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách hợp đồng thiết kế
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover"  id="dataTables-example">
            <thead>
                <tr align="center">
                   <th>ID</th>
                    <th>Tên hợp đồng</th>
                    <th>Ngày đăng ký</th>
                    <th>Tên khách hàng</th>
                    
                    <th>Chi tiết</th>
                    <th>Phiếu thu</th>
                    <th>Phiếu chi</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($design as $des)   
                <tr class="odd gradeX" align="center">
                    <td>{{$des->id}}</td>
                    <td>{{$des->name}}</td>
                    <td>{{$des->register_date}}</td>
                    <td>{{$des->customer}}</td>
                    
                    <td class="center"><a href="#"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="#"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="#"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="design/update/{{$des->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="design/delete/{{$des->id}}"><i class="fa fa-trash-o  fa-fw"></i></a></td>
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