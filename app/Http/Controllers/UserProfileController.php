<?php // UserProfileController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{
    public function getUser()
    {
        $U = Session::get('USER');
        $username = $U[0]->Username;
        $User = DB::select("SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID WHERE user.Username = '$username'");

        $History = DB::select("SELECT requirement.ReqDate, requirement.RID, requirement.RStatus FROM requirement
        INNER JOIN user ON user.UID = requirement.UID WHERE user.Username = '$username'");

        return view("userProfile", ['User' =>  $User, 'history' => $History]);
    }
}
