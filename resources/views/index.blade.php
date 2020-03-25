<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
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
</head>

<body style="background-color: #e6fff5">

    <div>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class=" row">
                <img src="{{asset('img/KU_Logo.png')}}" style="width:30%;margin-top:10px">
                <div class="col-sm-9 col-md-7 col-lg-5 " style="margin-left: 5%;margin-top: 5%">
                    <div>
                        <h5 class="text-center" style="font-size: 30px">ระบบยืม-คืนอุปกรณ์</h5>
                    </div>

                    <div class="card  my-1">

                        <div class="card-body " style="margin-right: 10px">
                            <form class="form-signin" method="POST" action='signinVerify'>
                                <h6 style="text-align: center">ล็อกอินเข้าสู่ระบบโดยใช้บัญชีนนทรี</h6>
                                <br>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-label-group">
                                    <label for="inputEmail">ชื่อผู้ใช้</label>
                                    <div class="col-12">
                                        <input type="text" name="username" id="username" class="form-control" placeholder="username" value="" autofocus>
                                    </div>
                                </div>
                                <br>
                                <div class="form-label-group">
                                    <label for="inputPassword">รหัสผ่าน</label>
                                    <div class="col-12">
                                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" value="">
                                    </div>
                                </div>
                                </br>
                                <div class="form-label-group">
                                <label style="color: red">{{$msg}}</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-1">
                                    <button class="btn btn-success btn-md" style="float:right;" type="submit">ล็อกอิน</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
    $(document).ready(function(){

    });
</script>
<script>
