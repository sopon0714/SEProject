
@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"User Profile")
@section('CSS')

@endsection

@section('Content')

    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg " style="background-color: #bf4040">
                    <span class="link-active " style="font-size: 18px; color:white;"><h5>บัญชีผู้ใช้</h5></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-5 mb-4">
                            <div class="card"  style="height: 400px">
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 17px; color:white;">ข้อมูลผู้ใช้</span>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>คำนำหน้า:</span>

                                        </div>
                                        <div class="col-xl-8 col-8 ">
                                            <output type="text" class="form-control" id="title" >{{$User[0]->Title}}
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>ชื่อ:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 ">
                                            <output type="text" class="form-control" id="fname" >{{$User[0]->FName}}
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>นามสกุล:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 ">
                                            <output type="text" class="form-control" id="lname" >{{$User[0]->LName}}
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>อีเมล:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 ">
                                            <output type="text" class="form-control" id="email" >{{$User[0]->GMail}}
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>ชนิดผู้ใช้:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 ">
                                            <output type="text" class="form-control" id="type" >{{$User[0]->UTName}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-5 mb-4">
                            <div class="card"  style="height: 400px">
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 17px; color:white;">ประวัติคำร้องขอของผู้ใช้</span>
                                </div>
                                <div class="card-body" style="height: 400px">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                            <thead>
                                                <tr role="row" >
                                                    <th rowspan="1" colspan="1">วันที่ส่งคำร้อง</th>
                                                    <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                    <th rowspan="1" colspan="1">สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < count($history); $i++)
                                                    <tr role="row" >
                                                        <td rowspan="1" colspan="1">{{$history[$i]->ReqDate}}</td>
                                                        <td rowspan="1" colspan="1">R{{sprintf("%06d", $history[$i]->RID)}}</td>
                                                        <td rowspan="1" colspan="1">{{$history[$i]->RStatus}}</td>
                                                    </tr>
                                                @endfor

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card"  >
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 17px; color:white;">ประวัติการยืมอุปกรณ์ของผู้ใช้</span>
                                </div>
                                <div class="card-body">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                            <thead>
                                                <tr role="row">
                                                    <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                    <th rowspan="1" colspan="1">วันที่รับอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">เจ้าหน้าที่ที่มอบอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">วันที่คืนอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">เจ้าหน้าที่ที่รับอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">สถานะการยืม</th>
                                                    <th rowspan="1" colspan="1">รายละเอียด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @for ($i = 0; $i < count($HistoryO); $i++)
                                                    <tr role="row" >
                                                        <td rowspan="1" colspan="1">R{{sprintf("%06d", $HistoryO[$i]->RID)}}</td>
                                                        <td rowspan="1" colspan="1">{{$HistoryO[$i]->getDate}}</td>
                                                        <td rowspan="1" colspan="1">{{$HistoryO[$i]->fullname1}}</td>
                                                        <td rowspan="1" colspan="1">{{$HistoryO[$i]->returnDate}}</td>
                                                        <td rowspan="1" colspan="1">{{$HistoryO[$i]->fullname2}}</td>
                                                        <td rowspan="1" colspan="1">{{$HistoryO[$i]->Ostatus}}</td>
                                                        <td rowspan="1" colspan="1">
                                                            <button type="button" class="btn btn-info btn-sm tt btninfo" token="{{ csrf_token() }}" OID="{{$HistoryO[$i]->OID}}" title='รายละเอียดการยืม'>
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
                    </div>
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
                        <h4 class="modal-title" style="color: white">รายละเอียดการยืมอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-4">
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
        var id = $(this).attr('OID');
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

