<?php // ListEquipmentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListEquipmentController extends Controller
{

    public function indexpageListEquipment()
    {
        $ListEquipment = DB::select("SELECT `equipmentlist`.`ELID`,`equipmentlist`.`EName`,`category`.`CName`,
         `equipmentlist`.`ELStatus`,COUNT(`equipment`.`EID`) AS totalall ,
         SUM(IF(`equipment`.`EStatus`='สามารถยืมได้' AND `equipmentlist`.`ELStatus`='ยืมได้',1,0)) as totaluse FROM `equipmentlist`
         INNER JOIN `category` ON `equipmentlist`.`CID`=`category`.`CID`
         LEFT JOIN `equipment` ON `equipmentlist`.`ELID`=`equipment`.`ELID`
         WHERE (`equipment`.`isDelete`=0 OR `equipment`.`isDelete` IS NULL ) AND `equipmentlist`.`isDelete`=0
         AND `category`.`isDelete`=0 GROUP BY `equipmentlist`.`ELID`,`equipmentlist`.`EName`,`category`.`CName`,`equipmentlist`.`ELStatus`
          ORDER BY `equipmentlist`.`EName`");
        $countListEquipment = DB::select("SELECT COUNT(*) as totalall ,SUM(IF(`equipmentlist`.`ELStatus`='ยืมได้',1,0)) as totaluse FROM `equipmentlist` INNER JOIN `category` ON `equipmentlist`.`CID`=`category`.`CID` WHERE `equipmentlist`.`isDelete`=0 AND `category`.`isDelete`=0");
        $category = DB::select("SELECT * FROM `category` WHERE `category`.`isDelete`=0 ORDER BY CName");
        return view("listEquipment", ["TableListEquipment" => $ListEquipment, "amount" => $countListEquipment, "category" => $category]);
    }
    public function insertListEquipment(Request $req)
    {
        $ELName = $req->get('ELName');
        $brand = $req->get('brand');
        $note = $req->get('note');
        $categoryID = $req->get('category');
        $status = $req->get('status');
        $Arrayright = $req->get('right');
        $statusSN = $req->get('statusSN');
        $idnew = DB::table('equipmentlist')->insertGetId(
            ['CID' => $categoryID, 'EName' => $ELName, 'Brand' => $brand, 'Detail' => $note, 'ELStatus' =>  $status, 'isDelete' =>  0]
        );
        for ($i = 0; $i < count($Arrayright); $i++) {
            DB::table('borrowingrights')->insert(
                ['ELID' => $idnew, 'UTID' => $Arrayright[$i]]
            );
        }
        if ($statusSN == 0) {
            $number = $req->get('number');
            for ($i = 0; $i < $number; $i++) {
                DB::table('equipment')->insert(
                    ['ELID' => $idnew, 'SNumber' => NULL, 'EStatus' => 'สามารถยืมได้', "isDelete" => 0]
                );
            }
        } else {
            $ArrayfieldsSNumber = $req->get('fieldsSNumber');
            for ($i = 0; $i < count($ArrayfieldsSNumber); $i++) {
                DB::table('equipment')->insert(
                    ['ELID' => $idnew, 'SNumber' =>  $ArrayfieldsSNumber[$i], 'EStatus' => 'สามารถยืมได้', "isDelete" => 0]
                );
            }
        }
        return $this->indexpageListEquipment();
    }
    public function deleteListEquipment(Request $req)
    {
        $ELID = $req->get('ELID');
        DB::table('equipmentlist')
            ->where('ELID', $ELID)
            ->update(['isDelete' => 1]);
        return $this->indexpageListEquipment();
    }
    public function selectByIdListEquipment(Request $req)
    {
        header('Content-Type: application/json');
        $ELID = $req->get('ELID');
        $Equipment = DB::select("SELECT * FROM equipmentlist WHERE ELID ='$ELID'");
        $rights = DB::select("SELECT * FROM borrowingrights WHERE ELID ='$ELID'");
        $INFO = array();
        $INFO['rights1'] = false;
        $INFO['rights2'] = false;
        $INFO['rights3'] = false;
        for ($i = 0; $i < count($rights); $i++) {
            $INFO["rights{$rights[$i]->UTID}"] = true;
        }
        $INFO['CID'] = $Equipment[0]->CID;
        $INFO['EName'] = $Equipment[0]->EName;
        $INFO['Brand'] = $Equipment[0]->Brand;
        $INFO['Detail'] = $Equipment[0]->Detail;
        $INFO['ELStatus'] = $Equipment[0]->ELStatus;
        echo json_encode($INFO);
    }
    public function updateListEquipment(Request $req)
    {
        $ELID = $req->get('ELID');
        $ELName = $req->get('ELName');
        $brand = $req->get('brand');
        $note = $req->get('note');
        $categoryID = $req->get('category');
        $status = $req->get('status');
        $Arrayright = $req->get('right');
        DB::table('equipmentlist')
            ->where('ELID', $ELID)
            ->update(['CID' => $categoryID, 'EName' => $ELName, 'Brand' => $brand, 'Detail' => $note, 'ELStatus' =>  $status]);
        DB::table('borrowingrights')
            ->where('ELID', $ELID)->delete();
        for ($i = 0; $i < count($Arrayright); $i++) {
            DB::table('borrowingrights')->insert(
                ['ELID' => $ELID, 'UTID' => $Arrayright[$i]]
            );
        }
        return $this->indexpageListEquipment();
    }
}
