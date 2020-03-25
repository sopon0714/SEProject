@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
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
                    <span class="link-active " style="font-size: 18px; color:white;">ตั้งค่าระบบ</span>
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
                    <div class="modal-header header-modal" style="background-color: #FF9900;">
                        <h4 class="modal-title" style="color: white">แก้ไขการตั้งค่า</h4>
                    </div>
                    <div class="modal-body" id="editsettingBody">
                        <div class="container" style="font-size: 18px">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>จำนวนวันในการยกเลิกคำร้องหลังมีการอนุมัติ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="number" class="form-control text-left" id="day_update" name="day_update" value="{{$detail_setting[0]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>เบอร์โทรติดต่อ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="tel_update" name="tel_update" value="{{$detail_setting[1]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>E-mail ของระบบ :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="email_update" name="email_update" value="{{$detail_setting[2]->coonfig_value}}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <label>เวลาตรวจสอบคำร้องที่เกินระยะเวลา :</label>
                                </div>
                                <div class="col-xl-6 col-5 text-center">
                                    <input type="text" class="form-control" id="time_update" name="time_update" value="{{$detail_setting[3]->coonfig_value}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btnsubmit cancel" id="submit_editset" data-dismiss="modal">ยืนยัน</button>
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
        // แก้ไข
        $('.btnedit').click(function() {
                $("#editsetting").modal();
        });
        // ยืนยัน
        $(".btnsubmit").click(function() {
                swal({
                    title: "คุณต้องการแก้ไขการตั้งค่าหรือไม่?",
                    icon: "warning",
                    buttons: true,
                    buttons: ["ยกเลิก", "ยืนยัน"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: 'setting',
                            type: 'EDIT',
                            async : false,
                            data:{
                                _method:'edit',
                            },
                            success: function(result) {
                                swal("แก้ไขการตั้งค่าสำเร็จ", {
                                    icon: "success",
                                    buttons: false
                                });
                                setTimeout(function() {
                                    location.reload();
                                }, 1500);
                            }
                        });
                    } else {
                        swal("แก้ไขการตั้งค่าไม่สำเร็จ ",{
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
