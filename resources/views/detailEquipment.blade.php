@extends(Session::get('userType')===1 ? "./layoutNisit" : Session::get('userType')===2 ?"./layoutTeacher":"./layoutAdmin")
@section('title',"Detail Equipment")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>รายละเอียดอุปกรณ์</h5></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-2">ข้อมูลอุปกรณ์</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ชื่อ เมาส์</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ยี่ห้อ logitech</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">หมวดหมู่ คอมพิวเตอร์</div>
                        <div class="font-weight-bold  text-uppercase  ">รายละเอียด xxxxxxxxxxxxxx</div>
                    </div>
                </div>
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
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนอุปกรณ์ทั้งหมด</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxx ชิ้น</div>
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
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนอุปกรณ์ที่ยืมได้</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxx ชิ้น</div>
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
                        <div class="font-weight-bold  text-uppercase mb-4">เพิ่มอุปกรณ์</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 อุปกรณ์</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary btnadd" ><i class="fas fa-plus"></i></button>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางการจัดการอุปกรณ์</span>
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
                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>เลขครุภัณฑ์</th>
                            <th>สถานะอุปกรณ์</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            <td class="text-center">1</td>
                            <td >xxxxxxxxxxx-xxxxxxx/60</td>
                            <td class="text-center">ถูกยืม</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm tt mr-sm-1" title='เปิด-ปิด สถานะการยืม'>
                                <i class="fas fa-ban"></i></button>
                                <button type="button" class="btn btn-info btn-sm tt mr-sm-1 btndetail" title='รายละเอียดอุปกรณ์'>
                                <i class="fas fa-file-alt"></i></button>
                                <button type="button" class="btn btn-warning btn-sm tt mr-sm-1 btnedit" data-toggle="tooltip" title="แก้ไขข้อมูลอุปกรณ์" data-original-title="แก้ไข">
                                <i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt btndelete" nameitem ="xxxxxxxxxxx-xxxxxxx/60" data-toggle="tooltip" title="ลบอุปกรณ์" data-original-title="ลบ">
                                <i class="far fa-trash-alt" ></i></button>
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
        $("#addDE").modal();
    });
    $('.btndetail').click(function() {
        $("#detailDE").modal();
    });
    $('.btnedit').click(function() {
        $("#editDE").modal();
    });
    $(".btndelete").click(function() {
            var nameitem = $(this).attr('nameitem');
            swal({
                title: "คุณต้องการลบ",
                text: "เลขครุภัณฑ์: "+nameitem+" หรือไม่ ?",
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
{{-- modal แก้ไขข้อมูลอุปกรณ์ --}}
<div class="modal fade" id="editDE" name="editDE" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="edit_DE" name="edit_DE" action="./equipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">แก้ไขข้อมูลอุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="EditDEBody">
                        <div class="container">
                            <div class="row mb-0">
                                <div class="col-xl-5 col-2 text-right">
                                    <br><span>เลขครุภัณฑ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="search" class="form-control form-control-sm-5"  aria-controls="dataTable">
                                </div>
                                <div class="col-xl-12 col-12 text-center">
                                    <br><span class="text-danger" style="font-size: 16px" >*หากไม่มีเลขครุภัณฑ์ กด ยืนยันเพื่อเพิ่มได้ทันที</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="editDE_submit">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="editDE_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal เพิ่มอุปกรณ์ --}}
<div class="modal fade" id="addDE" name="addDE" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="add_DE" name="add_DE" action="./detailEquipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มอุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="AddDEBody">
                        <div class="container">
                            <div class="row mb-0">
                                <div class="col-xl-5 col-2 text-right">
                                    <br><span>เลขครุภัณฑ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="search" class="form-control form-control-sm-5"  aria-controls="dataTable">
                                </div>
                                <div class="col-xl-12 col-12 text-center">
                                    <br><span class="text-danger" style="font-size: 16px" >*หากไม่มีเลขครุภัณฑ์ กด ยืนยันเพื่อเพิ่มได้ทันที</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="addDE_submit" >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="addDE_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal แสดงรายละเอียดอุปกรณ์ --}}
<div class="modal fade" id="detailDE" name="detailDE" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="detail_RM" name="detail_DE" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รายละเอียดอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="DetailDEBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <br><span>ชื่อ: </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><span>เมาส์</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>เลขครุภัณฑ์: </span>
                                </div>
                                <div class="col-xl-5 col-6 ">
                                    <span>xxxxxxxxxxx-xxxxxxx/60</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>ยี่ห้อ: </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>logitech</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>รายละเอียด: </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" class="form-control form-control-sm-5" style="height:120px"  aria-controls="dataTable"
                                        value="xxxxxxxxxxxxxxxxxx" disabled>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-right">
                                    <table class="table table-bordered" id="HistoryRequireMentsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">วันที่ยืม</th>
                                                <th rowspan="1" colspan="1">หมายเลยคำร้อง</th>
                                                <th rowspan="1" colspan="1">ผู้ยืม</th>
                                                <th rowspan="1" colspan="1">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">15/02/2020</td>
                                                <td rowspan="1" colspan="1">R00001</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                <td rowspan="1" colspan="1">ยืนยันแล้ว</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger cancel" id="detailDE_cancel" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



</div>
@endsection
