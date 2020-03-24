<?php // MemberController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Request $req)
    {
        $msg = $req->get('msg') ?? "";
        return view('index', ["msg" => $msg]);
    }
    public function login(Request $req)
    {
        $username = $req->get('username') ?? "";
        $password = $req->get('password') ?? "";
        if ($username == "" || $password == "") {
            return redirect('/?msg=กรุณากรอกusernameหรือpassword');
        } else {
            $ldap_error = array(
                "ERR-000: OK",
                "ERR-001: Bind error",
                "ERR-002: Anonymous search failed",
                "ERR-003: User unknown",
                "ERR-004: More than one such user",
                "ERR-005: bind failed. user not authenticated."
            );
            $host1   = "ldap.ku.ac.th";
            $host2   = "ldap2.ku.ac.th";
            $host3   = "ldap3.ku.ac.th";
            $base_dn = "dc=ku,dc=ac,dc=th";
        }
        $ldapserver = ldap_connect($host1);
        if (!$ldapserver) {
            $ldapserver = ldap_connect($host2);
            if (!$ldapserver) {
                $ldapserver = ldap_connect($host3);
            }
        }
        $bind = ldap_bind($ldapserver);
        if (!$bind) {
            return redirect('/?msg=ไม่สามารถเชื่อมฐานข้อมูลได้');
        }
        $filter = "uid=" . $username;
        $result = ldap_search($ldapserver, $base_dn, $filter);
        $info = ldap_get_entries($ldapserver, $result);
        if ($info['count'] != 1) {
            return redirect('/?msg=ไม่พบผู้ใช้ในระบบ');
        }

        $user_dn = $info[0]["dn"];
        $bind = @ldap_bind($ldapserver, $user_dn, $password);
        if (!$bind) {
            return redirect('/?msg=usernameหรือpasswordไม่ถูกต้อง');
        }
        $USER = DB::select("SELECT * FROM `user` WHERE `Username`='$username' AND isDelete=0");
        //var_dump($USER);
        if (isset($USER[0]->Username)) {
            $userType = $USER[0]->UTID;
            $fullname = $USER[0]->Title . $USER[0]->FName . " " . $USER[0]->LName;
            session(['USER' => $USER, 'userType' => $userType, "fullname" => $fullname]);
            //echo $fullname;
            return redirect('/userProfile');
        }
    }
}
