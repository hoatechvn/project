@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách tham số
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
                    <th>Tên diện tích</th>
                    <th>Giá (VNĐ)</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cost as $cos)    <!--$type_contract được truyền qua từ controller tương ứng (ở phần key, value)-->
                <tr class="odd gradeX" align="center">
                    <td>{{$cos->id}}</td>
                    <td>{{$cos->name}}</td>
                    <td>{{$cos->cost}}</td>
                    <td>{{$cos->description}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="cost/update/{{$cos->id}}">Chỉnh sửa</a></td>
                    <td class="center"><a href="cost/delete/{{$cos->id}}" onclick="return confirm('Bạn có muốn xóa tham số này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
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