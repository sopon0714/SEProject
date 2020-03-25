<?php // DetailEquipmentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
