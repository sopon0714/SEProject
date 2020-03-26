@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"Category")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 18px; color:white;">หมวดหมู่อุปกรณ์</span>
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
                        <div class="font-weight-bold  text-uppercase  mb-1">จำนวนหมวดหมู่อุปกรณ์ทั้งหมด</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[0]->amount }} หมวดหมู่</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tools fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2 btnadd"
            data-toggle="modal" data-target="#modal-1"  style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-2">เพิ่มหมวดหมู่อุปกรณ์</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 หมวดหมู่</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-success " ><i class="fas fa-laptop-medical fa-2x"></i></button>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางหมวดหมู่อุปกรณ์</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered TableFilter" id="Table_E" width="100%" cellspacing="0" style="width: 90%" align="center">
                        <colgroup>
                            <col width="20%">
                            <col width="40%">
                            <col width="20%">
                            <col width="20%">
                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อหมวดหมู่อุปกรณ์</th>
                            <th>จำนวนรายการอุปกรณ์</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            @for ($i = 0; $i < count($TableCategorys); $i++)
                            <tr>
                                <td class="text-center">{{$i+1}}</td>
                                <td>{{$TableCategorys[$i]->CName}}</td>
                                <td class="text-center">{{$TableCategorys[$i]->amount}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm tt mr-sm-1 btnedit" data-toggle="tooltip" title="แก้ไขหมวดหมู่อุปกรณ์" cid="{{$TableCategorys[$i]->CID}}" cname ="{{$TableCategorys[$i]->CName}}"data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm tt btndelete" cid="{{$TableCategorys[$i]->CID}}" cname ="{{$TableCategorys[$i]->CName}}" token="{{ csrf_token() }}" data-toggle="tooltip" title="ลบหมวดหมู่อุปกรณ์" data-original-title="ลบ"><i class="far fa-trash-alt"></i></button>
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
$(document).ready(function() {
    $('.btnadd').click(function() {
        $("#addE").modal();
    });
    $('.btnedit').click(function() {
        $("#editnameCategory").val($(this).attr('cname'))
        $("#idCategory").val($(this).attr('cid'))
        $("#editE").modal();
    });
    $(".btndelete").click(function() {
        var name =  $(this).attr('cname')
        var id = $(this).attr('cid')
        var token = $(this).attr('token')
            swal({
                title: "คุณต้องการลบ",
                text: name+" หรือไม่ ?",
                icon: "warning",
                buttons: true,
                buttons: ["ยกเลิก", "ยืนยัน"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'category',
                        type: 'DELETE',
                        async : false,
                        data:{
                            _method:'delete',
                            _token:token,
                            CID:id
                        },
                        success: function(result) {
                            swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                                icon: "success",
                                buttons: false
                            });
                            setTimeout(function() {
                                window.location.replace("category");
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
});
</script>
@endsection
@section('modal')
{{-- modal เพิ่มหมวดหมู่อุปกรณ์ --}}
<div class="modal fade" id="addE" name="addE" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="add_E" name="add_E" action="category">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มหมวดหมู่อุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="AddEBody">
                        <div class="container">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row mb-0">
                                <div class="col-xl-5 col-2 text-right">
                                    <br><span>ชื่อหมวดหมู่อุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br><input type="text" class="form-control form-control-sm-5" name ="nameCategory">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="addE_submit" >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="addE_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal แก้ไขหมวดหมู่อุปกรณ์ --}}
<div class="modal fade" id="editE" name="editE" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="add_E" name="add_E" action="category">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #FF9900;">
                        <h4 class="modal-title" style="color: white">แก้ไข้หมวดหมู่อุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="EditEBody">
                        <div class="container">
                            <input type="hidden" name="_method" value="put" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row mb-0">
                                <div class="col-xl-5 col-2 text-right">
                                    <br><span>ชื่อหมวดหมู่อุปกรณ์:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <br>
                                    <input type="text" id="editnameCategory" name="nameCategory" class="form-control form-control-sm-5"  aria-controls="dataTable">
                                    <input type="hidden" id="idCategory" name="idCategory" class="form-control form-control-sm-5"  aria-controls="dataTable">
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success submit" id="editE_submit" >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="editE_cancel" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
