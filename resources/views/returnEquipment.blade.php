@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"returnEquipment")
@section('Content')



<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การคืนอุปกรณ์</h5></span>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-1">จำนวนคำร้องทั้งหมด</div>
                        <div class="font-weight-bold  text-uppercase  mb-1">ที่รับอุปกรณ์แล้ว</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-check fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="row">
                <div class="col-xl-12 col-12 mb-4">
                    <div class="card">
                        <div class="card-header card-bg " style="background-color: #bf4040">
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางแสดงคำร้องที่รับอุปกรณ์แล้ว</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row" >
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                <th rowspan="1" colspan="1">ผู้ยืม</th>
                                                <th rowspan="1" colspan="1">จำนวนวันที่ยืม</th>
                                                <th rowspan="1" colspan="1">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">E0163-10000000001</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                <td rowspan="1" colspan="1">1 เดือน 3 วัน</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดคำร้อง'>
                                                        <i class="fas fa-file-alt"></i>
                                                    </button>
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
                        <h4 class="modal-title" style="color: white">คืนอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="col-xl-15 col-15 mb-4">
                                <div class="card"  >
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <div class="search" >

                                            <div class="row mb-2">
                                                <div class="col-xl-4 col-2 text-right">
                                                    <br><label style="font-size: 18px">หมายเลขคำร้อง : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <br><input type="text" class="form-control" name="note">
                                                </div>
                                                <div class="col-xl-3 col-3 ">
                                                    <br><button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-xl-12 col-12 text-primary text-center">
                                                    <br><label style="font-size: 20px ;">ข้อมูลผู้ยืม</label>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 20px">หมายเลขคำร้อง : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <output type="text" class="form-control"  >E0163-10000000001
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
                                                <div class="col-xl-5 col-3 ">
                                                    <output type="text" class="form-control"  >E0163-10000000001
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-xl-5 col-2 text-right">
                                                    <label style="font-size: 18px">2    เลขครุภัณฑ์ : </label>
                                                </div>
                                                <div class="col-xl-5 col-3 ">
                                                    <output type="text" class="form-control"  >E0163-20000000010
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
    });
</script>
@endsection

