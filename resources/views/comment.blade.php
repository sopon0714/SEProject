@extends('./layoutAdmin')
@section('title',"Comment")
@section('CSS')

@endsection
@section('Content')
    {{-- เปิดอนุมัติคำร้องขอ --}}
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
    {{-- ปิดอนุมัติคำร้องขอ --}}
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
                <button type="button" class="btn btn-info btn-xl tt" title='ส่งข้อเสนอแนะ'><i class="fas fa-paper-plane"></i> ส่ง</button>
            </div>
        </div>
@endsection
