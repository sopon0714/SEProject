@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[0]->totalall}} รายการ</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list-ul fa-2x"></i>
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
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$amount[0]->totaluse}} รายการ</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-list-ol fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <a style="text-decoration: none">
        <div class="card border-left-primary card-color-add shadow h-100 py-2" id="add" style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mb-2">
                        <div class="h5 mb-2 font-weight-bold text-xl text-info">เพิ่มรายการอุปกรณ์</div>
                    </div>
                    <div class="col-auto ">
                        <button class="btn btn-success " onclick=""><i class="far fa-calendar-plus fa-2x"></i></button>
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
            <div class="card-body"  >
                <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <div class="search" >
                        <div class="row mb-2">
                            <div class="col-xl-5 col-2 text-right">
                                <label style="font-size: 18px">ชื่ออุปกรณ์ : </label>
                            </div>
                            <div class="col-xl-6 col-6 ">
                                <input type="text" class="form-control-sm" name="note"><br />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-xl-5 col-2 text-right">
                                <label for="category" style="font-size: 18px">หมวดหมู่อุปกรณ์ : </label>
                            </div>
                            <div class="col-xl-6 col-6 ">
                                <select id="categorySearch">
                                    <option value="">ทั้งหมด</option>
                                    @for ($i = 0; $i < count($category); $i++)
                                         <option value="{{$category[$i]->CID}}">{{$category[$i]->CName}}</option>
                                     @endfor
                                </select>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-xl-5 col-2 text-right">
                                <label for="category" style="font-size: 18px">สถานะอุปกรณ์ : </label>
                            </div>
                            <div class="col-xl-2">
                                <input type="radio" name="gender" value="male" checked> ทั้งหมด
                            </div>
                            <div class="col-xl-2">
                                <input type="radio" name="gender" value="female"> ยืมได้
                            </div>
                            <div class="col-xl-2">
                                <input type="radio" name="gender" value="other"> ยืมไม่ได้
                            </div>
                        </div>

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
    <div class="card"  >
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 17px; color:white;">ตารางแสดงรายการอุปกรณ์ทั้งหมด</span>
        </div>
        <div class="card-body" >
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                <table class="table table-bordered" id="historyRequirementsTable " style="text-align:center;"  swidth="100%"  cellspacing="0">
                    <thead>
                        <tr role="row" >
                            <th rowspan="1" colspan="1">ลำดับ</th>
                            <th rowspan="1" colspan="1">ชื่ออุปกรณ์</th>
                            <th rowspan="1" colspan="1">หมวดหมู่อุปกรณ์</th>
                            <th rowspan="1" colspan="1">สถานะ</th>
                            <th rowspan="1" colspan="1">จำนวนทั้งหมด</th>
                            <th rowspan="1" colspan="1">จำนวนที่ยืมได้</th>
                            <th rowspan="1" colspan="1">รายละเอียด</th>
                            <th rowspan="1" colspan="1">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($TableListEquipment); $i++)
                            <tr>
                                <td rowspan="1" colspan="1">{{$i+1}}</td>
                                <td rowspan="1" colspan="1">{{$TableListEquipment[$i]->EName}}</td>
                                <td rowspan="1" colspan="1">{{$TableListEquipment[$i]->CName}}</td>
                                <td rowspan="1" colspan="1">{{$TableListEquipment[$i]->ELStatus}}</td>
                                <td rowspan="1" colspan="1">{{$TableListEquipment[$i]->totalall}}</td>
                                <td rowspan="1" colspan="1">{{$TableListEquipment[$i]->totaluse}}</td>
                                <td rowspan="1" colspan="1">
                                    <a href="/detailEquipment/{{$TableListEquipment[$i]->ELID}}">
                                        <button type="button" class="btn btn-info btn-sm tt btninfo" title='รายละเอียดรายการอุปกรณ์'>
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </a>
                                </td>
                                <td rowspan="1" colspan="1">
                                    <button type="button" class="btn btn-warning btn-sm tt editbtn" data-toggle="tooltip" title="แก้ไขรายการอุปกรณ์" ELID ="{{$TableListEquipment[$i]->ELID}}" token="{{ csrf_token() }}" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm tt delbtn" data-toggle="tooltip" title="ลบรายการอุปกรณ์" ELID ="{{$TableListEquipment[$i]->ELID}}" Ename ="{{$TableListEquipment[$i]->EName}}" token="{{ csrf_token() }}" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" ></i></button>
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
{{-- modal แสดงการเพิ่มอุปกรณ์ --}}
<div class="modal fade" id="addModal" name="addModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="addEqui" name="addEqui" action="listEquipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">เพิ่มรายการอุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >ชื่ออุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" name="ELName"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >ยี่ห้ออุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" name="brand"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >รายละเอียด : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" name="note"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >หมวดหมู่อุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <select  name="category">
                                        @for ($i = 0; $i < count($category); $i++)
                                                <option value="{{$category[$i]->CID}}">{{$category[$i]->CName}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label for="category" >สถานะอุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-2 col-6 ">
                                    <input type="radio" name="status" value="ยืมได้" checked> ยืมได้
                                </div>
                                <div class="col-xl-3 col-6">
                                    <input type="radio" name="status" value="ยืมไม่ได้"> ยืมไม่ได้
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label for="category" >สิทธิ์การยืมอุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-3 col-6 ">
                                    <input type="checkbox"  name="right[]" value="3" >
                                    <label for="right3">เจ้าหน้าที่</label><br>
                                </div>
                                <div class="col-xl-3 col-6 ">
                                    <input type="checkbox"  name="right[]" value="2">
                                    <label for="right2">อาจารย์</label><br>
                                </div>
                                <div class="col-xl-2 col-6 ">
                                    <input type="checkbox"  name="right[]" value="1">
                                    <label for="right1">นิสิต</label><br>
                                </div>
                            </div>
                            <div class="row mb-2" id="statusSN">
                                <div class="col-xl-4 col-2 text-right">
                                    <label for="category" >เลขครุภัณฑ์ : </label>
                                </div>
                                <div class="col-xl-2 col-6 ">
                                    <input type="radio"  name="statusSN" value="1"> มี
                                </div>
                                <div class="col-xl-2 col-6">
                                    <input type="radio"  name="statusSN" value="0" checked> ไม่มี
                                </div>
                            </div>
                            <div id="addinfo">
                                <div class="row mb-2">
                                    <div class="col-xl-4 col-2 text-right">
                                        <label >จำนวนอุปกรณ์</label>
                                    </div>
                                    <div class="col-xl-2 col-2 ">
                                        <input type="number" name="number" min="1" max = "100" ><br />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success ok"  >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel"  data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal แก้ไขการเพิ่มอุปกรณ์ --}}
<div class="modal fade" id="editModal" name="editModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post"  name="addEqui" action="listEquipment">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">แก้ไขรายการอุปกรณ์</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" id="ELID"name="ELID" value="">:
                        <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >ชื่ออุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" id="ELName" name="ELName"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >ยี่ห้ออุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" id="brand" name="brand"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >รายละเอียด : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <input type="text" id="note" name="note"><br />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label >หมวดหมู่อุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <select id="category" name="category">
                                        @for ($i = 0; $i < count($category); $i++)
                                                <option value="{{$category[$i]->CID}}">{{$category[$i]->CName}}</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label for="category" >สถานะอุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-2 col-6 ">
                                    <input type="radio" id="status" name="status" value="ยืมได้" > ยืมได้
                                </div>
                                <div class="col-xl-3 col-6">
                                    <input type="radio" id="status2"name="status" value="ยืมไม่ได้"> ยืมไม่ได้
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-xl-4 col-2 text-right">
                                    <label for="category" >สิทธิ์การยืมอุปกรณ์ : </label>
                                </div>
                                <div class="col-xl-3 col-6 ">
                                    <input type="checkbox" id="right3" name="right[]" value="3" >
                                    <label for="right3">เจ้าหน้าที่</label><br>
                                </div>
                                <div class="col-xl-3 col-6 ">
                                    <input type="checkbox" id="right2" name="right[]" value="2">
                                    <label for="right2">อาจารย์</label><br>
                                </div>
                                <div class="col-xl-2 col-6 ">
                                    <input type="checkbox" id="right1" name="right[]" value="1">
                                    <label for="right1">นิสิต</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success ok"  >ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel"  data-dismiss="modal">ปิด</button>
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


        $("#statusSN [name]").change(function(){
           var status=  $(this).val();
           if(status == 0)
           {
                $("#addinfo").html(" <div class=\"row mb-2\"><div class=\"col-xl-4 col-2 text-right\"><label style=\"font-size: 18px\">จำนวนอุปกรณ์</label></div><div class=\"col-xl-2 col-2 \"><input type=\"number\" name=\"number\" min=\"1\" max = \"100\" ><br /></div></div>");
           }
           else{
            $("#addinfo").html("<div class=\"row mb-2\">"+
                                    "<div class=\"col-xl-4 col-2 text-right\">"+
                                    "     <label style=\"font-size: 18px\">กรุณากรอกเลขครุภัณฑ์:</label>"+
                                    " </div>"+
                                    " <div class=\"col-xl-6 col-2 \">"+
                                    "     <input class=\"form-control\" name=\"fieldsSNumber[]\" type=\"text\" placeholder=\"เลขครุภัณฑ์\" required />"+
                                    " </div>"+
                                    " <div class=\"col-xl-2 col-2 \">"+
                                    "     <button class=\"btn btn-success btnaddSNumber\" type=\"button\">"+
                                    "         <i class=\"fas fa-plus\"></i>"+
                                    "     </button>"+
                                    " </div>"+
                                "</div>");
           }

        });
        $("body").delegate(".btnaddSNumber", "click", function(){
            $(this).html("<i class=\"fas fa-minus\"></i>").removeClass("btn-success").addClass("btn-danger").removeClass("btnaddSNumber").addClass("btnremoveSNumber");
            $("#addinfo").append("<div class=\"row mb-2\">"+
                                    "<div class=\"col-xl-4 col-2 text-right\">"+
                                    "     <label style=\"font-size: 18px\">กรุณากรอกเลขครุภัณฑ์:</label>"+
                                    " </div>"+
                                    " <div class=\"col-xl-6 col-2 \">"+
                                    "     <input class=\"form-control\" name=\"fieldsSNumber[]\" type=\"text\" placeholder=\"เลขครุภัณฑ์\" />"+
                                    " </div>"+
                                    " <div class=\"col-xl-2 col-2 \">"+
                                    "     <button class=\"btn btn-success btnaddSNumber\" type=\"button\">"+
                                    "         <i class=\"fas fa-plus\"></i>"+
                                    "     </button>"+
                                    " </div>"+
                                "</div>");
        });
        $("body").delegate(".btnaddSNumber", "click", function(){
            $(this).remove();
        });
        $('#addModal').on('hidden.bs.modal', function() {
            $("#addinfo").html(" <div class=\"row mb-2\"><div class=\"col-xl-4 col-2 text-right\"><label style=\"font-size: 18px\">จำนวนอุปกรณ์</label></div><div class=\"col-xl-2 col-2 \"><input type=\"number\" name=\"number\" min=\"1\" max = \"100\" ><br /></div></div>");
            $(this).find('form').trigger('reset');
        })
        $('#editModal').on('hidden.bs.modal', function() {
            $("#right1").removeAttr('checked');
            $("#right2").removeAttr('checked');
            $("#right3").removeAttr('checked');
        })
        $('#add').click(function() {
            $("#addModal").modal();

       });
        $('.editbtn').click(function() {
            var id =  $(this).attr('ELID')
            var token = $(this).attr('token')
            $.ajax({
                    url: 'listEquipment/byID',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        ELID:id
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        console.table(data);
                        $('#ELID').val(id);
                        $('#ELName').val(data.EName);
                        $('#brand').val(data.Brand);
                        $('#note').val(data.Detail);
                        $('#category').val(data.CID);
                        if(data.ELStatus=="ยืมได้"){
                            $('#status').attr("checked", "checked");
                            $("#status2").removeAttr('checked');
                        }
                        else if(data.ELStatus=="ยืมไม่ได้"){
                            $('#status2').attr("checked", "checked");
                            $("#status").removeAttr('checked');
                        }

                        if(data.rights1== true){
                            $('#right1').attr("checked", "checked");
                        }
                        if(data.rights2== true){
                            $('#right2').attr("checked", "checked");
                        }
                        if(data.rights3== true){
                            $('#right3').attr("checked", "checked");
                        }
                        $("#editModal").modal();
                    }
                });

       });
        $(".delbtn").click(function() {
            var id =  $(this).attr('ELID')
            var Ename = $(this).attr('Ename')
            var token = $(this).attr('token')
            swal({
                title: "คุณต้องการลบ",
                text: Ename+" หรือไม่ ?",
                icon: "warning",
                buttons: true,
                buttons: ["ยกเลิก", "ยืนยัน"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'listEquipment',
                        type: 'DELETE',
                        async : false,
                        data:{
                            _method:'delete',
                            _token:token,
                            ELID:id
                        },
                        success: function(result) {
                            swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                                icon: "success",
                                buttons: false
                            });
                            setTimeout(function() {
                                window.location.replace("listEquipment");
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
