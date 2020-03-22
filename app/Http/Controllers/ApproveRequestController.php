<?php // ApproveRequestController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ApproveRequestController extends Controller
{
    public function indexpageApproveRequest()
    {
        $ApproveRequests = DB::select("SELECT R2.RID,user.Title,user.FName,user.LName,R2.ReqDate FROM user INNER JOIN
        (SELECT * FROM requirement  WHERE requirement.RStatus = 'รอยืนยัน')AS R2
        ON user.UID = R2.UID");
        //$countCategory = DB::select("SELECT COUNT(*) AS amount FROM `category` WHERE `category`.`isDelete`=0");
        return view("approveRequest", ["TableApproveRequests" => $ApproveRequests]);
    }
}

