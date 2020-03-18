@extends('./layoutAdmin')
@section('title',"listEquipment")
@section('Content')



<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>รายการอุปกรณ์</h5></span>
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
                        <div class="font-weight-bold  text-uppercase mb-1">จำนวนรายการอุปกรณ์ทั้งหมด</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx รายการ</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x"></i>
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
                        <div class="font-weight-bold  text-uppercase mb-1">จำนวนรายการอุปกรณ์ที่สามารถยืมได้</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx รายการ</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-12 mb-4">
        <a style="text-decoration: none">
        <div class="card border-left-primary card-color-add shadow h-100 py-2" id="addsub" style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-xl text-info">เพิ่มรายการอุปกรณ์</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" onclick="listEquipment()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 20px; color:white;">ค้นหา</span>
        </div>
        {{-- style="text-align: center" --}}
        <div>
            <div class="card-body" style="height: 180px" >
                <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <div class="search" >
                        <label style="font-size: 18px">ชื่ออุปกรณ์ : </label>
                        <input type="text" name="note"><br />

                        <label for="category" style="font-size: 18px">หมวดหมู่อุปกรณ์ : </label>
                        <select id="category">
                            <option value="a">อุปกรณ์อิเล็กทรอนิกส์</option>
                            <option value="a">อุปกรณ์ทั่วไป</option>
                            <option value="c">อุปกรณ์คอมพิวเตอร์</option>
                            {{-- <option value="b" selected>ของตกแต่งภายในอาคาร</option> --}}
                        </select>

                        <br>
                        <label for="category" style="font-size: 18px">สถานะอุปกรณ์ : </label>
                        <input type="radio" name="gender" value="male" checked> ทั้งหมด
                        <input type="radio" name="gender" value="female"> ยืมได้
                        <input type="radio" name="gender" value="other"> ยืมไม่ได้

                        <br>
                        {{-- <span>
                            <a href=" ">
                                <button type="button" id="btn_green" class="btn btn-success">ยืนยัน</button>
                            </a>
                        </span> --}}
                        <button style="text-align: right" type="button" value="ค้นหา" class="btn btn-danger" >ค้นหา</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  style="height: 400px">
        {{-- <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">ค้นหา</span>
        </div> --}}
        <div class="card-body" style="height: 300px">
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                <table class="table table-bordered" id="historyRequirementsTable " style="text-align:center;"  swidth="100%"  cellspacing="0">
                    <thead>
                        <tr role="row" >
                            <th rowspan="1" colspan="1">ลำดับ</th>
                            <th rowspan="1" colspan="1">ชื่ออุปกรณ์</th>
                            <th rowspan="1" colspan="1">หมวดหมู่อุปกรณ์</th>
                            <th rowspan="1" colspan="1">จำนวนทั้งหมด</th>
                            <th rowspan="1" colspan="1">จำนวนที่ยืมได้</th>
                            <th rowspan="1" colspan="1">รายละเอียด</th>
                            <th rowspan="1" colspan="1">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr role="row" >
                            <td rowspan="1" colspan="1">1</td>
                            <td rowspan="1" colspan="1">มัลติมิเตอร์แบบดิจิตอล</td>
                            <td rowspan="1" colspan="1">อุปกรณ์อิเล็กทรอนิกส์</td>
                            <td rowspan="1" colspan="1">50</td>
                            <td rowspan="1" colspan="1">42</td>
                            {{-- <td style="text-align:center;">
                                <button type="button" class="btn btn-outline-dark tt " data-toggle="tooltip" title="" data-original-title="รายละเอียด" onclick="showHint(<?php echo $order->OID; ?>)"><i class="fas fa-file-alt"></i></button>
                            </td> --}}
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดรายการอุปกรณ์'>
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-warning btn-sm tt" data-toggle="tooltip" title="แก้ไขรายการอุปกรณ์" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt delbtn" data-toggle="tooltip" title="ลบรายการอุปกรณ์" nameitem ="มัลติมิเตอร์แบบดิจิตอล" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                            </td>
                        </tr>
                        <tr role="row" >
                            <td rowspan="1" colspan="1">1</td>
                            <td rowspan="1" colspan="1">กุญแจทองเหลืองสามห่วง</td>
                            <td rowspan="1" colspan="1">อุปกรณ์ทั่วไป</td>
                            <td rowspan="1" colspan="1">40</td>
                            <td rowspan="1" colspan="1">40</td>
                            {{-- <td style="text-align:center;">
                                <button type="button" class="btn btn-outline-dark tt " data-toggle="tooltip" title="" data-original-title="รายละเอียด" onclick="showHint(<?php echo $order->OID; ?>)"><i class="fas fa-file-alt"></i></button>
                            </td> --}}
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดรายการอุปกรณ์'>
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-warning btn-sm tt" data-toggle="tooltip" title="แก้ไขรายการอุปกรณ์" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt delbtn" data-toggle="tooltip" title="ลบรายการอุปกรณ์" nameitem ="กุญแจทองเหลืองสามห่วง" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" ></i></button>
                            </td>
                        </tr>
                        <tr role="row" >
                            <td rowspan="1" colspan="1">1</td>
                            <td rowspan="1" colspan="1">เมาส์</td>
                            <td rowspan="1" colspan="1">อุปกรณ์คอมพิวเตอร์</td>
                            <td rowspan="1" colspan="1">60</td>
                            <td rowspan="1" colspan="1">58</td>
                            {{-- <td style="text-align:center;">
                                <button type="button" class="btn btn-outline-dark tt " data-toggle="tooltip" title="" data-original-title="รายละเอียด" onclick="showHint(<?php echo $order->OID; ?>)"><i class="fas fa-file-alt"></i></button>
                            </td> --}}
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดรายการอุปกรณ์'>
                                    <i class="fas fa-file-alt"></i>
                                </button>
                            </td>
                            <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-warning btn-sm tt" data-toggle="tooltip" title="แก้ไขรายการอุปกรณ์" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt delbtn" data-toggle="tooltip" title="ลบรายการอุปกรณ์"  nameitem ="เมาส์" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
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
{{-- modal แสดงรรายละเอียดการยืม --}}
<div class="modal fade" id="infoModal" name="infoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">แสดงรายละเอียดอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="col-xl-15 col-15 mb-4">
                                <div class="card"  style="height: 200px">
                                    {{-- <div class="card-header card-bg " style="background-color: #bf4040">
                                        <span class="link-active " style="font-size: 15px; color:white;">ค้นหา</span>
                                    </div> --}}
                                    <div class="card-body" style="height: 150px">
                                        <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                            <label style="font-size: 18px">ชื่อ : เมาส์</label><br>
                                            <label style="font-size: 18px">เลขครุภัณฑ์ : E0163-10000000001</label><br>
                                            <label style="font-size: 18px">ยี่ห้อ : logitech</label><br>
                                            <label style="font-size: 18px">รายละเอียด : xxxxxxxxxxxxxx</label><br>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-right">
                                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                                        <h5 class="modal-title" style="color: white">ประวัติการยืมอุปกรณ์ </h5>
                                    </div>
                                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">วันที่ยืม</th>
                                                <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                <th rowspan="1" colspan="1">ผู้ยืม</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">20/02/2020</td>
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('Javascript')
<script>
    $(document).ready(function() {
       $('.btninfo').click(function() {
            //alert("5555");
            $("#infoModal").modal();
       });
    });


    $(document).ready(function() {
        $(".delbtn").click(function() {
            //alert("5555");
            var nameitem = $(this).attr('nameitem');
            swal({
                title: "คุณต้องการลบ",
                text: nameitem+" หรือไม่ ?",
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
