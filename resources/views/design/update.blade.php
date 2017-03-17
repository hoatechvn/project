@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Loại hợp đồng
                <small>{{$type_contract->type}}</small>
                </h1>
        </div>
            <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:50px">
        @if(count($errors) > 0)
        	<div class="alert alert-danger">
        		@foreach($errors->all() as $err)
        			{{$err}}<br>
        		@endforeach
        	</div>
        @endif
       
            <form action="contract/update/{{$type_contract->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Loại Hợp Đồng</label>
                    <input class="form-control" name="typecontract" placeholder="Nhập tên quyền truy cập" value="{{$type_contract->type}}" />
                </div>
               <div class="form-group">
                    <label>Mã loại Hợp Đồng</label>
                    <input class="form-control" name="idtypecontract" placeholder="Nhập tên quyền truy cập" value="{{$type_contract->idtype}}" />
                </div>
                <div class="form-group">
               	 	<label>Mô tả</label>
                	<textarea class="form-control" rows="3" name="description">{{$type_contract->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Cập nhật</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->