<?php // RequestManagementController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RequestManagementController extends Controller
{
    public function indexpageRequestManagement()
    {
        $RequestManagement = DB::select("SELECT requirement.ReqDate,requirement.RID,requirement.RStatus as petition FROM requirement
        ORDER BY requirement.RStatus ASC");

        $countRequestManagementAll = DB::select("SELECT COUNT(*) as petition FROM requirement");

        $countRequestManagementWait = DB::select("SELECT COUNT(*) as petition FROM requirement
        WHERE requirement.RStatus = 'รอยืนยัน'");

        return view("requestManagement", ["TableRequestManagement" => $RequestManagement, "amountAll" => $countRequestManagementAll, "amountWait" => $countRequestManagementWait]);
    }

}
