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
		<div>
            <p>ID hợp đồng</p>{{$design->id}}      
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
<!-- /#page-wrapper -->