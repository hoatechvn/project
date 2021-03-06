<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Minh Đức</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Phân quyền<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="permision/list"> Danh sách phân quyền</a>
                        </li>
                        <li>
                            <a href="permision/add"> Thêm phân quyền</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i> Tài khoản<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="account/list"> Danh sách tài khoản</a>
                        </li>
                        <li>
                            <a href="account/add"> Thêm tài khoản</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                  <a href="#"><i class="fa fa-cube fa-fw"></i> Loại hợp đồng<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="contract/list">Danh sách loại hợp đồng</a>
                        </li>
                        <li>
                            <a href="contract/add">Thêm loại hợp đồng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Loại bản vẽ <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="draw/list"> Danh sách bản vẽ</a>
                        </li>
                        <li>
                            <a href="draw/add"> Thêm loại bản vẽ </a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Giá diện tích <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="cost/list"> Danh sách giá diện tích</a>
                        </li>
                        <li>
                            <a href="cost/add"> Thêm giá diện tích </a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
               
              
                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Quản lý công việc <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="workday/list"> Danh sách công việc</a>
                        </li>
                        <li>
                            <a href="workday/add"> Thêm công việc </a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
               
                <li>
                    <a href="customer/list"><i class="fa fa-users fa-fw"></i> Khách hàng</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-retweet fa-fw"></i> Hợp đồng thiết kế<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="design/list"> Danh sách hợp đồng</a>
                        </li>
                        <li>
                            <a href="design/add"> Tạo hợp đồng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-retweet fa-fw"></i> Hợp đồng dịch vụ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="service/list"> Danh sách hợp đồng</a>
                        </li>
                        <li>
                            <a href="service/add"> Tạo hợp đồng</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-book fa-fw "></i> Kế toán<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="bill/list"> Danh sách sổ quỹ</a>
                        </li>
                        <li>
                            <a href="statistic/list"> Thống kê hoa hồng</a>
                        </li>
                       
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                 <li>
                    <a href="#"><i class="fa fa-plus fa-fw"></i> Lấy dấu<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="sign/list"> Danh sách lấy dấu</a>
                        </li>
                        <li>
                            <a href="sign/add"> Thêm lấy dấu</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
