@extends('./layoutAdmin')
@section('title',"Read Comments")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>ข้อเสนอแนะ</h5></span>
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
                        <div class="font-weight-bold  text-uppercase text-right mb-2">จำนวนข้อเสนอแนะ</div>
                        <div class="font-weight-bold  text-uppercase text-right mb-2">ในเดือนปัจจุบัน</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-right">xxxx ข้อเสนอ</div>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางการจัดการข้อเสนอแนะ</span>
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
                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>วันที่ส่งข้อเสนอแนะ</th>
                            <th>ผู้ส่ง</th>
                            <th>รายละเอียด</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            <td class="text-center">1</td>
                            <td class="text-center">20/03/2020</td>
                            <td >นาย โสภณ โตใหญ่</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm tt mr-sm-1 btndetail" title='รายละเอียดข้อเสนอแนะ'>
                                <i class="fas fa-file-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt btndelete" data-toggle="tooltip" title="ลบข้อเสนอแนะ" data-original-title="ลบ">
                                <i class="far fa-trash-alt" ></i></button>
                            </td>
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

       $('.btndetail').click(function() {

            $("#detailRC").modal();
       });
       $('.btndelete').click(function() {
            $("#deleteRC").modal();
       });
    });
</script>
@endsection
@section('modal')
<div class="modal fade" id="detailRC" name="detailRC" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="detail_RC" name="detail_RC" action="manage.php">
                <div class="info" style="font-size: 20px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">ข้อเสนอแนะ</h4>
                    </div>
                    <div class="modal-body" id="DetailRCBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>ชื่อผู้ส่ง:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>นายโสภณ โตใหญ่</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>วันที่ส่ง:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>20/03/2020</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>รายละเอียด:</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-danger cancel" id="detailRC_cancel" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
