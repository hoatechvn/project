@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách phân quyền truy cập
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
                    <th>Tên phân quyền</th>
                    <th>Mô tả</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            	@foreach($permision as $per)
                <tr class="odd gradeX" align="center">
                    <td>{{$per->id}}</td>
                    <td>{{$per->name}}</td>
                    <td>{{$per->description}}</td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="permision/update/{{$per->id}}">Chỉnh sửa</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#" class="delete" data-confirm="Bạn có muốn xóa phân quyền này không?"> Xóa</a></td>
                    <script type="text/javascript">
                        var deleteLinks = document.querySelectorAll('.delete');
                        for (var i = 0; i < deleteLinks.length; i++) {
                          deleteLinks[i].addEventListener('click', function(event) {
                              event.preventDefault();

                              var choice = confirm(this.getAttribute('data-confirm'));

                              if (choice) {
                                window.location.href = "permision/delete/{{$per->id}}";
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
<!-- /#page-wrapper -->