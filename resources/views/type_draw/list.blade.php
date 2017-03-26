@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách loại bản vẽ
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
                    <th>Loại bản vẽ</th>
                    <th>Mã loại</th>
                    <th>Mô tả</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($type_draw as $cont)    <!--$type_contract được truyền qua từ controller tương ứng (ở phần key, value)-->
                <tr class="odd gradeX" align="center">
                    <td>{{$cont->id}}</td>
                    <td>{{$cont->type}}</td>
                    <td>{{$cont->idtype}}</td>
                    <td>{{$cont->description}}</td>
                    <td class="center"><a href="draw/update/{{$cont->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="draw/delete/{{$cont->id}}" onclick="return confirm('Bạn có muốn xóa loại hợp đồng này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
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