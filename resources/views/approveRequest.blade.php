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
    {{-- ขึ้นบรรทัดใหม่ --}}
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
                        <button type="button" class="btn btn-info btn-xl tt" title='รายละเอียดการยืนยันคำร้อง'><i class="fas fa-file-alt"></i></button>
                        <button type="button" class="btn btn-danger btn-xl tt" data-toggle="tooltip" title="ยกเลิกการอนุมัติ" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                    </td>
                </tbody>
            </table>
        </div>
    </div>
@endsection
