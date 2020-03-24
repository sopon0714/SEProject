@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"Request Management")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การจัดการคำร้อง</h5></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนคำร้อง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-import fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนคำร้องที่รอยืนยัน</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-word fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2  btnadd"
            data-toggle="modal" data-target="#modal-1" style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-4">เพิ่มคำร้อง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary " ><i class="fas fa-file-medical fa-2x"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="row">
                <div class="col-xl-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-header card-bg " style="background-color: #bf4040">
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางการจัดการคำร้อง</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="Table_RM" width="100%" cellspacing="0" style="width: 90%" align="center">
                        <colgroup>
                            <col width="100">
                            <col width="100">
                            <col width="100">
                            <col width="100">
                            <col width="100">
                            <col width="100">

                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>วันที่ยื่นคำร้อง</th>
                            <th>หมายเลยคำร้อง</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            <td class="text-center">1</td>
                            <td class="text-center">15/02/2020</td>
                            <td >R00001</td>
                            <td >รอยืนยัน</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm tt btndetail" title='รายละเอียดการคำร้อง'>
                                <i class="fas fa-file-alt"></i></button></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm tt mr-sm-1 btnedit" data-toggle="tooltip" title="แก้ไขคำร้อง" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt btndelete" data-toggle="tooltip" title="ลบคำร้อง" data-original-title="ลบ"><i class="far fa-trash-alt" ></i></button>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('Javascript')
<script>
    $('.btnadd').click(function() {
        $("#addRM").modal();
    });
    $('.btnedit').click(function() {
        $("#editRM").modal();
    });
    $('.btndetail').click(function() {
        $("#detailRM").modal();
    });
    $(".btndelete").click(function() {
            var nameitem = $(this).attr('nameitem');
            swal({
                title: "คุณต้องการลบ",
                text: "หมายเลขคำร้อง: "+nameitem+" หรือไม่ ?",
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
</script>
@endsection
@section('modal')
{{-- modal เพิ่มคำร้อง --}}
<div class="modal fade" id="addRM" name="addRM" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="add_RM" name="add_RM" action="./equipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="AddRMBody">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <br><span>วันที่:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5 col-2 ">
                                    <span>อุปกรณ์ที่ต้องการยืม: </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-3 col-3 text-right">
                                    <span>ชื่ออุปกรณ์:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                                <div class="col-xl-2 col-2 text-right">
                                    <span>จำนวน:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                                <div class="col-xl-1 col-1 ">
                                    <button class="btn btn btnadd" ><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-3 col-3 text-right">
                                    <span>ชื่ออุปกรณ์:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                                <div class="col-xl-2 col-2 text-right">
                                    <span>จำนวน:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                                <div class="col-xl-1 col-1 ">
                                    <button class="btn btn btnadd" ><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>เหตุผลในการยืม:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <input type="text" class="form-control form-control-sm-5"  style="height:150px" aria-controls="dataTable" >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>อาจารย์ที่รับผิดชอบ:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="addRM_submit">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="addRM_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal แก้ไขคำร้อง --}}
<div class="modal fade" id="editRM" name="editRM" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="edit_RM" name="edit_RM" action="./equipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">แก้ไขคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="EditRMBody">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <br><span>วันที่:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-5 col-2 ">
                                    <span>อุปกรณ์ที่ต้องการยืม: </span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-3 col-3 text-right">
                                    <span>ชื่ออุปกรณ์:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                                <div class="col-xl-2 col-2 text-right">
                                    <span>จำนวน:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                                <div class="col-xl-1 col-1 ">
                                    <button class="btn btn btnadd" ><i class="fas fa-minus"></i></button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-3 col-3 text-right">
                                    <span>ชื่ออุปกรณ์:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                                <div class="col-xl-2 col-2 text-right">
                                    <span>จำนวน:</span>
                                </div>
                                <div class="col-xl-3 col-3 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" disabled>
                                </div>
                                <div class="col-xl-1 col-1 ">
                                    <button class="btn btn btnadd" ><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>เหตุผลในการยืม:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <input type="text" class="form-control form-control-sm-5"  style="height:150px" aria-controls="dataTable" >
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>อาจารย์ที่รับผิดชอบ:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <input type="text" class="form-control form-control-sm-5"  aria-controls="dataTable" value="drop down" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="editRM_submit">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="editRM_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- modal แสดงรายละเอียดคำร้อง --}}
<div class="modal fade" id="detailRM" name="detailRM" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="detail_RM" name="detail_RM" action="./requestManagement.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รายละเอียดอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="DetailDEBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <br><span>รายละเอียดคำร้อง: </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><h5><span class="text" style="color: #0000cc">รอยืนยัน</span></h5>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลยคำร้อง: </span>
                                </div>
                                <div class="col-xl-5 col-6 ">
                                    <span style="font-size: 17px">R00002</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>วันที่ยื่นคำร้อง: </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span style="font-size: 17px">15/02/2020</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 ">
                                    <span>รายการอุปกรณ์ที่ยืม </span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-right">
                                    <table class="table table-bordered" id="listEquipmentTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <tbody>
                                            <tr role="row" style="font-size: 17px">
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">เมาส์</td>
                                                <td rowspan="1" colspan="1">2 ชื้น</td>
                                            </tr>
                                            <tr role="row" style="font-size: 17px">
                                                <td rowspan="1" colspan="1">2</td>
                                                <td rowspan="1" colspan="1">จอคอมพิวเตอร์</td>
                                                <td rowspan="1" colspan="1">2 ชื้น</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-6 col-2 text-right">
                            <span>อาจารย์ที่รับผิดชอบ: </span>
                        </div>
                        <div class="col-xl-6 col-6 ">
                            <span style="font-size: 17px">นางสาวนุชนาฎ สัตนากวี</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-6 col-2 text-right">
                            <span>วันเวลาที่อนุมัติการยืม: </span>
                        </div>
                        <div class="col-xl-6 col-6 ">
                            <span style="font-size: 17px">-</span>
                            <br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger cancel" id="detailRM_cancel" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
