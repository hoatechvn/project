@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khách hàng
                <small>{{$customer->name}}</small>
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
       
            <form action="customer/update/{{$customer->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input class="form-control" name="name" placeholder="Nhập tên khách hàng" value="{{$customer->name}}" />
                </div>
               
                <div class="form-group">
               	 	<label>Địa chỉ</label>
                	<textarea class="form-control" rows="3" name="address" placeholder="Nhập địa chỉ khách hàng">{{$customer->address}}</textarea>
                </div>
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input class="form-control" name="phone" placeholder="Nhập số điện thoại" value="{{$customer->phone}}" />
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