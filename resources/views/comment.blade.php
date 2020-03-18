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
