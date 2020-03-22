@extends('./layoutAdmin')
@section('title',"Approve Request")
@section('CSS')

@endsection
@section('Content')
    <style>
        .table-secondary {
        background-color: #ffffff;
        }
    </style>
    {{-- เปิดอนุมัติคำร้องขอ --}}
    {{-- ขึ้นบรรทัดใหม่ class="row" --}}
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg " style="background-color: #bf4040">
                    <span class="link-active " style="font-size: 15px; color:white;"><h5>อนุมัติคำร้องขอ</h5></span>
                </div>
            </div>
        </div>
    </div>
    {{-- ปิดอนุมัติคำร้องขอ --}}
    {{-- เปิดจำนวนคำร้องขอ --}}
    <div class="row">
        <div class="col-xl-3 col-12 mb-4">
            <div class="card border-left-primary card-color-four shadow h-100 py-2"
                data-toggle="modal" data-target="#modal-1" >
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="font-weight-bold  text-uppercase mb-2 text-right">จำนวนคำร้องขอที่รอยืนยัน</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-right" >xxx คำร้อง</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ปิดจำนวนคำร้องขอ --}}
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="row">
                    <div class="col-xl-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-header card-bg " style="background-color: #bf4040">
                                <span class="link-active " style="font-size: 15px; color:white;"><h5>ตารางอนุมัติคำร้องขอ</h5></span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- เริ่มตาราง --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="width: 90%" align="center">
                            <colgroup>
                                <col width="100">
                                <col width="100">
                                <col width="100">
                                <col width="100">
                                <col width="100">
                            </colgroup>
                            <thead class="table table-secondary">
                                <tr>
                                    {{-- <th>ตัวอักษรหนา --}}
                                    <th style="text-align: center">ลำดับ</th>
                                    <th style="text-align: center">หมายเลขคำร้อง</th>
                                    <th style="text-align: center">วันที่ยื่นคำร้อง</th>
                                    <th style="text-align: center">ชื่อผู้ยื่นคำร้อง</th>
                                    <th style="text-align: center">การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody class="table table-secondary">
                                {{-- <td>ตัวอักษรบาง --}}
                                <td style="text-align: center">1</td>
                                <td style="text-align: center">R00001</td>
                                <td style="text-align: center">15/2/2020</td>
                                <td>นายโสภณ โตใหญ่</td>
                                <td style="text-align: center">
                                    <button type="button" class="btn btn-info btn-sm tt btninfoapprove" title='รายละเอียดการยืนยันคำร้อง'><i class="fas fa-file-alt"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm tt btncancelapprove" data-toggle="tooltip" title="ยกเลิกการอนุมัติ" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
{{-- modal แสดงรายละเอียดการการยืนยันคำร้อง --}}
<div class="modal fade" id="infoapproveModal" name="infoapproveModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="manage.php">
                <div class="info" style="font-size: 17px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รายละเอียดการการยืนยันคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลขคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>R00002</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>วันที่ยื่นคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>15/02/2020</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>ผู้ยื่นคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>นายโสภณ โตใหญ่</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>อาจารย์ที่รับผิดชอบ :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>นางสาว นุชนาฎ สัตยากวี</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>เหตุผลที่ยืม :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>ใช้ในการทำโปรเจ็ค</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-left">
                                    <span>รายการอุปกรณ์ที่ยืม :</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-12 col-2 text-right">
                                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">รายการอุปกรณ์</th>
                                                <th rowspan="1" colspan="1">จำนวน(ชิ้น)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">เมาส์</td>
                                                <td rowspan="1" colspan="1">2</td>
                                            </tr>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">2</td>
                                                <td rowspan="1" colspan="1">จอคอมพิวเตอร์</td>
                                                <td rowspan="1" colspan="1">2</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success cancel" id="a_cancelInfo" data-dismiss="modal">อนุมัติ</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal ยกเลิกการอนุมัติ --}}
<div class="modal fade" id="cancelapproveModal" name="cancelapproveModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="info" name="info" action="manage.php">
                <div class="info" style="font-size: 17px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">ยืนยันการยกเลิกการอนุมัติ</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลขคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <span>R00002</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>เหตุผลที่ยกเลิก :</span>
                                </div>
                                <div class="col-xl-4 col-6 ">
                                    <input type="text" class="form-control" id="reasoncancel" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success cancel" id="a_cancelInfo" data-dismiss="modal">ยืนยัน</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{-- Javascript --}}
@section('Javascript')
<script>
    $(document).ready(function() {
       $('.btninfoapprove').click(function() {
            $("#infoapproveModal").modal();
       });
       $('.btncancelapprove').click(function() {
            $("#cancelapproveModal").modal();
       });
    });
</script>
@endsection
