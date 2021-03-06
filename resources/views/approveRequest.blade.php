@extends(Session::get('userType')==1 ? "./layoutNisit" : (Session::get('userType')==2 ?"./layoutTeacher":"./layoutAdmin"))
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
                    <span class="link-active " style="font-size: 18px; color:white;">อนุมัติคำร้องขอ</span>
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
                            <div class="font-weight-bold  text-uppercase mb-1 ">จำนวนคำร้องขอ</div>
                            <div class="font-weight-bold  text-uppercase mb-1 ">ที่รอยืนยัน</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 " >{{$amount[0]->R_sum }} คำร้อง</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-3x"></i>
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
                                <span class="link-active " style="font-size: 17px; color:white;">ตารางอนุมัติคำร้องขอ</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- เริ่มตาราง --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered TableFilter" id="dataTable" width="100%" cellspacing="0" style="width: 100%" align="center">
                            <colgroup>
                                <col width="15%">
                                <col width="20%">
                                <col width="20%">
                                <col width="30%">
                                <col width="25%">
                            </colgroup>
                            <thead >
                                <tr>
                                    {{-- <th>ตัวอักษรหนา --}}
                                    <th style="text-align: center">ลำดับ</th>
                                    <th style="text-align: center">หมายเลขคำร้อง</th>
                                    <th style="text-align: center">วันที่ยื่นคำร้อง</th>
                                    <th style="text-align: center">ชื่อผู้ยื่นคำร้อง</th>
                                    <th style="text-align: center">การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < count($TableApproveRequests); $i++)
                                <tr>
                                    <td class="text-center">{{$i+1}}</td>
                                    <td class="text-center">R{{sprintf("%06d", $TableApproveRequests[$i]->RID)}}</td>
                                    <td class="text-center">{{$TableApproveRequests[$i]->ReqDate}}</td>
                                    <td class="text-center">{{$TableApproveRequests[$i]->Title}} {{$TableApproveRequests[$i]->FName}} {{$TableApproveRequests[$i]->LName}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-info btn-sm tt btninfoapprove"  token ="{{csrf_token()}}" data-toggle="tooltip" title="รายละเอียดการยืนยันคำร้อง" rid="{{$TableApproveRequests[$i]->RID}}" reqdate="{{$TableApproveRequests[$i]->ReqDate}}" nameuser="{{$TableApproveRequests[$i]->Title}} {{$TableApproveRequests[$i]->FName}} {{$TableApproveRequests[$i]->LName}}"  nameaj="{{$TableApproveRequests[$i]->PTitle}} {{$TableApproveRequests[$i]->PFName}} {{$TableApproveRequests[$i]->PLName}}" note="{{$TableApproveRequests[$i]->Reason}}" data-original-title="รายละเอียด"><i class="fas fa-file-alt"></i></i></button>
                                        <button type="button" class="btn btn-danger btn-sm tt btncancelapprove" data-toggle="tooltip" title="ยกเลิกการอนุมัติ"  rid2="{{$TableApproveRequests[$i]->RID}}" token="{{ csrf_token() }}" data-original-title="ลบ"><i class="far fa-trash-alt" aria-hidden="true"></i></button>
                                        {{-- rid2="{{$TableApproveRequests[$i]->RID}}" token="{{ csrf_token() }}" --}}
                                    </td>

                                </tr>
                                @endfor
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
            <form method="post" id="info" name="info" action="./approveRequest">
                <div class="info" style="font-size: 17px">
                    <div class="modal-header header-modal" style="background-color: #66b3ff;">
                        <h4 class="modal-title" style="color: white">รายละเอียดการการยืนยันคำร้อง</h4>
                    </div>
                    <div class="modal-body" id="ChangeModalBody">
                        <div class="container">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="RID" id="RID" value="">
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>หมายเลขคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 " >
                                    <output id="ridapprove" name="ridapprove"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>วันที่ยื่นคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <output id="reqdateapprove" name="reqdateapprove"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>ผู้ยื่นคำร้อง :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <output id="nameuserapprove" name="nameuserapprove"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>อาจารย์ที่รับผิดชอบ :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <output id="nameajapprove" name="nameajapprove"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-right">
                                    <span>เหตุผลที่ยืม :</span>
                                </div>
                                <div class="col-xl-6 col-6 ">
                                    <output id="noteapprove" name="noteapprove"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-6 col-2 text-left">
                                    <span>รายการอุปกรณ์ที่ยืม :</span>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-12 text-right">
                                    <table class="table table-bordered" id="historyRequirementsTable" style="text-align:center;font-size: 14px"  swidth="100%"  cellspacing="0">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">ลำดับ</th>
                                                <th rowspan="1" colspan="1">รายการอุปกรณ์</th>
                                                <th rowspan="1" colspan="1">จำนวน(ชิ้น)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dt1">
                                            <tr role="row" >
                                                <td rowspan="1" colspan="1">1</output></td>
                                                <td rowspan="1" colspan="1">เมาส์</output></td>
                                                <td rowspan="1" colspan="1">2</output></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success cancel" id="a_cancelInfo" >อนุมัติ</button>
                        <button type="button" class="btn btn-danger cancel" id="a_cancelInfo" data-dismiss="modal">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal ยกเลิกการอนุมัติ --}}
<div class="modal fade" id="cancelapproveModal" style="margin-top: 10%" name="cancelapproveModal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" role="document" style="width: 50%">
        <div class="modal-content">
            <form method="post" id="cancel" name="cancel" action="./approveRequest">
                <div class="cancel" style="font-size: 17px">
                    <div class="modal-header header-modal" style="background-color: #CC0000;">
                        <h4 class="modal-title" style="color: white">ยืนยันการยกเลิกการอนุมัติ</h4>
                    </div>
                    <div class="modal-body" id="CancelModalBody">
                        <div class="container">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="RID" id="RID2" value="">
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>หมายเลขคำร้อง :</span>
                                </div>
                                <div class="col-xl-7 col-6">
                                    <output id="ridapprove2" name="ridapprove2"></output>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-xl-5 col-2 text-right">
                                    <span>เหตุผลที่ยกเลิก :</span>
                                </div>
                                <div class="col-xl-4 col-6 ">
                                    <input type="text" class="form-control" name="reasoncancel" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success cancel" id="a_cancelInfo" >ยืนยัน</button>
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
            var token = $(this).attr('token')
            $("#ridapprove").val("R"+('000000' + $(this).attr('rid')).substr(-6))
            $("#reqdateapprove").val($(this).attr('reqdate'))
            $("#nameuserapprove").val($(this).attr('nameuser'))
            $("#nameajapprove").val($(this).attr('nameaj'))
            $("#noteapprove").val($(this).attr('note'))
            $("#RID").val($(this).attr('rid'))
            $.ajax({
                    url: '../DetailByRID',
                    type: 'POST',
                    async : false,
                    data:{
                        _token:token,
                        RID:$(this).attr('rid')
                    },
                    success: function(result) {
                        var data= JSON.parse(result)
                        $('#dt1').html(data.datatable);
                        $("#infoapproveModal").modal();

                    }
                });
       });
       $('.btncancelapprove').click(function() {
            $("#cancelapproveModal").modal();
            $("#ridapprove2").val("R"+('000000' + $(this).attr('rid2')).substr(-6))
            $("#RID2").val($(this).attr('rid2'))
            // var item = $(this).attr('item')
            // var token = $(this).attr('token')
            // swal({
            //     title: "ยืนยันการยกเลิกการอนุมัติ",
            //     text: "หมายเลขคำร้อง :" + "เหตุผลที่ยกเลิก :",
            //     type: "input",
            //     showCancelButton: true,
            //     closeOnConfirm: false,
            //     inputPlaceholder: "กรุณากรอกเหตุผลที่ยกเลิก..."
            //     })
            //     .then((inputValue)=>{
            //         if (inputValue === false)
            //             return false;
            //         if (inputValue === "")
            //             {
            //                 swal.showInputError("คุณต้องกรอกเหตุผลที่ยกเลิก");
            //                 return false
            //             }
            //             swal("ยกเลิกการอนุมัติสำเร็จ", "success");
            //     });
            // $("#cancelapproveModal").modal();
       });
    });
</script>
@endsection
