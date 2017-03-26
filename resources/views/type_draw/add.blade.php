@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm loại bản vẽ
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
            <form action="draw/add" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên loại bản vẽ</label>
                    <input class="form-control" name="typedraw" placeholder="Nhập tên loại bản vẽ" />
                </div>
                <div class="form-group">
                <label>Mã loại bản vẽ</label>
                   <input class="form-control" name="idtypedraw" placeholder="Nhập mã loại bản vẽ" />
                </div>
                <div class="form-group">
               	 	<label>Mô tả</label>
                	<textarea class="form-control" rows="3" name="description"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Thêm</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->