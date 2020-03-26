@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
@section('title',"Comment")
@section('CSS')

@endsection
@section('Content')
    {{-- เปิดแสดงความคิดเห็น --}}
    {{-- ขึ้นบรรทัดใหม่ class="row" --}}
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg " style="background-color: #bf4040">
                    <span class="link-active" style="font-size: 18px; color:white;">แสดงความคิดเห็น</span>
                </div>
            </div>
        </div>
    </div>
    {{-- ปิดแสดงความคิดเห็น --}}
    {{-- เปิด txt --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3" style="background-color: #bf4040">
            <span class="link-active" style="font-size: 17px; color:white">ข้อเสนอแนะ</span>
        </div>
        <div class="card-body" id="AddBody">
            <div class="container">
                <form method="POST" action="comment">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-sm-12 col-md-12">
                        <div>
                            <textarea rows="6" cols="50" name="detailComment" class="form-control form-control-sm-5"></textarea><br>
                        </div>
                    </div>
                    {{-- ปุ่มส่ง --}}
                    <div style="margin-left:93%">
                        <button type="submit" id ="detailComment_1" class="btn btn-success btn-xl tt btnsend" data-toggle="tooltip" title='ส่งข้อเสนอแนะ'><i class="fas fa-paper-plane"></i> ส่ง</button>
                        {{-- uid="{{$TableComment[$i]->UID}}" nDetail="{{$TableComment[$i]->Detail}}" token="{{ csrf_token() }}" --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ปิด txt --}}
@endsection
{{-- @section('modal')
<div class="modal fade" id="sendModal" name="sendModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 30%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-center">
                                    <img src="https://lh3.googleusercontent.com/proxy/YA66_7schs3qTv8LbQdrWTSEHbzr8c01IUvpwK0HS762JLcszFMNSsR47PcFApVLehfyRPVGsYBKxUhvgd9amm9hTJuMtI_jI1yCnhte-Ir7fiOvraWGVDjJ" width="300">
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
@endsection --}}
@section('Javascript')
<script>
    $(document).ready(function() {
       $(".btnsend").click(function() {
            var name = $(this).attr('nDetail')
            var id = $(this).attr('uid')
            var token = $(this).attr('token')
                swal({
                    title: "คุณต้องการส่งข้อเสนอแนะหรือไม่?",
                    icon: "warning",
                    buttons: true,
                    buttons: ["ยกเลิก", "ยืนยัน"],
                    dangerMode: true,
                })
                .then((willSend) => {
                    if (willSend) {
                        $.ajax({
                            url: 'comment',
                            type: 'post',
                            async : false, //เวลาส่งค่าจะรอจนกว่าจะส่งค่ากลับมา
                            data:{
                                // _method:'post',
                                _token:token,
                                UID:id
                            },
                            success: function(result) {
                                swal("ส่งข้อความสำเร็จ", {
                                    icon: "success",
                                    buttons: false
                                });
                                setTimeout(function() {
                                    window.location.replace("commemt"); //โหลดหน้าเดิม
                                }, 1500);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status);
                                alert(thrownError);
                            }
                        });
                    } else {
                        swal("ส่งข้อความไม่สำเร็จ",{
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
