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
        return view("listEquipment", ["TableListEquipment" => $ListEquipment, "amount" => $countListEquipment]);
    }
}
