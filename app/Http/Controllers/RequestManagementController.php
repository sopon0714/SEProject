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
        if ($advisorid == '-') {
            $advisorid = NULL;
        }
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
    public function DetailByRID(Request $req)
    {
        header('Content-Type: application/json');
        $RID = $req->get('RID');
        $InfoR = DB::selectOne("SELECT CONCAT(`user`.`Title`, `user`.`FName`, ' ',`user`.`LName`) as fullnameAdv ,
        IF(`requirement`.`AcceptTime` IS NULL,'-',from_unixtime(`requirement`.`AcceptTime`,' %H:%i:%s %Y-%m-%d ') ) AS timeac,
        IF(`requirement`.`Reason`IS NULL,'-',`requirement`.`Reason`) as  Reason
        FROM `requirement`INNER JOIN `user`
        ON `requirement`.`ProfessorID`=`user`.`UID`
        WHERE RID =$RID");
        $InfoR2 = DB::select("SELECT `equipmentlist`.`EName`,`requirementdetail`.`Amount` FROM `requirement`
        INNER JOIN `requirementdetail` ON `requirementdetail`.`RID` = `requirement`.`RID`
        INNER JOIN  `equipmentlist` ON `equipmentlist`.`ELID` = `requirementdetail`.`ELID`
        WHERE `requirement`.`RID` = $RID
        ORDER BY  `equipmentlist`.`CID`,`equipmentlist`.`EName`");
        $content = "";
        for ($i = 0; $i < count($InfoR2); $i++) {
            $content .= " <tr role=\"row\" >
                             <td rowspan=\"1\" colspan=\"1\">" . ($i + 1) . "</td>
                             <td rowspan=\"1\" colspan=\"1\">{$InfoR2[$i]->EName}</td>
                             <td rowspan=\"1\" colspan=\"1\">{$InfoR2[$i]->Amount}</td>
                         </tr>";
        }
        $INFO = array();
        $INFO['InfoO'] = $InfoR;
        $INFO['datatable'] = $content;
        echo json_encode($INFO);
    }
}
