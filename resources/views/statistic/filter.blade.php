@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hoa hồng cho nhân viên
                <small>
                    @foreach($account as $acc)
                        @if ($acc->id == $idaccount)
                            {{$acc->name}}
                        @endif
                    @endforeach
                </small>
                <small>Tháng {{date('m/Y',strtotime($issued_month))}}</small>
                </h1>
        </div>         
	</div> 
	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="justify">
                <th>Mã HĐ</th>
                <th>Tên hợp đồng</th>
                <th>Ngày ký</th>
                <th>Ngày hoàn thành</th>
                <th>Tổng tiền</th> 
                <th>Lưu ý</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($design as $des)
            <tr class="odd gradeX" align="justify">
                <td>{{$des->id}}</td>
                <td>{{$des->name}}</td>
                <td>{{date('d/m/Y',strtotime($des->register_date))}}</td>   
                <td>{{date('d/m/Y',strtotime($des->complete_date))}}</td>              
                <td>???</td>
                <td>{{$des->note}}</td>  
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