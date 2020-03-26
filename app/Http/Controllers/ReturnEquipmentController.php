<?php // ReturnEquipmentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReturnEquipmentController extends Controller
{
    public function indexpagereturnEquipment()
    {
        $requirement = DB::select("SELECT `orderitem`.`OID`,`orderitem`.`RID`,
        CONCAT(`user`.`Title`, `user`.`FName`, ' ', `user`.`LName`) as fullname,
        `orderitem`.`getTime`
        FROM `orderitem`
        INNER JOIN `requirement` ON `requirement`.`RID` = `orderitem`.`RID`
        INNER JOIN `user` ON  `requirement`.`UID` = `user`.`UID`
        WHERE `orderitem`.`returnStaffID`IS NULL
        ORDER BY `orderitem`.`getTime`");
        $countrequirement = DB::selectOne("SELECT COUNT(*) as totalall
        FROM `orderitem`
        INNER JOIN `requirement` ON `requirement`.`RID` = `orderitem`.`RID`
        INNER JOIN `user` ON  `requirement`.`UID` = `user`.`UID`
        WHERE `orderitem`.`returnStaffID`IS NULL
        ");
        return view("returnEquipment", ["requirement" => $requirement, "amount" => $countrequirement]);
    }
    public function confirmreturnEquipment(Request $req)
    {
        $USER = Session::get('USER');
        $UID = $USER[0]->UID;
        $UTID = $USER[0]->UTID;
        $OID = $req->get('OID');
        DB::table('orderitem')
            ->where('OID', $OID)
            ->update(['returnStaffID' => $UID, 'returnTime' => time(), 'returnDate' => date("Y-m-d")]);
        $DATA = DB::select("SELECT * FROM `orderdetail` WHERE `OID` = $OID");
        for ($i = 0; $i < count($DATA); $i++) {
            DB::table('equipment')
                ->where('EID', $DATA[$i]->EID)
                ->update(['EStatus' => 'สามารถยืมได้']);
        }
        return $this->indexpagereturnEquipment();
    }
}
