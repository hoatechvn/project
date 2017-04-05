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
        <form action="filter/idcontract" method="POST" style="padding-bottom:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
              
                <div class="form-group">
                    <label>Thu chi theo hợp đồng</label>
                    <input class="form-control" name="search_idcontract" placeholder="Nhập mã hợp đồng cần xem" />
                </div>
                <button type="submit" class="btn btn-default" formtarget="_blank">Xem</button>
        </form> 
        <form action="filter/date" method="POST" style="padding-bottom:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Thu chi theo ngày</label>
                    <input class="form-control" name="search_date" type="date"/>
                </div>
                <button type="submit" class="btn btn-default" formtarget="_blank">Xem</button>
        </form> 
        <form action="filter/month" method="POST" style="padding-bottom:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group">
                    <label>Thu chi theo tháng</label>
                    <select class="form-control" name="search_month" >
                        <option value="01">Tháng 1</option>
                        <option value="02">Tháng 2</option>
                        <option value="03">Tháng 3</option>
                        <option value="04">Tháng 4</option>
                        <option value="05">Tháng 5</option>
                        <option value="06">Tháng 6</option>
                        <option value="07">Tháng 7</option>
                        <option value="08">Tháng 8</option>
                        <option value="09">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="search_year">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default" formtarget="_blank">Xem</button>
        </form>
        <form action="filter/year" method="POST" style="padding-bottom:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <div class="form-group">
                <label>Thu chi theo năm</label>
                    <select class="form-control" name="search_year">
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default" formtarget="_blank">Xem</button>
        </form>

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
                    <td>
                    @if ($bil->id_design != "")
                        {{$bil->id_design}}
                    @endif
                    @if ($bil->id_service != "")
                        {{$bil->id_service}}
                    @endif
                    @if ($bil->id_sign != "")
                        {{$bil->id_sign}}
                    @endif
                    </td>
                    <td>
                    @if ($bil->id_design != "")
                        @foreach($design as $des)
                            @if ($bil->id_design == $des->id)
                                {{$des->name}}
                            @endif
                        @endforeach
                    @endif
                    @if ($bil->id_service != "")
                        @foreach($service as $ser)
                            @if ($bil->id_service == $ser->id)
                                {{$ser->name}}
                            @endif
                        @endforeach
                    @endif
                    @if ($bil->id_sign != "")
                        @foreach($sign as $sig)
                            @if ($bil->id_sign == $sig->id)
                                @foreach($typedraw as $draw)
                                    @if($sig->id_typedraw == $draw->id)
                                        {{$draw->type}}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
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


                    <td class="center"><a href="bill/update/{{$bil->id}}"><i class="fa fa-pencil fa-fw"></i> </a></td>
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