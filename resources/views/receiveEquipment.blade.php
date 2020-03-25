@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"receiveEquipment")
@section('Content')

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 18px; color:white;">การรับอุปกรณ์</span>
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
                        <div class="font-weight-bold  text-uppercase  mb-1">ที่อนุมัติแล้ว</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount->totalall}} คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-envelope fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-15 col-15 mb-4">
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 17px; color:white;">ตารางแสดงคำร้องขอที่อนุมัติแล้ว</span>
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
                            @for ($i = 0; $i < count($requirement); $i++)
                            <tr>
                                <td rowspan="1" colspan="1">{{$i+1}}</td>
                                <td rowspan="1" colspan="1">{{$requirement[$i]->ReqDate}}</td>
                                <td rowspan="1" colspan="1">R{{sprintf("%06d", $requirement[$i]->RID)}}</td>
                                <td rowspan="1" colspan="1">{{$requirement[$i]->fullnameMe}}</td>
                                <td rowspan="1" colspan="1">
                                <button type="button" class="btn btn-info btn-sm tt btninfo" RID="{{$requirement[$i]->RID}}" Mname="{{$requirement[$i]->fullnameMe}}" Anname="{{$requirement[$i]->fullnameAdv}}" token="{{csrf_token()}}"title='รายละเอียดคำร้อง'>
                                        <i class="fas fa-file-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm tt delbtn" nameitem="1" data-toggle="tooltip" title="ลบคำร้อง" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
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
            <form method="post" id="info" name="info" action="./receiveEquipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รับอุปกรณ์ </h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="col-xl-15 col-15 mb-4" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="RID" id="RID" value="">

                                <div class="row mb-2">
                                    <div class="col-xl-5 col-2 text-right">
                                        <br><label style="font-size: 20px">หมายเลขคำร้อง : </label>
                                    </div>
                                    <div class="col-xl-5 col-3 ">
                                        <br><output type="text" id="dt1" class="form-control"  >E0163-10000000001
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label style="font-size: 18px">ชื่อ-สกุล : </label>
                                    </div>
                                    <div class="col-xl-5 col-3 ">
                                        <output type="text" class="form-control"  id="dt2">นายโสภณ โตใหญ่
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label style="font-size: 18px" >อาจารย์ที่รับผิดชอบ : </label>
                                    </div>
                                    <div class="col-xl-5 col-3 ">
                                        <output type="text" class="form-control"  id="dt3">นางสาวนุชนาฎ สัตยากวี
                                    </div>
                                </div>
                                <br>
                                <div id="dataInfo">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success " id="a_cancelInfo" >ยืนยัน</button>
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
        $('.btninfo').click(function() {

            $('#dt1').text("R"+('000000' + $(this).attr('RID')).substr(-6))
            $('#dt2').text($(this).attr('Mname'))
            $('#dt3').text($(this).attr('Aname'))
            $('#RID').val($(this).attr('RID'))
            var token =$(this).attr('token')
            var id =$(this).attr('RID')

            $.ajax({
                    url: '../DetailByReceive',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        RID:id
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        $('#dataInfo').html(data.datatable)
                        $("#infoModal").modal();
                    }
                });
       });
        $(".delbtn").click(function() {
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
