@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"Detail Equipment")
@section('CSS')
<style>

</style>
@endsection
@section('Content')

{{-- <div class=" col-12 mb-4" style="text-align: right">
    <a href="../listEquipment" >
        <button type="button" id="btn_info" class="btn btn-warning">ย้อนกลับ</button>
    </a>
</div> --}}

<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg "  style="background-color: #bf4040;height: 50px">
                <div class="row">
                    <span class="link-active " style="font-size: 15px; color:white;"><h5>รายละเอียดอุปกรณ์</h5></span>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount->totalall}} ชิ้น</div>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$InfoEL->ELStatus!='ยืมไม่ได้'?$amount->totaluse:0}} ชิ้น</div>
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
    <div class=" col-3 mb-4" style="text-align: right">
        <a href="../listEquipment" >
            <button type="button" id="btn_info" class="btn btn-warning">ย้อนกลับ</button>
        </a>
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
                            <col width="100">
                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>เลขครุภัณฑ์</th>
                            <th>สถานะอุปกรณ์</th>
                            <th>รายละเอียด</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            @for ($i = 0; $i < count($DATA); $i++)
                                <tr>
                                    <td class="text-center">{{$i+1}}</td>
                                    <td >{{$DATA[$i]->SNumber==""?"(ไม่มีเลขครุภัณฑ์)":$DATA[$i]->SNumber}}</td>
                                    <td class="text-center">{{$DATA[$i]->EStatus}}</td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-info btn-sm tt mr-sm-1 btndetail" EID="{{$DATA[$i]->EID}}" token="{{ csrf_token() }}"title='รายละเอียดอุปกรณ์'>
                                        <i class="fas fa-file-alt"></i></button>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning btn-sm tt mr-sm-1 btnedit" EID="{{$DATA[$i]->EID}}" Snumber="{{$DATA[$i]->SNumber=='' ? '':$DATA[$i]->SNumber}}"data-toggle="tooltip" title="แก้ไขข้อมูลอุปกรณ์" data-original-title="แก้ไข">
                                    <i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm tt btndelete" EID="{{$DATA[$i]->EID}}" Snumber="{{$DATA[$i]->SNumber=='' ? '(ไม่มีเลขครุภัณฑ์)':$DATA[$i]->SNumber}}" token="{{ csrf_token() }}" data-toggle="tooltip" title="ลบอุปกรณ์" data-original-title="ลบ">
                                    <i class="far fa-trash-alt" ></i></button>
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
{{-- รายละเอียดอุปกรณ์ --}}
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-2">ข้อมูลอุปกรณ์</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ชื่อ : {{$InfoEL->EName}}</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ยี่ห้อ : {{$InfoEL->Brand}}</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">สถานะ : {{$InfoEL->ELStatus}}</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">หมวดหมู่ : {{$InfoEL->CName}}</div>
                        <div class="font-weight-bold  text-uppercase textarea ">รายละเอียด<br> {{$InfoEL->Detail}}</div>
                    </div>
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
        var id = $(this).attr('EID');
        var token = $(this).attr('token');
        $.ajax({
                    url: '../DetailByEID',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        EID:id
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        // console.table(data);
                        // console.log(data.InfoE.EName)
                        $('#dt1').text(data.InfoE.EName);
                        $('#dt2').text(data.InfoE.SNumber);
                        $('#dt3').text(data.InfoE.Brand);
                        $('#dt4').val(data.InfoE.Detail);
                        // console.log(data.datatable)
                        $('#dataInfo2').empty();
                        $('#dataInfo2').append(data.datatable);
                         $("#detailDE").modal();
                    }
                });

    });
    $('.btnedit').click(function() {
        var id = $(this).attr('EID');
        var Snumber = $(this).attr('Snumber');
        $('#Snumber').val(Snumber);
        $('#EID').val(id);
        $("#editDE").modal();
    });
    $(".btndelete").click(function() {
            var id = $(this).attr('EID');
            var Snumber = $(this).attr('Snumber');
            var token = $(this).attr('token');
            swal({
                title: "คุณต้องการลบ",
                text: "เลขครุภัณฑ์: "+Snumber+" หรือไม่ ?",
                icon: "warning",
                buttons: true,
                buttons: ["ยกเลิก", "ยืนยัน"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {

                     $.ajax({
                        url: './{{$ELID}}',
                        type: 'DELETE',
                        async : false,
                        data:{
                            _method:'delete',
                            _token:token,
                            EID:id,
                            ELID:{{$ELID}}
                        },
                        success: function(result) {
                            swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                                icon: "success",
                                buttons: false
                            });
                            setTimeout(function() {
                                window.location.replace("./{{$ELID}}");
                            }, 1500);
                        }
                    });
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
            <form method="post" id="edit_DE" name="edit_DE" action="./{{$ELID}}">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #FF9900;">
                        <h4 class="modal-title" style="color: white">แก้ไขข้อมูลอุปกรณ์</h4>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="EID" id="EID" value="">
                    <input type="hidden" name="ELID" value="{{$ELID}}">
                    <div class="modal-body" id="EditDEBody">
                        <div class="container">
                            <div class="row mb-0">
                                <div class="col-xl-4 col-2 text-right">
                                    <br><span>เลขครุภัณฑ์ :</span>
                                </div>
                                <div class="col-xm-8 col-6 ">
                                    <br><input type="text" class="form-control form-control-sm-5" id="Snumber" name="Snumber"  aria-controls="dataTable">
                                </div>
                                {{-- <div class="col-xl-12 col-12 text-center">
                                    <br><span class="text-danger" style="font-size: 16px" >*หากไม่มีเลขครุภัณฑ์ กด ยืนยันเพื่อเพิ่มได้ทันที</span>
                                </div> --}}
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
            <form method="post" id="add_DE" name="add_DE" action="./{{$ELID}}">
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
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="ELID" value="{{$ELID}}">
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="text" class="form-control form-control-sm-5" name="EName" aria-controls="dataTable">
                                </div>
                                <div class="col-xl-12 col-12 text-center">
                                    <br><span class="text-danger" style="font-size: 16px" >*หากไม่มีเลขครุภัณฑ์ไม่ต้องทำการกรอกค่าใดๆ</span>
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
                                <div class="col-xl-4 col-2 text-right">
                                    <br><span>ชื่อ: </span>
                                </div>
                                <div class="col-xl-8 col-6 ">
                                    <br><span id="dt1">เมาส์</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>เลขครุภัณฑ์: </span>
                                </div>
                                <div class="col-xl-8 col-6 ">
                                    <span id="dt2">xxxxxxxxxxx-xxxxxxx/60</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>ยี่ห้อ: </span>
                                </div>
                                <div class="col-xl-8 col-6 ">
                                    <span id="dt3">logitech</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-4 col-2 text-right">
                                    <span>รายละเอียด: </span>
                                </div>
                                <div class="col-xl-8 col-6 ">
                                    <textarea id="dt4" class="form-control form-control-sm-5" style="height:120px"  aria-controls="dataTable"
                                        value="xxxxxxxxxxxxxxxxxx" disabled></textarea>
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
                                        <tbody id="dataInfo2">

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
