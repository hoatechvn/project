@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chỉnh sửa lưu ý cho phiếu thu / chi
                <small>Mã: {{$bill->id}}</small>
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
            <form action="bill/update/{{$bill->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            
                <div class="form-group">
                    <label>Lưu ý</label>
                    <textarea class="form-control" rows="3" name="note">{{$bill->note}}</textarea>
                </div>
                
                <button type="submit" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->