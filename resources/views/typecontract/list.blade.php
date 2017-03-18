@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách loại hợp đồng
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
                    <th>Loại hợp đồng</th>
                    <th>Mã loại</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($type_contract as $cont)    <!--$type_contract được truyền qua từ controller tương ứng (ở phần key, value)-->
                <tr class="odd gradeX" align="center">
                    <td>{{$cont->id}}</td>
                    <td>{{$cont->type}}</td>
                    <td>{{$cont->idtype}}</td>
                    <td>{{$cont->description}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="contract/update/{{$cont->id}}">Chỉnh sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="contract/delete/{{$cont->id}}"> Xóa</a></td>
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