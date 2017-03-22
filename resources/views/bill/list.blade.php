@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sổ quỹ
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
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
                    <th>Chỉnh sửa</th> 
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
                    <td>{{$bil->created_date}}</td>
                    <td>{{$bil->issued_date}}</td>
                    <td>{{$bil->note}}</td>


                    <td class="center"><a href="#"><i class="fa fa-pencil fa-fw"></i> </a></td>
                 
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