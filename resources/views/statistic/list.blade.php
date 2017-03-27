@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thống kê hoa hồng
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
         <div class="row">


        <form action="filter/month" method="POST" style="padding-bottom:20px">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
 <div class="col-sm-3" style="background-color:#3c763d; font-weight:bold;padding: 10px 20px 20px 30px;font-size: 14px;">               
             <div class="form-group">
                <label>Chọn nhân viên</label>
                    <select class="form-control" name="search_year">
                        <option value="2017">2017</option>
                    </select>
                </div>
 </div>
<div class="col-sm-3" style="background-color:#f0ad4e; font-weight:bold;padding: 10px 20px 20px 30px;font-size: 14px;"> 
                <div class="form-group">
                    <label>Chọn tháng</label>
                    <select class="form-control" name="search_month">
                        <option value="00">Chọn tháng</option>
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
                </div>

<div class="col-sm-3" style="background-color:#f0ad4e; font-weight:bold;padding: 10px 20px 20px 30px;font-size: 14px;"> 
                <div class="form-group">
                   <label>Chọn năm</label>
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
                   </div>
               
     
        <div class="col-sm-3" style="background-color:rgba(51, 122, 183, 0.96);; font-weight:bold;padding: 35px 20px 35px 30px;font-size: 14px;"> 
           

                <button type="submit" class="btn btn-default" formtarget="_blank">Xem </button>
        </div>
        </form>
		
     </div>
		
 </div> </br> 
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="justify">
                    <th>Mã HĐ</th>
                     <th>Tên hợp đồng</th>
                    <th>Nhân viên thụ hưởng</th>
                    <th>Ngày ký</th>
                    <th>Ngày hoàn thành</th>
                    <th>Tổng tiền</th> 
                    <th>Lưu ý</th>
                  
                </tr>
            </thead>
            <tbody>
            	@foreach($design as $des)
                @if($des->status==1) 
                <tr style="background-color: #5cb85c;" align="justify">
                    <td>{{$des->id}}</td>
                    <td>{{$des->name}}</td>
                    <td>
                    @foreach($account as $acc)
                        @if ($des->id_account == $acc->id)
                            {{$acc->name}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{$des->register_date}}</td>   
                    <td>{{$des->complete_date}}</td>           
                    <td>???</td>
                    <td>{{$des->note}}</td>  
                </tr>
                 @else
                 <tr class="odd gradeX" align="justify">
                    <td>{{$des->id}}</td>
                    <td>{{$des->name}}</td>
                    <td>
                    @foreach($account as $acc)
                        @if ($des->id_account == $acc->id)
                            {{$acc->name}}
                        @endif
                    @endforeach
                    </td>
                    <td>{{$des->register_date}}</td>
                        <td>{{$des->complete_date}}</td>              
                    <td>???</td>
                    <td>{{$des->note}}</td>  
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