<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <style>
    </style>
    @yield('CSS')
</head>
<body>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: #bf4040" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-hotel"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ระบบยืม-คืน<br>นิสิต</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-1">

            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href="../../userProfile/{{Session::get('userid')}}" data-toggle='' data-target='' aria-expanded='true' aria-controls=''>
                    <i class="fas fa-user-alt"></i>
                    <span>บัญชีผู้ใช้</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href="../../listEquipment" data-toggle='' data-target='' aria-expanded='true' aria-controls=''>
                    <i class="fas fa-desktop"></i>
                    <span>รายการอุปกรณ์</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link collapsed' href="../../requestManagement" data-toggle='' data-target='' aria-expanded='true' aria-controls=''>
                    <i class="fas fa-tasks"></i>
                    <span>การจัดการคำร้อง</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='../../comment'>
                    <i class="fas fa-comment-dots"></i>
                    <span>แสดงความคิดเห็น</span>
                </a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='/logout'>
                    <i class="fas fa-sign-out-alt"></i>
                    <span>ออกจากระบบ</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" style="background-color: #FFE4E1;">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul>
                        <div class="text-left " style="padding-top:20px;color: #bf4040;">
                            <h5>ระบบยืม-คืนอุปกรณ์ของภาควิชาวิศวกรรมคอมพิวเตอร์</h5>
                        </div>
                    </ul>
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Session::get('fullname')}}<br><span style="color: tomato;float:right;">นิสิต</span></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="./{{Session::get('userid')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    บัญชีผู้ใช้
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <div class="container">
                    @yield('Content')
                </div>
            </div>
        </div>
    </div>
    @yield('modal')
</body>
</html>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('.TableFilter').dataTable({
            //"scrollX": true,
            "oLanguage": {
                sLengthMenu: "แสดง  _MENU_  แถว",
                sSearch: "<span>ค้นหา </span> _INPUT_",
                sInfo: "กำลังแสดง _START_ ถึง _END_ จาก _TOTAL_ แถว", //search
                oPaginate: {
                    sFirst: "First",
                    sLast: "Last",
                    sNext: "ต่อไป",
                    sPrevious: "ก่อนหน้า"
                },
            }
        });
        $('.tt').tooltip({
            trigger: "hover"
        });
        $('.modal').on('hidden.bs.modal', function() {
            $(this).find('form').trigger('reset');
        })
    });
</script>
@yield('Javascript')
