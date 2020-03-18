@extends('./layoutAdmin')
@section('title',"userManagement")
@section('Content')



<div class="row">
    <div class="col-xl-12 col-12 mb-4">
        <div class="card">
            <div class="card-header card-bg " style="background-color: #bf4040">
                <span class="link-active " style="font-size: 15px; color:white;"><h5>การจัดการผู้ใช้</h5></span>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">เจ้าหน้าที่ในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คน</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">อาจารย์ในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คน</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-12 mb-4">
        <div class="card border-left-primary card-color-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="font-weight-bold  text-uppercase mb-1">นิสิตในระบบ</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">xxxx คน</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-12 mb-4">
        <a style="text-decoration: none">
        <div class="card border-left-primary card-color-add shadow h-100 py-2" id="addsub" style="cursor:pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-xl text-info">เพิ่มเจ้าหน้าที่</div>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-warning" onclick="listEquipment()"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  style="height: 200px">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">เจ้าหน้าที่</span>
        </div>
        <div class="card-body" style="height: 300px">
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row" >
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
                                                <th rowspan="1" colspan="1">สถานะ</th>
                                                <th rowspan="1" colspan="1">จำนวนการยืม</th>
                                                <th rowspan="1" colspan="1">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">นางสาวศศิธร ชลรัตน์อมฤต</td>
                                                <td rowspan="1" colspan="1">เจ้าหน้าที่</td>
                                                <td rowspan="1" colspan="1">2</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียด'>
                                                        <i class="fas fa-file-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm tt" data-toggle="tooltip" title="ลบเจ้าหน้าที่" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true" onclick=""></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>



<div class="col-xl-15 col-15 mb-4">
    <div class="card"  style="height: 300px">
        <div class="card-header card-bg " style="background-color: #bf4040">
            <span class="link-active " style="font-size: 15px; color:white;">อาจารย์และนิสิต</span>
        </div>
        <div class="card-body" style="height: 400px">
            <div class="col-sm-12" id="historyRequirements" style="overflow-y:auto;">
                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row" >
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">ชื่อ-นามสกุล</th>
                                                <th rowspan="1" colspan="1">สถานะ</th>
                                                <th rowspan="1" colspan="1">จำนวนการยืม</th>
                                                <th rowspan="1" colspan="1">รายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">นายโสภณ โตใหญ่</td>
                                                <td rowspan="1" colspan="1">นิสิต</td>
                                                <td rowspan="1" colspan="1">2</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียด'>
                                                        <i class="fas fa-file-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">2</td>
                                                <td rowspan="1" colspan="1">นางสาวนุชนาฏ สัตยากวี</td>
                                                <td rowspan="1" colspan="1">อาจารย์</td>
                                                <td rowspan="1" colspan="1">1</td>
                                                <td rowspan="1" colspan="1">
                                                    <button type="button" class="btn btn-info btn-sm tt" title='รายละเอียด'>
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


@endsection

@section('modal')

@endsection
