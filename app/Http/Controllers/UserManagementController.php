<?php // UserManagementontroller.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function indexpageUserManagement()
    {
        $UserManagementStaff = DB::select("SELECT H.Title, H.FName, H.LName, H.UTName, COUNT(requirement.UID)as amount FROM
        (SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID)as H
        LEFT JOIN requirement
        ON requirement.UID = H.UID
        WHERE H.UTName = 'เจ้าหน้าที่'
        GROUP BY H.Title, H.FName, H.LName, H.UTName");

        $UserManagementAjNisit = DB::select("SELECT H.Title, H.FName, H.LName, H.UTName, COUNT(requirement.UID)as amount FROM
        (SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID)as H
        LEFT JOIN requirement
        ON requirement.UID = H.UID
        WHERE H.UTName = 'อาจารย์' OR H.UTName = 'นิสิต'
        GROUP BY H.Title, H.FName, H.LName, H.UTName
        ORDER BY  H.UTName DESC");

        $countListEquipment = DB::select("SELECT T.UTName, COUNT(T.UTName)as person FROM
        (SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID)as T
        GROUP BY T.UTName
        ORDER BY T.UTName DESC");

        //$category = DB::select("SELECT * FROM `category` WHERE `category`.`isDelete`=0 ORDER BY CName");
        return view("userManagement", ["TableUserManagementStaff" => $UserManagementStaff, "TableUserManagementAjNisit" => $UserManagementAjNisit, "amount" => $countListEquipment]);
    }

}
