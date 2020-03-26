@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"requestManagement")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การจัดการคำร้องทั้งหมด</h5></span>
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
                        <div class="font-weight-bold  text-uppercase  mb-1">จำนวนคำร้องที่รอยืนยัน</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amountWait[0]->petition}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope-open-text fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2  btnadd">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-4">เพิ่มคำร้อง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success " ><i class="fas fa-file-medical fa-2x"></i></button>
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
                    <table class="table table-bordered TableFilter" id="Table_RM" width="100%" cellspacing="0" style="width: 100%" align="center">
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

                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            @for ($i = 0; $i < count($TableRequestManagement); $i++)
                            <tr role="row" >
                                <td class="text-center">{{$i+1}}</td>
                                <td class="text-center">{{$TableRequestManagement[$i]->ReqDate}}</td>
                                <td class="text-center">R{{sprintf("%06d", $TableRequestManagement[$i]->RID)}}</td>
                                <td class="text-center">{{$TableRequestManagement[$i]->petition}}</td>


                                <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm tt btndetail" title='รายละเอียดการคำร้อง' token ="{{csrf_token()}}"reqDate="{{$TableRequestManagement[$i]->ReqDate}}" rid="{{$TableRequestManagement[$i]->RID}}" petition="{{$TableRequestManagement[$i]->petition}}"><i class="fas fa-file-alt"></i></button>
                                @if ($TableRequestManagement[$i]->petition !='ยกเลิก'&&$TableRequestManagement[$i]->petition !='รับอุปกรณ์แล้ว')
                                <button type="button" class="btn btn-danger btn-sm tt btndelete" data-toggle="tooltip" title="ลบคำร้อง" TT="R{{sprintf("%06d", $TableRequestManagement[$i]->RID)}}"RID="{{$TableRequestManagement[$i]->RID}}" data-original-title="ลบ"><i class="far fa-trash-alt" ></i></button>
                                @endif

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
@endsection
@section('Javascript')
<script>
    $("body").delegate(".btnaddEq", "click", function(){
            $("#mainpoint").clone().appendTo("#addinfo");

        });
    $('#addRM').on('hidden.bs.modal', function() {
        $("#addinfo").empty();
        $("#mainpoint").clone().appendTo("#addinfo");
        $(this).find('form').trigger('reset');
    })
    $('.btnadd').click(function() {
        $("#addRM").modal();
    });
    $('.btnedit').click(function() {
        $("#editRM").modal();
    });
    $('.btndetail').click(function() {
        var token = $(this).attr('token')
        $("#petitionrequest").val($(this).attr('petition'))
        $("#ridrequest").val("R"+('000000' + $(this).attr('rid')).substr(-6))
        $("#reqdaterequest").val($(this).attr('reqdate'))
        $.ajax({
                    url: '../DetailByRID',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        RID:$(this).attr('rid')
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        $('#dt1').html(data.datatable);
                        $('#dt2').text(data.InfoO.fullnameAdv);
                        $('#dt3').text(data.InfoO.timeac);
                        $('#dt4').text(data.InfoO.Reason);
                        $("#detailRM").modal();
                    }
                });
    });
    $(".btndelete").click(function() {
        $('#RIDcancel').val($(this).attr('RID'))
        $('#TT').html("ยกเลิกคำร้อง "+$(this).attr('TT'))
        $("#cancelModal").modal();
    });
</script>
@endsection
@section('modal')
{{-- modal เพิ่มคำร้อง --}}
<div class="modal fade" id="addRM" name="addRM" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="add_RM" name="add_RM" action="./requestManagement">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="AddRMBody">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-xl-5 col-2 ">
                                    <span>อุปกรณ์ที่ต้องการยืม : </span>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div id="addinfo">
                                <div class="row mb-2">
                                    <div class="col-xl-6 col-2 ">
                                        <select  class="form-control form-control-sm-5" name="eq[]">
                                            @for ($i = 0; $i < count($EQ); $i++)
                                                <option value="{{$EQ[$i]->ELID}}">{{$EQ[$i]->EName}}({{$EQ[$i]->totalall}})</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-2 text-right">
                                        <span>จำนวน: </span>
                                    </div>
                                    <div class="col-xl-2 col-2 ">
                                        <input class="form-control" name="Number[]" type="Number" min="1"/>
                                    </div>
                                    <div class="col-xl-2 col-2 ">
                                        <button class="btn btn-success btnaddEq" type="button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                           <br>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-left">
                                    <span>เหตุผลในการยืม:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <textarea class="form-control form-control-sm-5" name="reason" style="height:150px" aria-controls="dataTable"></textarea>
                                </div>
                            </div>
                            <br>

                            @if (Session::get('userType')==1)
                                <div class="row mb-2">
                                    <div class="col-xl-4 col-2 text-left">
                                        <span>อาจารย์ที่รับผิดชอบ :</span>
                                    </div>
                                    <div class="col-xl-7 col-7 ">
                                        <select id="advisor" class="form-control form-control-sm-5" name="advisor">
                                            @for ($i = 0; $i < count($Advisor); $i++)
                                                    <option value="{{$Advisor[$i]->UID}}">อาจารย์ {{$Advisor[$i]->FName}} {{$Advisor[$i]->LName}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="advisor" value="-">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel"  data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal ยกเลิกคำร้อง --}}
<div class="modal fade" id="cancelModal"  style="margin-top: 10%" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post"   name="cancelModal" action="./requestManagement">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #CC0000;">
                        <h4 class="modal-title" id="TT" style="color: white">ยืนยันการยกเลิกคำร้อง</h4>
                    </div>
                    <div class="modal-body" >
                        <div class="container">
                            <div class="row mb-2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" id="RIDcancel" name="RID" value="">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>เหตุผลในการยกเลิก:</span>
                                </div>
                                <div class="col-xl-7 col-7 ">
                                    <input type="text" class="form-control " name="reasoncancel"  aria-controls="dataTable" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="cancelRM_submit">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="cancelRM_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal แก้ไขคำร้อง --}}
<div class="modal fade" id="ss" name="ss" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="test" name="test" action="./equipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="test">
                        <div class="container">
                            <div id="mainpoint">
                                <div class="row mb-2">
                                    <div class="col-xl-6 col-2 ">
                                        <select  class="form-control form-control-sm-5" name="eq[]">
                                            @for ($i = 0; $i < count($EQ); $i++)
                                                <option value="{{$EQ[$i]->ELID}}">{{$EQ[$i]->EName}}({{$EQ[$i]->totalall}})</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="col-xl-2 col-2 text-right">
                                        <span>จำนวน: </span>
                                    </div>
                                    <div class="col-xl-2 col-2 ">
                                        <input class="form-control" name="Number[]" type="Number" min="1"/>
                                    </div>
                                    <div class="col-xl-2 col-2 ">
                                        <button class="btn btn-success btnaddEq" type="button">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel"  data-dismiss="modal">ยกเลิก</button>
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
                        <h4 class="modal-title" style="color: white">รายละเอียดคำร้อง </h4>
                    </div>
                    <div class="modal-body" id="DetailDEBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <br><span>สถานะคำร้อง : </span>
                                </div>
                                <div class="col-xl-6 col-6">
                                    <br><output id="petitionrequest" name="petitionrequest"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลยคำร้อง : </span>
                                </div>
                                <div class="col-xl-5 col-6 ">
                                    <output id="ridrequest" name="ridrequest"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>วันที่ยื่นคำร้อง : </span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <output id="reqdaterequest" name="reqdaterequest"></output>
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
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">รายการอุปกรณ์</th>
                                                <th rowspan="1" colspan="1">จำนวน</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dt1">
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
                            <span id="dt2">นางสาวนุชนาฎ สัตยากวี</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-6 col-2 text-right">
                            <span>วันเวลาที่อนุมัติการยืม: </span>
                        </div>
                        <div class="col-xl-6 col-6 ">
                            <span id="dt3">-</span>
                            <br>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-xl-6 col-2 text-right">
                            <span>เหตุผลในการยืม: </span>
                        </div>
                        <div class="col-xl-6 col-6 ">
                            <span id="dt4">-</span>
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
