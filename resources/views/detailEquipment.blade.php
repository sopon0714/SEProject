@extends('./layoutAdmin')
@section('title',"Detail Equipment")
@section('CSS')
<style>

</style>
@endsection
@section('Content')
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>รายละเอียดอุปกรณ์</h5></span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card border-left-warning card-color-four shadow h-100 py-2"
            data-toggle="modal" data-target="#modal-1" >
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase  mb-2">ข้อมูลอุปกรณ์</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ชื่อ เมาส์</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">ยี่ห้อ logitech</div>
                        <div class="font-weight-bold  text-uppercase  mb-2">หมวดหมู่ คอมพิวเตอร์</div>
                        <div class="font-weight-bold  text-uppercase  ">รายละเอียด xxxxxxxxxxxxxx</div>
                    </div>
                </div>
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
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนอุปกรณ์ทั้งหมด</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxx ชิ้น</div>
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
                        <div class="font-weight-bold  text-uppercase  mb-4">จำนวนอุปกรณ์ที่ยืมได้</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxx ชิ้น</div>
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
                        <div class="font-weight-bold  text-uppercase mb-4">เพิ่มอุปกรณ์</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">+1 อุปกรณ์</div>
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
                            <span class="link-active " style="font-size: 17px; color:white;">ตารางการจัดการอุปกรณ์</span>
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
                            <th>เลขครุภัณฑ์</th>
                            <th>สถานะอุปกรณ์</th>
                            <th>จัดการ</th>
                            </tr>
                        </thead>
                        <!-- บอดี้ตาราง -->
                        <tbody>
                            <td class="text-center">1</td>
                            <td >xxxxxxxxxxx-xxxxxxx/60</td>
                            <td class="text-center">ถูกยืม</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm tt mr-sm-1" title='เปิด-ปิด สถานะการยืม'>
                                <i class="fas fa-ban"></i></button>
                                <button type="button" class="btn btn-info btn-sm tt mr-sm-1" title='รายละเอียดอุปกรณ์'>
                                <i class="fas fa-file-alt"></i></button>
                                <button type="button" class="btn btn-warning btn-sm tt mr-sm-1" data-toggle="tooltip" title="แก้ไขข้อมูลอุปกรณ์" data-original-title="แก้ไข">
                                <i class="fas fa-pencil-alt"></i></button>
                                <button type="button" class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="ลบอุปกรณ์" data-original-title="ลบ">
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

<script>
@endsection
@section('modal')

@endsection
