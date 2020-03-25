<?php // ReceiveEquipmentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReceiveEquipmentController extends Controller
{
    public function indexpagereceiveEquipment()
    {
        $requirement = DB::select("SELECT `requirement`.`RID`,`requirement`.`ReqDate`,
        IF(`requirement`.`ProfessorID` IS NULL,'-',CONCAT(us1.`Title`, us1.`FName`, ' ', us1.`LName`)) As fullnameAdv,
        CONCAT(us2.`Title`, us2.`FName`, ' ', us2.`LName`) As fullnameMe
        FROM `requirement`
        INNER JOIN `user` as us1 ON us1.`UID` = `requirement`.`ProfessorID`
        INNER JOIN `user` as us2 ON us2.`UID` = `requirement`.`UID`
        WHERE `RStatus`='ยืนยันแล้ว'");
        $countrequirement = DB::selectOne("SELECT COUNT(*) as totalall
        FROM `requirement`
        INNER JOIN `user` as us1 ON us1.`UID` = `requirement`.`ProfessorID`
        INNER JOIN `user` as us2 ON us2.`UID` = `requirement`.`UID`
        WHERE `RStatus`='ยืนยันแล้ว'");
        return view("receiveEquipment", ["requirement" => $requirement, "amount" => $countrequirement]);
    }
    public function insertreceiveEquipment(Request $req)
    {
        $USER = Session::get('USER');
        $UID = $USER[0]->UID;
        $UTID = $USER[0]->UTID;
        $RID = $req->get('RID');
        $arridSNumber = $req->get('idSNumber');
        $idnew = DB::table('orderitem')->insertGetId(
            ['RID' => $RID, 'getStaffID' => $UID, 'getTime' => time(), 'getDate' => date("Y-m-d")]
        );
        for ($i = 0; $i < count($arridSNumber); $i++) {
            DB::table('orderdetail')->insert(
                ['OID' => $idnew, 'EID' => $arridSNumber[$i]]
            );
            DB::table('equipment')
                ->where('EID', $arridSNumber[$i])
                ->update(['EStatus' => 'กำลังถูกยืม']);
        }
        DB::table('requirement')
            ->where('RID', $RID)
            ->update(['RStatus' => 'รับอุปกรณ์แล้ว']);

        return $this->indexpagereceiveEquipment();
    }
    public function DetailByReceive(Request $req)
    {
        header('Content-Type: application/json');
        $RID = $req->get('RID');
        $DATA = DB::select("SELECT `equipmentlist`.`ELID`,`equipmentlist`.`EName`,`requirementdetail`.`Amount`
                                        FROM `requirement`
                                        INNER JOIN `requirementdetail` ON `requirementdetail`.`RID`=`requirement`.`RID`
                                        INNER JOIN `equipmentlist` ON `requirementdetail`.`ELID` = `equipmentlist`.`ELID`
                                        WHERE `requirement`.`RID` = $RID");
        $content = "";
        $content2 = "";
        for ($i = 0; $i < count($DATA); $i++) {
            $content2 = "";
            $DATA2 =  DB::select("SELECT `equipment`.`EID`,IFNULL(`equipment`.`SNumber`,'(ไม่มีเลขครุภัณฑ์)') AS SNumber  FROM `equipmentlist`
            INNER JOIN `equipment` ON `equipment`.`ELID` = `equipmentlist`.`ELID`
            WHERE `equipmentlist`.`ELID` = {$DATA[$i]->ELID} AND `equipment`.`EStatus`='สามารถยืมได้'
            AND `equipment`.`isDelete`=0
            ORDER BY `equipment`.`SNumber`");
            $content2 .= "<div class=\"row mb-2\">
                            <div class=\"col-xl-5 col-2 text-right\">
                                <label style=\"font-size: 18px\"> {$DATA[$i]->EName}: </label>
                            </div>
                            <div class=\"col-xl-5 \">
                                <select class=\"form-control\" name=\"idSNumber[]\">";
            for ($j = 0; $j < count($DATA2); $j++) {
                $content2 .= " <option value=\"{$DATA2[$j]->EID}\">{$DATA2[$j]->SNumber}</option>";
            }
            $content2 .= "</select>
                            </div>
                        </div>";
            for ($j = 0; $j < $DATA[$i]->Amount; $j++) {
                $content .= $content2;
            }
        }
        $INFO = array();
        $INFO['datatable'] =  $content;
        echo json_encode($INFO);
    }
}
