<?php // UserProfileController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{
    public function getUser($id)
    {
        $User = DB::select("SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID WHERE user.UID = '$id'");

        $History = DB::select("SELECT requirement.ReqDate, requirement.RID, requirement.RStatus FROM requirement
        INNER JOIN user ON user.UID = requirement.UID WHERE user.UID = '$id' ORDER BY requirement.ReqDate DESC");

        $HistoryO = DB::select("SELECT `orderitem`.`OID`,`requirement`.`RID`,`orderitem`.`getDate`, CONCAT(u1.`Title`, u1.`FName`, ' ', u1.`LName`) as fullname1,
         IF(`orderitem`.`returnStaffID` IS NULL,'-',`orderitem`.`returnDate`) As returnDate, IF(`orderitem`.`returnStaffID` IS NULL,'-',CONCAT(u2.`Title`, u2.`FName`, ' ', u2.`LName`)) As fullname2
          ,IF(`orderitem`.`returnStaffID` IS NULL,'รับอุปกรณ์แล้ว','คืนอุปกรณ์แล้ว') AS Ostatus
          FROM `orderitem` INNER JOIN `requirement` ON `requirement`.`RID` =`orderitem`.`RID`
           INNER JOIN`user` as u1 ON u1.`UID`=`orderitem`.`getStaffID`
           LEFT JOIN `user` as u2 ON u2.`UID`=`orderitem`.`returnStaffID`
           INNER JOIN `user` as userMe ON `requirement`.`UID`= userMe.`UID`
           WHERE userMe.`UID` =$id ORDER BY `requirement`.`RID` DESC");
        return view("userProfile", ['User' =>  $User, 'history' => $History, "HistoryO" => $HistoryO]);
    }
    public function DetailByOID(Request $req)
    {
        header('Content-Type: application/json');
        $OID = $req->get('OID') ?? "";
        $InfoO = DB::selectOne("SELECT `requirement`.`RID`,
        CONCAT(u1.`Title`, u1.`FName`, ' ', u1.`LName`) as fullname1,
        from_unixtime(`orderitem`.`getTime`,\" %H:%i:%s %Y-%m-%d \") as timeget,
        CONCAT(userMe.`Title`, userMe.`FName`, ' ', userMe.`LName`) as fullnameMe,
        CONCAT(useraAdv.`Title`, useraAdv.`FName`, ' ', useraAdv.`LName`) as fullnameAdv,
        IF(`orderitem`.`returnStaffID` IS NULL,'-',from_unixtime(`orderitem`.`returnTime`,\" %H:%i:%s %Y-%m-%d \") ) As timere,
        IF(`orderitem`.`returnStaffID` IS NULL,'-',CONCAT(u2.`Title`, u2.`FName`, ' ', u2.`LName`)) As fullname2
        FROM `orderitem` INNER JOIN `requirement` ON `requirement`.`RID` =`orderitem`.`RID`
        INNER JOIN`user` as u1 ON u1.`UID`=`orderitem`.`getStaffID`
        LEFT JOIN `user` as u2 ON u2.`UID`=`orderitem`.`returnStaffID`
        INNER JOIN `user` as userMe ON `requirement`.`UID`= userMe.`UID`
        LEFT JOIN `user` as useraAdv ON `requirement`.`ProfessorID`= useraAdv.`UID`
         WHERE `orderitem`.`OID`=$OID");
        $arrO = DB::select("SELECT `equipmentlist`.`EName`, `equipment`.`SNumber`
        FROM `orderitem` INNER JOIN `orderdetail` ON `orderitem`.`OID`=`orderdetail`.`OID`
        INNER JOIN `equipment` ON `equipment`.`EID`=`orderdetail`.`EID`
        INNER JOIN `equipmentlist` ON `equipmentlist`.`ELID`= `equipment`.`ELID`
        WHERE `orderitem`.`OID`=$OID ORDER BY `equipmentlist`.`EName` DESC,`equipment`.`SNumber`");
        $content = "";
        for ($i = 0; $i < count($arrO); $i++) {
            $arrO[$i]->SNumber == NULL ? $SN = '-' : $SN = $arrO[$i]->SNumber;
            $content .= " <tr role=\"row\" >
                             <td rowspan=\"1\" colspan=\"1\">" . ($i + 1) . "</td>
                             <td rowspan=\"1\" colspan=\"1\">{$arrO[$i]->EName}</td>
                             <td rowspan=\"1\" colspan=\"1\">$SN</td>
                         </tr>";
        }
        $INFO = array();
        $INFO['InfoO'] = $InfoO;
        $INFO['datatable'] = $content;
        echo json_encode($INFO);
    }
}
