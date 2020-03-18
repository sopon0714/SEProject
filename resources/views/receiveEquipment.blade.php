@extends('./layoutAdmin')
@section('title',"receiveEquipment")
@section('Content')



<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การรับอุปกรณ์</h5></span>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 20px; color:white;">ค้นหา</span>
        </div>
        {{-- style="text-align: center" --}}
        <div>
            <div class="card-body" style="height: 500px" >
                <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <div class="search" >
                        <label style="font-size: 18px">หมายเลขคำร้อง : </label>
                        <input type="text" name="note">
                        <button type="button" class="btn btn-info btn-sm tt" title='ค้นหา'>
                            <i class="fas fa-search"></i>
                        </button>
                        <br>
                        <label style="font-size: 20px">หมายเลขคำร้อง : E0163-10000000001</label>

                        <br>
                        <label style="font-size: 18px">ข้อมูลผู้ยืม</label>
                        <br>
                        <label style="font-size: 18px">คำนำหน้า : นาย</label>
                        <br>
                        <label style="font-size: 18px">ชื่อ : โสภณ</label>
                        <br>
                        <label style="font-size: 18px">นามสกุล : โตใหญ่</label>
                        <br>
                        <label style="font-size: 18px">อาจารย์ที่รับผิดชอบ : นางสาวนุชนาฎ สัตยากวี</label>
                        <br>
                        <br>

                        <label for="serialNumber" style="font-size: 18px">1    เลขครุภัณฑ์ : </label>
                        <select id="serialNumber">
                            <option value="a">E0163-10000000001</option>
                            <option value="a">E0163-20000000010</option>
                            <option value="c">E0163-40000000021</option>
                            {{-- <option value="b" selected>ของตกแต่งภายในอาคาร</option> --}}
                        </select>
                        <br>
                        <label for="serialNumber" style="font-size: 18px">2    เลขครุภัณฑ์ : </label>
                        <select id="serialNumber">
                            <option value="a">E0163-10000000001</option>
                            <option value="a">E0163-20000000010</option>
                            <option value="c">E0163-40000000021</option>
                            {{-- <option value="b" selected>ของตกแต่งภายในอาคาร</option> --}}
                        </select>

                        {{-- <span>
                            <a href=" ">
                                <button type="button" id="btn_green" class="btn btn-success">ยืนยัน</button>
                            </a>
                        </span> --}}
                        <br>
                        <br>
                        <button style="text-align: right" type="button" value="ยืนยัน" class="btn btn-danger" >ยืนยัน</button>
                        <button style="text-align: right" type="button" value="ยกเลิก" class="btn btn-danger" >ยกเลิก</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  style="height: 300px">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">ตารางแสดงคำร้องขอที่อนุมัติแล้ว</span>
        </div>
        <div class="card-body" style="height: 300px">
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row" >
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">วันที่ยื่นคำร้อง</th>
                                                <th rowspan="1" colspan="1">หมายเลขคำร้อง</th>
                                                <th rowspan="1" colspan="1">ผู้ส่งคำร้อง</th>
                                                <th rowspan="1" colspan="1">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">15/02/2020</td>
                                                <td rowspan="1" colspan="1">E0163-10000000001</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียดคำร้อง'>
                                                        <i class="fas fa-file-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="ลบคำร้อง" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection
