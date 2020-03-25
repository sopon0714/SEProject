<?php // RequestManagementController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RequestManagementController extends Controller
{
    public function indexpageRequestManagement()
    {
        $USER = Session::get('USER');
        $UID = $USER[0]->UID;
        $UTID = $USER[0]->UTID;
        $RequestManagement = DB::select("SELECT requirement.ReqDate,requirement.RID,requirement.RStatus as petition FROM `requirement` INNER JOIN `user` ON `user`.`UID`=`requirement`.`UID`
        WHERE `requirement`.`UID` = $UID ORDER BY requirement.ReqDate DESC");

        $countRequestManagementAll = DB::select("SELECT  COUNT(*) as petition
        FROM `requirement` INNER JOIN `user` ON `user`.`UID`=`requirement`.`UID`
        WHERE `requirement`.`UID` = $UID");

        $countRequestManagementWait = DB::select("SELECT  COUNT(*) as petition
        FROM `requirement` INNER JOIN `user` ON `user`.`UID`=`requirement`.`UID`
        WHERE `requirement`.`UID` = $UID AND requirement.RStatus = 'รอยืนยัน'");
        $Advisor = DB::select(" SELECT * FROM `user` WHERE `UTID` = 2 AND `user`.`isDelete`= 0 ");

        $EQ = DB::select("SELECT `equipmentlist`.`ELID`,`equipmentlist`.`EName`,COUNT(*) as totalall FROM `equipmentlist`
        INNER JOIN `borrowingrights` ON `borrowingrights`.`ELID`=`equipmentlist`.`ELID`
        INNER JOIN `equipment` ON `equipment`.`ELID` = `equipmentlist`.`ELID`
        WHERE `borrowingrights`.`UTID` = $UTID AND `equipmentlist`.`isDelete`=0 AND `equipment`.`isDelete` = 0
        AND `equipment`.`EStatus`='สามารถยืมได้' AND `equipmentlist`.`ELStatus`='ยืมได้'
        GROUP BY `equipmentlist`.`ELID`,`equipmentlist`.`EName`
        ORDER BY `equipmentlist`.`EName`");


        return view("requestManagement", ["TableRequestManagement" => $RequestManagement, "amountAll" => $countRequestManagementAll, "amountWait" => $countRequestManagementWait, "Advisor" => $Advisor, "EQ" => $EQ]);
    }
    public function insertRequestManagement(Request $req)
    {
        $USER = Session::get('USER');
        $UID = $USER[0]->UID;
        $UTID = $USER[0]->UTID;
        $arreq = $req->get('eq');
        $arrNumber = $req->get('Number');
        $reason = $req->get('reason');
        $advisorid = $req->get('advisor');
        $RSatus = $UTID == 1 ? 'รอยืนยัน' : 'ยืนยันแล้ว';
        $idnew = DB::table('requirement')->insertGetId(
            ['UID' => $UID, 'ProfessorID' => $advisorid, 'AcceptTime' => NULL, 'ReqTime' => time(), 'ReqDate' => date("Y-m-d"), 'Reason' =>  $reason, 'RStatus' =>  $RSatus, 'DetailCancel' =>  NULL]
        );
        for ($i = 0; $i < count($arreq); $i++) {
            DB::table('requirementdetail')->insert(
                ['RID' => $idnew, 'ELID' => $arreq[$i], 'Amount' => $arrNumber[$i]]
            );
        }

        return $this->indexpageRequestManagement();
    }
    public function deleteRequestManagement(Request $req)
    {

        $RIDcancel = $req->get('RID');
        $reasoncancel = $req->get('reasoncancel');
        DB::table('requirement')
            ->where('RID', $RIDcancel)
            ->update(['DetailCancel' => $reasoncancel, 'RStatus' => 'ยกเลิก']);

        return $this->indexpageRequestManagement();
    }
}
