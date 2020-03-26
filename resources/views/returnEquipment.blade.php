@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"returnEquipment")
@section('Content')

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 18px; color:white;">การคืนอุปกรณ์</span>
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
                        <div class="font-weight-bold  text-uppercase  mb-1">ที่ยังไม่ได้คืนอุปกรณ์</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount->totalall}} คำร้อง</div>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางแสดงคำร้องที่ยังไม่ได้คืนอุปกรณ์</span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered TableFilter" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
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
                            @for ($i = 0; $i < count($requirement); $i++)

                            <tr role="row" >
                                <td rowspan="1" colspan="1">{{$i+1}}</td>
                                <td rowspan="1" colspan="1">R{{sprintf("%06d", $requirement[$i]->RID)}}</td>
                                <td rowspan="1" colspan="1">{{$requirement[$i]->fullname}}</td>
                                <td rowspan="1" colspan="1">{{floor((time()-$requirement[$i]->getTime)/(60*60*24))}} วัน</td>
                                <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-info btn-sm tt btninfo"  token ="{{csrf_token()}}" OID ="{{$requirement[$i]->OID}}" title='รายละเอียดคำร้อง'>
                                        <i class="fas fa-file-alt"></i>
                                    </button>
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
{{-- modal แสดงรายละเอียดการรับอุปกรณ์ --}}
<div class="modal fade" id="infoModal" name="infoModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="./returnEquipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รับอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="OID" id="OID" value="">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลขคำร้อง:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt1"></span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>ชื่อ-นามสกุลผู้ยืม:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt2">นายโสภณ โตใหญ่</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>ผู้รับผิดชอบการยืม:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt3">นางสาว นุชนาฎ สัตยากวี</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>วันเวลาที่รับอุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt4">15:10:41  11/03/2019</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span >เจ้าหน้าที่ที่มอบอุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt5">นางสาว พิมพิลา ทองแท้</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span >วันเวลาที่คืนอุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt6">-</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>เจ้าหน้าที่ที่รับอุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span id="dt7">-</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-2 ">
                                    <span>รายการอุปกรณ์</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-right">
                                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">รายการอุปกรณ์</th>
                                                <th rowspan="1" colspan="1">เลขครุภัณฑ์</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dt8">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success cancel" >ยืนยัน</button>
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
// # หมายถึง อ้างจาก id      $('#add').click(function()
// . หมายถึง อ้างจาก class   $('.btninfo').click(function()

    $(document).ready(function() {
        $('.btninfo').click(function() {
            //alert("5555");
            var id = $(this).attr('OID');
            $('#OID').val(id);
        var token = $(this).attr('token');
        $.ajax({
                    url: '../DetailByOID',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        OID:id
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        console.table(data);
                        $('#dt1').text("R"+('000000' + data.InfoO.RID).substr(-6));
                        $('#dt2').text(data.InfoO.fullnameMe);
                        $('#dt3').text(data.InfoO.fullnameAdv);
                        $('#dt4').text(data.InfoO.timeget);
                        $('#dt5').text(data.InfoO.fullname1);
                        $('#dt6').text(data.InfoO.timere);
                        $('#dt7').text(data.InfoO.fullname2);
                        $('#dt8').html(data.datatable);
                        $("#infoModal").modal();
                    }
                });
       });
    });
</script>
@endsection

