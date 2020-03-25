@extends('./layoutAdmin')
@section('title',"Setting")
@section('CSS')

@endsection
@section('Content')
    {{-- เปิดอนุมัติคำร้องขอ --}}
    {{-- ขึ้นบรรทัดใหม่ class="row" --}}
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg " style="background-color: #bf4040">
                    <span class="link-active " style="font-size: 15px; color:white;"><h5>ตั้งค่าระบบ</h5></span>
                </div>
            </div>
        </div>
    </div>
    {{-- ปิดอนุมัติคำร้องขอ --}}
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card" style="text-align: center">
                <div class="row">
                    <div class="col-xl-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-right">
                                    <button type="button" class="btn btn-warning btn-xl btnedit tt" data-toggle="tooltip" title="แก้ไขการตั้งค่า" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i> แก้ไข</button>
                                </div>
                                <br>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>จำนวนวันในการยกเลิกคำร้องหลังมีการอนุมัติ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control text-left" id="day" value="{{$detail_setting[0]->coonfig_value}}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>เบอร์โทรติดต่อ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="tel" value="{{$detail_setting[1]->coonfig_value}}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>E-mail ของระบบ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="email" value="{{$detail_setting[2]->coonfig_value}}" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>เวลาตรวจสอบคำร้องที่เกินระยะเวลา :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="time" value="{{$detail_setting[3]->coonfig_value}}" disabled>
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
{{-- modal แก้ไขการตั้งค่า --}}
@section('modal')
<div class="modal fade" id="editsetting" name="editsetting" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 90%">
        <div class="modal-content">
            <form method="post" id="edit_setting" name="edit_setting" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">แก้ไขการตั้งค่า</h4>
                    </div>
                    <div class="modal-body" id="editsettingBody">
                        <div class="container" style="font-size: 18px">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>จำนวนวันในการยกเลิกคำร้องหลังมีการอนุมัติ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="number" class="form-control text-left" id="day_update" value="{{$detail_setting[0]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>เบอร์โทรติดต่อ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="tel_update" value="{{$detail_setting[1]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>E-mail ของระบบ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="email_update" value="{{$detail_setting[2]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>เวลาตรวจสอบคำร้องที่เกินระยะเวลา :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="time_update" value="{{$detail_setting[3]->coonfig_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success cancel" id="submit_editset" data-dismiss="modal">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="calcel_editset" data-dismiss="modal">ยกเลิก</button>
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
       $('.btnedit').click(function() {
            $("#editsetting").modal();
       });
       $(".btndelete").click(function() {
            var nameitem = $(this).attr('nameitem');
            var token = $(this).attr('token')
            swal({
                title: "คุณต้องการลบ",
                text: "ข้อเสนอแนะ: "+nameitem+" หรือไม่ ?",
                icon: "warning",
                buttons: true,
                buttons: ["ยกเลิก", "ยืนยัน"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: 'readComments',
                        type: 'DELETE',
                        async : false,
                        data:{
                            _method:'delete',
                            _token:token,
                            reqID:nameitem
                        },
                        success: function(result) {
                            swal("ลบรายการสำเร็จเรียบร้อยแล้ว", {
                                icon: "success",
                                buttons: false
                            });
                            setTimeout(function() {
                                location.reload();
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
