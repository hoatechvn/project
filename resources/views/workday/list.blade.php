@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách công việc
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
                    <th>Tên loại hợp đồng</th>
                    <th>Tên công việc</th>
                    <th>Thời gian thực hiện (ngày)</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($workday as $work)  
                <tr class="odd gradeX" align="center">
                    <td>{{$work->id}}</td>
                    <td>
                        @foreach($typecontract as $type)
                            @if ($type->id == $work->id_typecontract)
                                {{$type->type}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{$work->name}}</td>
                    <td>{{$work->time}}</td>
                    <td>{{$work->description}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="workday/update/{{$work->id}}">Chỉnh sửa</a></td>
                    <td class="center"><a href="workday/delete/{{$work->id}}" onclick="return confirm('Bạn có muốn xóa công việc này không?');"><i class="fa fa-trash-o  fa-fw"></i></a>
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