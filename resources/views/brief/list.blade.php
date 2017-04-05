@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách hồ sơ
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
                    <th>Tên hồ sơ</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($brief as $bri)  
                <tr class="odd gradeX" align="center">
                    <td>{{$bri->id}}</td>
                    <td>{{$bri->name}}</td>
                    <td>{{$bri->description}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="brief/update/{{$bri->id}}">Chỉnh sửa</a></td>
                    <td class="center"><a href="brief/delete/{{$bri->id}}" onclick="return confirm('Bạn có muốn xóa tham số này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
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