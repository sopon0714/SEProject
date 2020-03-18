@extends('./layoutAdmin')
@section('title',"Request Management")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การจัดการคำร้อง</h5></span>
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
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนคำร้อง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนคำร้องที่รอยืนยัน</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คำร้อง</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-4">เพิ่มคำร้อง</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 คำร้อง</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" ><i class="fas fa-plus"></i></button>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางการจัดการคำร้อง</span>
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
                            <col width="100">
                            <col width="100">

                        </colgroup>
                        <!-- หัวตาราง -->
                        <thead class="text-center">
                            <tr>
                            <th>ลำดับ</th>
                            <th>วันที่ยื่นคำร้อง</th>
                            <th>หมายเลยคำร้อง</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            <td class="text-center">1</td>
                            <td class="text-center">15/02/2020</td>
                            <td >R00001</td>
                            <td >รอยืนยัน</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียดการคำร้อง'>
                                <i class="fas fa-file-alt"></i></button></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning btn-sm tt mr-sm-1" data-toggle="tooltip" title="แก้ไขคำร้อง" data-original-title="แก้ไข"><i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="ลบคำร้อง" data-original-title="ลบ"><i class="far fa-trash-alt" ></i></button>
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

<script>
@endsection
@section('modal')

@endsection
