@extends('./layoutAdmin')
@section('title',"User Profile")
@section('CSS')

@endsection
@section('Content')
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-header card-bg " style="background-color: #bf4040">
                    <span class="link-active " style="font-size: 15px; color:white;"><h5>บัญชีผู้ใช้</h5></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-5 mb-4">
                            <div class="card"  style="height: 400px">
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 15px; color:white;">ข้อมูลผู้ใช้</span>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>คำนำหน้า:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 text-right">
                                            <input type="text" class="form-control" id="title" value="นาย" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>ชื่อ:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 text-right">
                                            <input type="text" class="form-control" id="fname" value="โสภณ" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>นามสกุล:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 text-right">
                                            <input type="text" class="form-control" id="lname" value="โตใหญ่" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>อีเมล:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 text-right">
                                            <input type="text" class="form-control" id="email" value="sopon.to@ku.th" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-4 col-2 text-right">
                                            <span>ชนิดผู้ใช้:</span>
                                        </div>
                                        <div class="col-xl-8 col-8 text-right">
                                            <input type="text" class="form-control" id="type" value="ผู้ดูแลระบบ" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-5 mb-4">
                            <div class="card"  style="height: 400px">
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 15px; color:white;">ประวัติคำร้องขอของตนเอง</span>
                                </div>
                                <div class="card-body" style="height: 400px">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                            <thead>
                                                <tr role="row" >
                                                    <th rowspan="1" colspan="1">วันที่ส่งคำร้อง</th>
                                                    <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                    <th rowspan="1" colspan="1">สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">15/02/2019</td>
                                                    <td rowspan="1" colspan="1">R00003</td>
                                                    <td rowspan="1" colspan="1"><span style="color: #0000cc">รอยืนยัน</span></td>
                                                </tr>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">12/02/2019</td>
                                                    <td rowspan="1" colspan="1">R00002</td>
                                                    <td rowspan="1" colspan="1"><span style="color: #ff0000">ยกเลิก</span></td>
                                                </tr>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">10/02/2019</td>
                                                    <td rowspan="1" colspan="1">R00001</td>
                                                    <td rowspan="1" colspan="1"><span style="color: #33cc33">ยืนยันแล้ว</span></td>
                                                </tr>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">10/02/2019</td>
                                                    <td rowspan="1" colspan="1">R00001</td>
                                                    <td rowspan="1" colspan="1"><span style="color: #33cc33">ยืนยันแล้ว</span></td>
                                                </tr>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">10/02/2019</td>
                                                    <td rowspan="1" colspan="1">R00001</td>
                                                    <td rowspan="1" colspan="1"><span style="color: #33cc33">ยืนยันแล้ว</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card"  >
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 15px; color:white;">ประวัติการยืมอุปกรณ์ของตนเอง</span>
                                </div>
                                <div class="card-body">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                                        <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                            <thead>
                                                <tr role="row">
                                                    <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                    <th rowspan="1" colspan="1">วันที่รับอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">เจ้าหน้าที่ที่มอบอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">วันที่คืนอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">เจ้าหน้าที่ที่รับอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">สถานะการยืม</th>
                                                    <th rowspan="1" colspan="1">รายละเอียด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">R00001</td>
                                                    <td rowspan="1" colspan="1">11/02/2019</td>
                                                    <td rowspan="1" colspan="1">นางสาว พิมพิลา ทองแท้</td>
                                                    <td rowspan="1" colspan="1">-</td>
                                                    <td rowspan="1" colspan="1">-</td>
                                                    <td rowspan="1" colspan="1">รับอุปกรณ์แล้ว</td>
                                                    <td rowspan="1" colspan="1">
                                                        <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียดการยืม'>
                                                            <i class="fas fa-file-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-xl-12 col-12 mb-4">
                            <div class="card"  >
                                <div class="card-header card-bg " style="background-color: #bf4040">
                                    <span class="link-active " style="font-size: 15px; color:white;">ประวัติการยืมอุปกรณ์ของตนเอง</span>
                                </div>
                                <div class="card-body">
                                    <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;" >
                                        <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                            <thead>
                                                <tr role="row">
                                                    <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                    <th rowspan="1" colspan="1">วันที่รับอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">ผู้ยืมอุปกรณ์</th>
                                                    <th rowspan="1" colspan="1">สถานะการยืม</th>
                                                    <th rowspan="1" colspan="1">รายละเอียด</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr role="row" >
                                                    <td rowspan="1" colspan="1">R00001</td>
                                                    <td rowspan="1" colspan="1">11/02/2019</td>
                                                    <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                    <td rowspan="1" colspan="1">รับอุปกรณ์แล้ว</td>
                                                    <td rowspan="1" colspan="1">
                                                            <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียดการยืม'>
                                                                <i class="fas fa-file-alt"></i>
                                                            </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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

