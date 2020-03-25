<?php // UserProfileController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function getUser()
    {
        $Username = "b6020501442";
        $User = DB::select("SELECT user.UID, user.Title, user.FName, user.LName, user.GMail, usertype.UTName FROM user
        INNER JOIN usertype ON user.UTID = usertype.UTID WHERE user.Username = '$Username'");

        $History = DB::select("SELECT requirement.ReqDate, requirement.RID, requirement.RStatus FROM requirement
        INNER JOIN user ON user.UID = requirement.UID WHERE user.Username = '$Username'");

        return view("userProfile", ['User' =>  $User, 'history' => $History]);
    }
}
