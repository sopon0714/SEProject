@extends('./layoutAdmin')
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
                    <span class="link-active " style="font-size: 15px; color:white;"><h5>แสดงความคิดเห็น</h5></span>
                </div>
            </div>
        </div>
    </div>
    {{-- ปิดแสดงความคิดเห็น --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="h5 m-0 font-weight-bold text-dark">ข้อเสนอแนะ</h6>
        </div>
        <div class="card-body">
            <div class="col-sm-12 col-md-12">
                <div>
                    <input type="search" class="form-control form-control-sm-5" style="height:200px" placeholder="" aria-controls="dataTable"><br>
                </div>
            </div>
            {{-- style="text-align:right" --}}
            <div style="margin-left:93%">
                <button type="button" class="btn btn-info btn-xl tt btnsend" title='ส่งข้อเสนอแนะ'><i class="fas fa-paper-plane" onclick="<?php echo "aaa"?>"></i> ส่ง</button>
            </div>
        </div>
@endsection
@section('modal')
{{-- modal ส่งข้อความสำเร็จ --}}
<div class="modal fade" id="sendModal" name="sendModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
                <div class="info" style="font-size: 20px">
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-12">
                                <div align="center">
                                    <img src="https://cdn.pixabay.com/photo/2017/04/08/18/17/correct-2214020_960_720.png" width="250" >
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
       $('.btnsend').click(function() {
            $("#sendModal").modal();
       });
    });
</script>
@endsection
