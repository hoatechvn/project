@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách khách hàng
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>

                    <th>HĐ Thiết Kế</th>
                    <th>HĐ Dịch Vụ</th>
                    <th>HĐ Lấy Dấu</th>

                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($customer as $cus)
                <tr class="odd gradeX" align="justify">
                    <td>{{$cus->id}}</td>
                    <td>{{$cus->name}}</td>
                    <td>{{$cus->address}}</td>
                    <td>{{$cus->phone}}</td>

                    <td class="center"><a href="customer/update/{{$cus->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="customer/update/{{$cus->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="customer/update/{{$cus->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>

                    <td class="center"><a href="customer/update/{{$cus->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="#"> </a><i class="fa fa-trash-o  fa-fw"></i></td>
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