@extends('./layoutAdmin')
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



<div class="col-xl-15 col-15 mb-4">
    <div class="card">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 20px; color:white;">ค้นหา</span>
        </div>
        {{-- style="text-align: center" --}}
        <div>
            <div class="card-body" style="height: 500px" >
                <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <div class="search" >
                        <div class="row mb-2">
                            <div class="col-xl-5 col-2 text-right">
                                <label style="font-size: 18px">หมายเลขคำร้อง : </label>
                            </div>
                            <div class="col-xl-3 col-6 ">
                                <input type="text" name="note">
                            </div><div class="col-xl-3 col-6 ">
                                <button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <br>
                        
                        <label style="font-size: 20px">หมายเลขคำร้อง : E0163-10000000001</label>

                        <br>
                        <label style="font-size: 18px">ข้อมูลผู้ยืม</label>
                        <br>
                        <label style="font-size: 18px">ชื่อ-สกุล : นายโสภณ โตใหญ่</label>
                        <br>
                        <label style="font-size: 18px">อาจารย์ที่รับผิดชอบ : นางสาวนุชนาฎ สัตยากวี</label>
                        <br>
                        <br>

                        <label style="font-size: 18px">1    เลขครุภัณฑ์ : E0163-10000000001</label>
                        <br>
                        <label style="font-size: 18px">2    เลขครุภัณฑ์ : E0163-20000000010</label>


                        {{-- <span>
                            <a href=" ">
                                <button type="button" id="btn_green" class="btn btn-success">ยืนยัน</button>
                            </a>
                        </span> --}}
                        <br>
                        <br>
                        <button style="text-align: right" type="button" value="ยืนยัน" class="btn btn-danger" >ยืนยัน</button>
                        <button style="text-align: right" type="button" value="ยกเลิก" class="btn btn-danger" >ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  style="height: 300px">
        {{-- <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">ตารางแสดงคำร้องขอที่อนุมัติแล้ว</span>
        </div> --}}
        <div class="card-body" style="height: 300px">
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
                                <div class="card"  style="height: 400px">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <div class="search" >
                                            <label style="font-size: 18px">หมายเลขคำร้อง : </label>
                                            <input type="text" name="note">
                                            <button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <br>
                                            <label style="font-size: 20px">หมายเลขคำร้อง : E0163-10000000001</label>

                                            <br>
                                            <label style="font-size: 18px">ข้อมูลผู้ยืม</label>
                                            <br>
                                            <label style="font-size: 18px">ชื่อ-สกุล : นายโสภณ โตใหญ่</label>
                                            <br>
                                            <label style="font-size: 18px">อาจารย์ที่รับผิดชอบ : นางสาวนุชนาฎ สัตยากวี</label>
                                            <br>
                                            <br>
                                            <label style="font-size: 18px">1    เลขครุภัณฑ์ : E0163-10000000001</label>
                                            <br>
                                            <label style="font-size: 18px">2    เลขครุภัณฑ์ : E0163-20000000010</label>
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

