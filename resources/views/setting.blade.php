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
                                    <button type="button" class="btn btn-warning btn-xl tt" data-toggle="tooltip" title="แก้ไขการตั้งค่า" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i> แก้ไข</button>
                                </div>
                                <br>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>จำนวนวันในการยกเลิกคำร้องหลังมีการอนุมัติ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="day" value="3" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>เบอร์โทรติดต่อ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="tel" value="08x-xxx-xxxx" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>E-mail ของระบบ :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="email" value="se62_08@gmail.com" disabled>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-xl-5 col-2 text-right">
                                        <label>เวลาตรวจสอบคำร้องที่เกินระยะเวลา :</label>
                                    </div>
                                    <div class="col-xl-5 col-5 text-center">
                                        <input type="text" class="form-control" id="time" value="03.00" น. disabled>
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
