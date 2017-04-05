@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách hợp đồng dịch vụ
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
                    <th>Tên hợp đồng</th>
                    <th>Ngày đăng ký</th>
                    <th>Ngày trả hợp đồng</th>
                    <th>Ngày hoàn thành</th>
                    <th>Tên khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                    <th>Phiếu thu</th>
                    <th>Phiếu chi</th>
                    <th>Ghi chú</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($service as $ser)
                @if($ser->status==1)                
                <tr style="background-color: #5cb85c;" align="center">
                
                    <td>{{$ser->id}}</td>
                    <td>{{$ser->name}}</td>
                    <td>{{date('d/m/Y',strtotime($ser->register_date))}}</td>
                    <td>{{date('d/m/Y',strtotime($ser->return_date))}}</td>
                    <td>{{date('d/m/Y',strtotime($ser->complete_date))}}</td>
                    
                    <td>{{$ser->customer}}</td>
                    <td>{{$ser->sum_cost_fi}}</td>
                    
                    <td class="center"><a href="service/detail/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="bill/receipts/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="bill/paymentservice/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td>{{$ser->note}}</td>
                    <td class="center"><a href="service/update/{{$ser->id}}"><i class="fa fa-pencil fa-fw" style="display:none"></i> </a></td>
                    <td class="center"><a href="service/delete/{{$ser->id}}" onclick="return confirm('Bạn có muốn xóa hợp đồng này không?');"><i class="fa fa-trash-o  fa-fw"></i></a></td>
                </tr>
                @else
                    <tr class="odd gradeX" align="center">
                
                    <td>{{$ser->id}}</td>
                    <td>{{$ser->name}}</td>
                    <td>{{date('d/m/Y',strtotime($ser->register_date))}}</td>
                    <td>{{date('d/m/Y',strtotime($ser->return_date))}}</td>
                    <td>Đang cập nhật..</td>
                    
                    <td>{{$ser->customer}}</td>
                    <td>Đang cập nhật...</td>
                     
                    <td class="center"><a href="service/detail/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="bill/receiptsservice/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td class="center"><a href="bill/paymentservice/{{$ser->id}}" target="_blank"><i class="fa fa-info fa-fw"></i>  </a></td>
                    <td>{{$ser->note}}</td>
                    <td class="center"><a href="service/update/{{$ser->id}}"><i class="fa fa-pencil fa-fw" ></i> </a></td>
                    <td class="center"><a href="service/delete/{{$ser->id}}" onclick="return confirm('Bạn có muốn xóa hợp đồng này không?');"><i class="fa fa-trash-o  fa-fw"></i></a></td>
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