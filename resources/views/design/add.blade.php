@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tạo hợp đồng thiết kế
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
                <form action="design/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <label>Nhân viên thụ hưởng</label>
                        <select class="form-control" name="id_account">
                        	<option>Chọn nhân viên thụ hưởng</option>
                            @foreach ($account as $acc)
                            <option value="{{$acc->id}}">{{$acc->username}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại hợp đồng</label>
                        <select class="form-control" name="id_typecontract">
                            <option value="0">Chọn loại hợp đồng </option>
                            @foreach ($typecontract as $con)
                            <option value="{{$con->id}}">{{$con->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng ký</label>
                        <input class="form-control" name="register_date" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng</label>
                        <input class="form-control" name="customer"  placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng</label>
                        <input class="form-control" name="cus_address"  placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại</label>
                        <input class="form-control" name="cus_phone" placeholder="Nhập số điện thoại" />
                    </div>
                    <h2> Thông tin căn nhà</h2><br>
                    <div class="form-group">
                        <label>Số nhà </label>
                        <input class="form-control" name="home_add" placeholder="Nhập số nhà " />
                    </div>
                    <div class="form-group">
                        <label>Đường </label>
                        <input class="form-control" name="street" placeholder="Nhập đường " />
                    </div>
                    <div class="form-group">
                        <label> Phường</label>
                        <input class="form-control" name="ward" placeholder="Nhập phường " />
                    </div>
                    <div class="form-group">
                        <label> Quận</label>
                        <input class="form-control" name="district" placeholder="Nhập quận " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sàn sử dụng, ban công (m2)</label>
                        <input class="form-control" name="area_s" placeholder="Nhập diện tích sàn sử dụng, ban công " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân thượng, hiên (m2)</label>
                        <input class="form-control" name="area_sth" placeholder="Nhập diện tích sân thượng, hiên " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân trống, đất trống (m2)</label>
                        <input class="form-control" name="area_stsd" placeholder="Nhập diện tích sân trống, đất trống " />
                    </div>
                    <div class="form-group">
                        <label> Giá trị tối thiểu của một bản vẽ (VNĐ) </label>
                        <input class="form-control" name="min_cost" placeholder="Nhập giá trị tối thiểu của bản vẽ " />
                    </div>
                    <div class="form-group">
                        <label> Số tiền tạm ứng (VNĐ) </label>
                        <input class="form-control" name="received_cost" placeholder="Nhập số tiền tạm ứng " />
                    </div>
                    <div class="form-group">
                        <label> Thời gian khảo sát nhà (ngày) </label>
                        <input class="form-control" name="time" placeholder="Nhập thời gian khảo sát nhà" />
                    </div>
                    <button type="submit" class="btn btn-default">Tạo</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button class="btn btn-default"> In hợp đồng</button>

                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
<!-- /#page-wrapper -->
