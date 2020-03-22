<?php // ApproveRequestController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ApproveRequestController extends Controller
{
    public function indexpageApproveRequest()
    {
        $ApproveRequests = DB::select("SELECT U.RID,U.ReqDate,U.Title,U.FName,U.LName,P.PTitle,P.PFName,P.PLName,U.Reason FROM
        (SELECT requirement.RID,user.Title,user.FName,user.LName,requirement.ReqDate,requirement.Reason FROM user INNER JOIN requirement
        ON user.UID = requirement.UID WHERE requirement.RStatus = 'รอยืนยัน')AS U
        INNER JOIN
        (SELECT requirement.RID,user.Title AS PTitle,user.FName AS PFName,user.LName AS PLName FROM requirement INNER JOIN user
        WHERE requirement.ProfessorID = user.UID)AS P
        ON P.RID = U.RID");
        $ApproveRequests2 = DB::select("SELECT DE.EName,DE.Amount FROM
        (SELECT requirementdetail.RID ,equipmentlist.EName,requirementdetail.Amount FROM equipmentlist
        INNER JOIN requirementdetail ON equipmentlist.ELID = requirementdetail.ELID)AS DE
        INNER JOIN
        (SELECT U.RID,U.ReqDate,U.Title,U.FName,U.LName,P.PTitle,P.PFName,P.PLName,U.Reason FROM
        (SELECT requirement.RID,user.Title,user.FName,user.LName,requirement.ReqDate,requirement.Reason FROM user INNER JOIN requirement
        ON user.UID = requirement.UID WHERE requirement.RStatus = 'รอยืนยัน')AS U
        INNER JOIN
        (SELECT requirement.RID,user.Title AS PTitle,user.FName AS PFName,user.LName AS PLName FROM requirement INNER JOIN user
        WHERE requirement.ProfessorID = user.UID)AS P
        ON P.RID = U.RID)AS UP
        ON UP.RID = DE.RID");
        $countApproveRequest = DB::select("SELECT COUNT(requirement.RID) AS R_sum FROM requirement
        WHERE requirement.RStatus = 'รอยืนยัน'");
        return view("approveRequest", ["TableApproveRequests" => $ApproveRequests, "TableDetailApproveRequests" => $ApproveRequests2, "amount" => $countApproveRequest]);
    }
    public function deleteApproveRequest(Request $req)
    {
        $RID = $req->get('RID');
        DB::table('approveRequest')
            ->where('RID', $RID)
            ->update(['RStatus' => 'ยกเลิก']);
        return $this->indexpageApproveRequest();
    }
}
