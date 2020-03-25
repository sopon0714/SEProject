@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"receiveEquipment")
@section('Content')



<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การรับอุปกรณ์</h5></span>
            </div>
        </div>
    </div>
</div>



<<<<<<< HEAD
=======
<div class="row">
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-1">จำนวนคำร้องทั้งหมด</div>
                        <div class="font-weight-bold  text-uppercase  mb-1">ที่อนุมัติแล้ว</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

>>>>>>> 84a21eebe3ee45ec30ea1b144fe278f51783b7f3


<div class="col-xl-15 col-15 mb-4">
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">ตารางแสดงคำร้องขอที่อนุมัติแล้ว</span>
        </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row" >
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">วันที่ยื่นคำร้อง</th>
                                                <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                <th rowspan="1" colspan="1">ผู้ส่งคำร้อง</th>
                                                <th rowspan="1" colspan="1">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">15/02/2020</td>
                                                <td rowspan="1" colspan="1">E0163-10000000001</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดคำร้อง'>
                                                        <i class="fas fa-file-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm tt delbtn" nameitem="1" data-toggle="tooltip" title="ลบคำร้อง" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>


@endsection

@section('modal')
{{-- modal แสดงรายละเอียดการรับอุปกรณ์ --}}
<div class="modal fade" id="infoModal" name="infoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รับอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="col-xl-15 col-15 mb-4">
                                <div class="card"  >
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <div class="search" >

                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <br><label style="font-size: 18px">หมายเลขคำร้อง : </label>
                                                </div>
                                                <div class="col-xl-5 col-6 ">
                                                    <br><input type="text" class="form-control" name="note">
                                                </div>
                                                <div class="col-xl-2 col-6 ">
                                                    <br><button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <br><label style="font-size: 20px">หมายเลขคำร้อง : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <br><output type="text" class="form-control"  >E0163-10000000001
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 18px">ชื่อ-สกุล : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <output type="text" class="form-control"  >นายโสภณ โตใหญ่
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 18px">อาจารย์ที่รับผิดชอบ : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <output type="text" class="form-control"  >นางสาวนุชนาฎ สัตยากวี
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 18px">1    เลขครุภัณฑ์ : </label>
                                                </div>
                                                <div class="col-xl-5 ">
                                                    <select id="serialNumber">
                                                        <option value="a">E0163-10000000001</option>
                                                        <option value="a">E0163-20000000010</option>
                                                        <option value="c">E0163-40000000021</option>
                                                        {{-- <option value="b" selected>ของตกแต่งภายในอาคาร</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 18px">2    เลขครุภัณฑ์ : </label>
                                                </div>
                                                <div class="col-xl-5 ">
                                                    <select id="serialNumber">
                                                        <option value="a">E0163-10000000001</option>
                                                        <option value="a">E0163-20000000010</option>
                                                        <option value="c">E0163-40000000021</option>
                                                        {{-- <option value="b" selected>ของตกแต่งภายในอาคาร</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <span>
                                                <a href=" ">
                                                    <button type="button" id="btn_green" class="btn btn-success">ยืนยัน</button>
                                                </a>
                                            </span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยืนยัน</button>
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
        $('.btninfo').click(function() {
            //alert("5555");
            $("#infoModal").modal();
       });
        $(".delbtn").click(function() {
            //alert("5555");
            var nameitem = $(this).attr('nameitem');
            swal({
                title: "ยืนยันการยกเลิกคำร้อง",
                text: "หมายเลขคำร้อง :"+nameitem,
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
