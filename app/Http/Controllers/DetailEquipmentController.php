<?php // DetailEquipmentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DetailEquipmentController extends Controller
{

    public function indexpageDetailEquipment($id)
    {
        //echo "id=>" . $id;
        $InfoEL = DB::selectOne("SELECT `equipmentlist`.*,`category`.`CName` FROM `equipmentlist`
                    INNER JOIN `category` ON `category`.`CID`=`equipmentlist`.`CID`
                    WHERE`ELID` = $id");
        $amount = DB::selectOne("SELECT COUNT(*) as totalall ,SUM(IF(`EStatus`= 'สามารถยืมได้',1,0)) AS totaluse FROM `equipment`
                    WHERE `equipment`.`ELID` = $id AND `isDelete` = 0");
        $DATA  = DB::select("SELECT * FROM `equipment` WHERE `equipment`.`ELID` = $id AND `isDelete` = 0 ORDER BY `equipment`.`SNumber`");
        return view("detailEquipment", ["InfoEL" => $InfoEL, "amount" => $amount, "DATA" => $DATA, "ELID" => $id]);
    }
    public function insertDetailEquipment(Request $req)
    {
        $ELID = $req->get('ELID') ?? "";
        $EName = $req->get('EName') ?? "";
        if ($EName == "") {
            DB::table('equipment')->insert(
                ['ELID' => $ELID, 'SNumber' => NULL, 'EStatus' => 'สามารถยืมได้', "isDelete" => 0]
            );
        } else {
            DB::table('equipment')->insert(
                ['ELID' => $ELID, 'SNumber' => $EName, 'EStatus' => 'สามารถยืมได้', "isDelete" => 0]
            );
        }
        return $this->indexpageDetailEquipment($ELID);
    }

    public function updateDetailEquipment(Request $req)
    {
        $ELID = $req->get('ELID') ?? "";
        $EID = $req->get('EID') ?? "";
        $Snumber = $req->get('Snumber') ?? "";
        if ($Snumber == "-") {
            DB::table('equipment')
                ->where('EID', $EID)
                ->update(['SNumber' => Null]);
        } else {
            DB::table('equipment')
                ->where('EID', $EID)
                ->update(['SNumber' =>  $Snumber]);
        }
        return $this->indexpageDetailEquipment($ELID);
    }
    public function deleteDetailEquipment(Request $req)
    {
        $EID = $req->get('EID') ?? "";
        $ELID = $req->get('ELID') ?? "";
        DB::table('equipment')
            ->where('EID', $EID)
            ->update(["isDelete" => 1]);
        return $this->indexpageDetailEquipment($ELID);
    }
    public function DetailEquipmentByEID(Request $req)
    {
        header('Content-Type: application/json');
        $EID = $req->get('EID') ?? "";
        $InfoE = DB::selectOne("SELECT `equipmentlist`.*,IFNULL(`equipment`.`SNumber`,'ไม่มีเลขครุภัณฑ์')  as SNumber FROM `equipment` INNER JOIN `equipmentlist` ON `equipment`.`ELID` =`equipmentlist`.`ELID` WHERE `equipment`.`EID`=$EID");
        $arrHis = DB::select("SELECT `orderitem`.`getDate`,`orderitem`.`RID`, CONCAT(`user`.`Title`, `user`.`FName`, ' ', `user`.`LName`) as fullname
        ,IF(`orderitem`.`returnStaffID` IS NULL ,'รับอุปกรณ์แล้ว','คืนอุปกรณ์แล้ว') as OStatus FROM `orderitem`
                INNER JOIN `orderdetail` ON`orderitem`.`OID`=`orderdetail`.`OID`
                INNER JOIN `equipment` ON `equipment`.`EID` = `orderdetail`.`EID`
                INNER JOIN `requirement` ON `requirement`.`RID`=`orderitem`.`RID`
                INNER JOIN `user` ON `user`.`UID`=`requirement`.`UID`
                WHERE `equipment`.`EID`=$EID
                ORDER BY `orderitem`.`getDate` DESC,`orderitem`.`RID` DESC");
        $content = "";
        for ($i = 0; $i < count($arrHis); $i++) {
            $content .= " <tr role=\"row\" >
                            <td rowspan=\"1\" colspan=\"1\">{$arrHis[$i]->getDate}</td>
                            <td rowspan=\"1\" colspan=\"1\">R" . sprintf("%06d", $arrHis[$i]->RID) . "</td>
                            <td rowspan=\"1\" colspan=\"1\">{$arrHis[$i]->fullname}</td>
                            <td rowspan=\"1\" colspan=\"1\">{$arrHis[$i]->OStatus}</td>
                        </tr>";
        }
        $INFO = array();
        $INFO['InfoE'] = $InfoE;
        $INFO['datatable'] = $content;
        echo json_encode($INFO);
    }
}
