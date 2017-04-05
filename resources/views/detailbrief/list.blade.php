@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách hồ sơ chi tiết
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
                    <th>Số lượng bản chính</th>
                    <th>Số lượng bản photo</th>
                    <th>Dịch vụ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailbrief as $det)  
                <tr class="odd gradeX" align="center">
                    <td>{{$det->id}}</td>
                    <td>{{$det->name}}</td>
                    <td>{{$det->main}}</td>
                    <td>{{$det->photo}}</td>
                    <td>{{$det->id_service}}</td>
                    
                    <td class="center"><a href="detailbrief/delete/{{$det->id}}" onclick="return confirm('Bạn có muốn xóa tham số này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
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