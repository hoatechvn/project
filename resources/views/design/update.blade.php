@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hợp đồng 
                <small>{{$design->name}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-6" style="padding-bottom:50px">
            @if(count($errors) > 0)
				<div class="alert alert-danger">
				@foreach($errors->all() as $err)
					{{$err}}<br>
				@endforeach
				</div>
			@endif
                <form action="design/update/{{$design->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h2> Thông tin chung</h2><br>
                    <div class="form-group">
                        <label>Nhân viên thụ hưởng</label>
                        <select class="form-control" name="id_account">
                        	@foreach ($account as $acc)
                            <option 
                            @if($design->id_account == $acc->id)
                                {{'selected'}}
                            @endif
                            value="{{$acc->id}}">{{$acc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại hợp đồng</label>
                        <select class="form-control" name="id_typecontract">
                            @foreach ($typecontract as $con)
                            <option 
                            @if($design->id_typecontract == $con->id)
                                {{'selected'}}
                            @endif
                            value="{{$con->id}}">{{$con->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ngày đăng ký</label>
                        <input class="form-control" name="register_date" value="{{$design->register_date}}" type="date"/>
                    </div>
                    <div class="form-group">
                        <label> Họ và tên khách hàng</label>
                        <input class="form-control" name="customer" value="{{$design->customer}}" placeholder="Nhập họ và tên khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Địa chỉ khách hàng</label>
                        <input class="form-control" name="cus_address" value="{{$design->cus_address}}" placeholder="Nhập địa chỉ của khách hàng" />
                    </div>
                    <div class="form-group">
                        <label> Số điện thoại</label>
                        <input class="form-control" name="cus_phone" value="{{$design->cus_phone}}" placeholder="Nhập số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input class="form-control" name="cus_email" value="{{$design->email}}" type="email" placeholder="Nhập email" />
                    </div>
                </div>
                <div class="col-lg-6" style="padding-bottom:50px"> 
                    <h2> Thông tin chi tiết</h2><br>
                    <div class="form-group">
                        <label>Số nhà </label>
                        <input class="form-control" name="home_add" value="{{$design->home_add}}" placeholder="Nhập số nhà " />
                    </div>
                    <div class="form-group">
                        <label>Đường </label>
                        <input class="form-control" name="street" value="{{$design->street}}" placeholder="Nhập đường " />
                    </div>
                    <div class="form-group">
                        <label> Phường</label>
                        <input class="form-control" name="ward" value="{{$design->ward}}" placeholder="Nhập phường " />
                    </div>
                    <div class="form-group">
                        <label> Quận</label>
                        <input class="form-control" name="district" value="{{$design->district}}" placeholder="Nhập quận " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sàn sử dụng, ban công (m2)</label>
                        <input class="form-control" name="area_s" value="{{$design->area_s}}" placeholder="Nhập diện tích sàn sử dụng, ban công " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân thượng, hiên (m2)</label>
                        <input class="form-control" name="area_sth" value="{{$design->area_sth}}" placeholder="Nhập diện tích sân thượng, hiên " />
                    </div>
                    <div class="form-group">
                        <label> Diện tích sân trống, đất trống (m2)</label>
                        <input class="form-control" name="area_stsd" value="{{$design->area_stsd}}" placeholder="Nhập diện tích sân trống, đất trống " />
                    </div>
                    <div class="form-group">
                        <label> Giá trị tối thiểu của một bản vẽ (VNĐ) </label>
                        <input class="form-control" name="min_cost" value="{{$design->min_cost}}" placeholder="Nhập giá trị tối thiểu của bản vẽ " />
                    </div>
                    <div class="form-group">
                        <label> Số tiền tạm ứng (VNĐ) </label>
                        <input class="form-control" name="received_cost" value="{{$design->received_cost}}" placeholder="Nhập số tiền tạm ứng " />
                    </div>
                    <div class="form-group">
                        <label> Thời gian khảo sát nhà (ngày) </label>
                        <input class="form-control" name="time" value="{{$design->time}}" placeholder="Nhập thời gian khảo sát nhà" />
                    </div>
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                    <button type="reset" class="btn btn-default"> Làm mới</button>
                    <button class="btn btn-default"> In hợp đồng</button>
                </div>

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
