@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách tài khoản
                </h1>
        </div>

        @if(session('thongbao'))
        	<div class="alert alert-success">
        		{{session('thongbao')}}
        		
        	</div>
        @endif
           
		<table class="table table-striped table-bordered table-hover" id="dataTables-example" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Tên nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Email</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($account as $acc)
                <tr class="odd gradeX" align="center">
                    <td>{{$acc->id}}</td>
                    <td>{{$acc->username}}</td>
                    <td>{{$acc->password}}</td>
                    <td>{{$acc->name}}</td>
                    <td>{{$acc->position}}</td>
                    <td>{{$acc->email}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="account/update/{{$acc->id}}">Chỉnh sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" data-confirm="Bạn có muốn xóa tài khoản này không?"> Xóa</a></td>
                    <script type="text/javascript">
                        var deleteLinks = document.querySelectorAll('.delete');
                        for (var i = 0; i < deleteLinks.length; i++) {
                          deleteLinks[i].addEventListener('click', function(event) {
                              event.preventDefault();

                              var choice = confirm(this.getAttribute('data-confirm'));

                              if (choice) {
                                window.location.href = "account/delete/{{$acc->id}}";
                              }
                          });
                        }
                    </script>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>



@endsection 
