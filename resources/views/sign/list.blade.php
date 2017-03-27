@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách lấy dấu
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover"  id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Chủ nhà</th>
                    <th>Địa chỉ</th>
                    <th>Người lấy dấu</th>
                    <th>Ngày lấy dấu</th>
                    <th>Chi phí (VNĐ)</th>
                    <th>Tạm ứng (VNĐ)</th>
                    <th>Còn nợ (VNĐ)</th>
                    <th>Phiếu thu</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sign as $sig)
                    @foreach($typedraw as $draw)
                        @if ($draw->id == $sig->id_typedraw)
                           {!! ''; $cost= (int) str_replace(".","",$draw->cost)  ; !!}
                        @endif
                    @endforeach
                @if(($cost - str_replace(".","",$sig->received_cost))>0)       
                <tr style="background-color:red"  align="center">
                    <td>{{$sig->id}}</td>
                    <td>{{$sig->owed_home}}</td>
                    <td>{{$sig->address}}</td>
                    <td>{{$sig->customer}}</td>
                    <td>{{date('d/m/Y',strtotime($sig->created_date))}}</td>
                    <td>{{number_format($cost,0,",",".")}}</td>
                    <td>{{$sig->received_cost}}</td>
                    <td>{{number_format( $cost - str_replace(".","",$sig->received_cost),0,",",".")}}</td>
                    
                    <td class="center"><a href="bill/signreceipts/{{$sig->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="sign/update/{{$sig->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="sign/delete/{{$sig->id}}" onclick="return confirm('Bạn có muốn xóa thông tin lấy dấu này không?');"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                </tr>
                @else
                <tr class="odd gradeX" align="center">
                    <td>{{$sig->id}}</td>
                    <td>{{$sig->owed_home}}</td>
                    <td>{{$sig->address}}</td>
                    <td>{{$sig->customer}}</td>
                    <td>{{date('d/m/Y',strtotime($sig->created_date))}}</td>
                    <td>{{number_format($cost,0,",",".")}}</td>
                    <td>{{$sig->received_cost}}</td>
                    <td>{{number_format( $cost - str_replace(".","",$sig->received_cost),0,",",".")}}</td>
                    
                    <td class="center"><a href="bill/signreceipts/{{$sig->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="sign/update/{{$sig->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
                    <td class="center"><a href="sign/delete/{{$sig->id}}" onclick="return confirm('Bạn có muốn xóa thông tin lấy dấu này không?');"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->