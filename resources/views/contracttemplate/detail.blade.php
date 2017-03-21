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

         <div class="row">
           

     <div class="col-sm-12" style="background-color:#f0ad4e; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;"><h3> Thông tin chung</h3></div>       
    <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">ID hợp đồng</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->id}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Tên hợp đồng</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->name}} </div>

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Ngày tạo HĐ</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->register_date}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Tên khách hàng</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->customer}} </div>

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Địa chỉ khách hàng</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->cus_address}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Số điện thoại</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->cus_phone}} </div>

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Email khách hàng</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->email}} </div>




    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Nhân viên tạo hợp đồng</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">
    @foreach($account as $acc)
    @if($design->id_account == $acc->id)
    {{$acc->name}} 
    @endif
    @endforeach
    </div>
    <div class="col-sm-12" style="background-color:#f0ad4e; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;"><h3> Thông tin chi tiết</h3></div>  

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Số nhà</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->home_add}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Đường</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->street}} </div>

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Phường</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->ward}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Quận</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->district}} </div>

     <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Diện tích sàn sử dụng, ban công (m2)</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->area_s}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Diện tích sân thượng, hiên (m2)</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->area_sth}} </div>


    <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Diện tích sân trống, đất trống (m2)</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->area_stsd}} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Giá trị tối thiểu của một bản vẽ (VNĐ)</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{number_format($design->min_cost,0,",",".")}} </div>

    <div class="col-sm-4" style="background-color:#fff; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Số tiền tạm ứng (VNĐ)</div>
    <div class="col-sm-8" style="background-color:#fff;padding: 10px 0 10px 20px;font-size: 14px;"> {{number_format($design->received_cost,0,",",".") }} </div>

    <div class="col-sm-4" style="background-color:#F8F8F8; font-weight:bold;padding: 10px 0 10px 20px;font-size: 14px;">Thời gian khảo sát nhà (ngày)</div>
    <div class="col-sm-8" style="background-color:#F8F8F8;padding: 10px 0 10px 20px;font-size: 14px;">{{$design->name}} </div>

   </div>

		
        <!-- /.row -->






    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->