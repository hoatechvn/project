@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ngày
                <small>{{date('d/m/Y',strtotime($issued_date))}}</small>
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
        {!! ''; $receipts = 0 ; !!}
        {!! ''; $payment = 0  ; !!}
        @foreach($bill as $bil)
            @if($bil->receipts == 1) {!! ''; $receipts += (int) str_replace(".","",$bil->money) ; !!}
            @else
                {!! ''; $payment  += (int) str_replace(".","",$bil->money)  ; !!}
            @endif
        @endforeach
        <p>Thu: {{number_format($receipts,0,",",".")}} VNĐ</p>
        <p>Chi: {{number_format($payment,0,",",".")}} VNĐ</p>
        <p>Còn lại: {{number_format($receipts-$payment,0,",",".")}} VNĐ</p>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>ID hợp đồng</th>
                    <th>Tên hợp đồng</th>
                    <th>Khách hàng</th>
                    <th>Trạng thái</th>
                    <th>Số tiền</th>
                    <th>Ngày tạo</th>
                    <th>Ngày ký</th>
                    <th>Lưu ý</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($bill as $bil)
                <tr class="odd gradeX" align="center">
                    <td>{{$bil->id}}</td>
                    <td>{{$bil->id_contract}}</td>
                    <td>
                    @foreach($design as $des)
                        @if ($bil->id_contract == $des->id)
                            {{$des->name}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{$bil->customer}}</td>
                    @if ($bil->receipts == 1) {!! ''; $status = 'thu'; !!}
                        @else {!! ''; $status = 'chi'; !!}
                    @endif
                    <td>{{$status}}</td>
                    <td>{{$bil->money}}</td>
                    <td>{{date('d/m/Y',strtotime($bil->created_date))}}</td>
                    <td>{{date('d/m/Y',strtotime($bil->issued_date))}}</td>
                    <td>{{$bil->note}}</td>
                 
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