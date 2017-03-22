@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phiếu thu cho hợp đồng
                <small>{{$design->name}}</small>
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
            <form action="bill/receipts/{{$design->id}}" method="POST">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              
                <div class="form-group">
                    <label>Họ và tên người nộp tiền</label>
                    <input class="form-control" name="customer" value="{{$design->customer}}" placeholder="Nhập họ và tên người nộp tiền" />
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" name="cus_address" value="{{$design->cus_address}}" placeholder="Nhập địa chỉ" />
                </div>
                <div class="form-group">
               	 	<label>Lý do nộp</label>
                	<textarea class="form-control" rows="3" name="reason"></textarea>
                </div>
                <div class="form-group">
                    <label>Số tiền(VNĐ)</label>
                    <input onChange="format_curency(this);" class="form-control" name="money"  placeholder="Nhập số tiền" />
                </div>
                <div class="form-group">
                    <label>Viết bằng chữ</label>
                    <textarea class="form-control" rows="3" name="mon_character"></textarea>
                </div>
                <div class="form-group">
                    <label>Kèm theo</label>
                    <input class="form-control" name="attach"  placeholder="Nhập số chứng từ kế toán kèm theo" />
                </div>
                <div class="form-group">
                    <label>Ngày tạo</label>
                    <input class="form-control" name="created_date"  type="date" />
                </div>
                <div class="form-group">
                    <label>Ngày ký</label>
                    <input class="form-control" name="issued_date"  type="date" />
                </div>
                <div class="form-group">
                    <label>Nợ</label>
                    <input class="form-control" name="owing"  placeholder="Nhập số tiền còn nợ" />
                </div>
                <div class="form-group">
                    <label>Có</label>
                    <input class="form-control" name="have"  placeholder="Nhập số tiền có" />
                </div>
                <button type="submit" class="btn btn-default">Tạo</button>
                <button type="reset" class="btn btn-default">Làm mới</button>
            <form>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<script>
function format_curency(a) {
    a.value = a.value.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
}
</script>
@endsection
<!-- /#page-wrapper -->