@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"userManagement")
@section('Content')

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การจัดการผู้ใช้</h5></span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">เจ้าหน้าที่ในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[0]->person}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">อาจารย์ในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[1]->person}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fab fa-jenkins fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">นิสิตในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[2]->person}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-12 mb-4">
        <a style="text-decoration: none">
        <div class="card border-left-primary card-color-add shadow h-100 py-2" id="add" style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-xl ">เพิ่มเจ้าหน้าที่</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success" ><i class="fas fa-user-plus fa-2x"></i></button>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">เจ้าหน้าที่</span>
        </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered TableFilter" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                        <thead>
                            <tr role="row" >
                                <th rowspan="1" colspan="1">ลำดับ</th>
                                <th rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
                                <th rowspan="1" colspan="1">สถานะ</th>
                                <th rowspan="1" colspan="1">จำนวนการยืม</th>
                                <th rowspan="1" colspan="1">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($TableUserManagementStaff); $i++)
                            <tr role="row" >
                                <td rowspan="1" colspan="1">{{$i+1}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementStaff[$i]->Title}}{{$TableUserManagementStaff[$i]->FName}} {{$TableUserManagementStaff[$i]->LName}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementStaff[$i]->UTName}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementStaff[$i]->amount}}</td>
                                <td rowspan="1" colspan="1">
                                    <a href="../userProfile/{{$TableUserManagementStaff[$i]->UID}}">
                                        <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียด'>
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm tt delbtn" data-toggle="tooltip" nameitem="เจ้าหน้าที่ : พี่บิ๊ก" title="ลบเจ้าหน้าที่" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-15 col-15 mb-4">
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">อาจารย์และนิสิต</span>
        </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered TableFilter" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                        <thead>
                            <tr role="row" >
                                <th rowspan="1" colspan="1">ลำดับ</th>
                                <th rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
                                <th rowspan="1" colspan="1">สถานะ</th>
                                <th rowspan="1" colspan="1">จำนวนการยืม</th>
                                <th rowspan="1" colspan="1">รายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($TableUserManagementAjNisit); $i++)
                            <tr role="row" >
                                <td rowspan="1" colspan="1">{{$i+1}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementAjNisit[$i]->Title}}{{$TableUserManagementAjNisit[$i]->FName}} {{$TableUserManagementAjNisit[$i]->LName}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementAjNisit[$i]->UTName}}</td>
                                <td rowspan="1" colspan="1">{{$TableUserManagementAjNisit[$i]->amount}}</td>
                                <td rowspan="1" colspan="1">
                                    <a href="../userProfile/{{$TableUserManagementAjNisit[$i]->UID}}">
                                        <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียด'>
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
{{-- modal แสดงการเพิ่มเจ้าหน้าที่ --}}
<div class="modal fade" id="addModal" name="addModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="addstaff" name="addstaff" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มเจ้าหน้าที่</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="col-xl-15 col-15 mb-4">
                                <div>
                                    <div class="card-body" >
                                        <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">Username : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input  class="form-control" type="text" name="note">
                                                </div>
                                                <div class="col-xl-2 col-6 ">
                                                    <button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                                                        <i class="fas fa-search"></i>
                                                    </button><br>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">คำนำหน้า : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input  class="form-control" type="text" name="note">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">คำนำหน้า : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input  class="form-control" type="text" name="note">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">ชื่อ : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input class="form-control" type="text" name="note">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">นามสกุล : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input class="form-control" type="text" name="note">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <label style="font-size: 18px">E-mail : </label>
                                                </div>
                                                <div class="col-xl-6 col-6 ">
                                                    <input class="form-control" type="text" name="note">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success ok" id="a_okInfo" data-dismiss="modal">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('Javascript')
<script>
// # หมายถึง อ้างจาก id      $('#add').click(function()
// . หมายถึง อ้างจาก class   $('.btninfo').click(function()

    $(document).ready(function() {
        $('#add').click(function() {
            //alert("5555");
            $("#addModal").modal();
       });
        $(".delbtn").click(function() {
            //alert("5555");
            var nameitem = $(this).attr('nameitem');
            swal({
                title: "ยืนยันการลบเจ้าหน้าที่",
                text: nameitem,
                icon: "warning",
                buttons: true,
                buttons: ["ยกเลิก", "ยืนยัน"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                        icon: "success",
                        buttons: false
                    });
                    //delete_1(uid);
                    setTimeout(function() {
                        location.reload();
                    }, 1500);
                } else {
                    swal("การลบไม่สำเร็จ ",{
                        icon: "error",
                        buttons: false
                    });
                    setTimeout(function() {
                        swal.close();
                    }, 1500);
                }
            });
        });
    });
</script>
@endsection
