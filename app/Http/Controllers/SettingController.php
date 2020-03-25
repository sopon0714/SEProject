<?php // CategoryController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function indexpageSetting()
    {
        $Setting = DB::select("SELECT * FROM `config`");
        return view("setting",["detail_setting" => $Setting]);
    }
    public function updateSetting(Request $req)
    {
        $day_update = $req->get('day_update');
        $tel_update = $req->get('tel_update');
        $email_update = $req->get('email_update');
        $time_update = $req->get('time_update');
        DB::table('config')
            ->update(['day_cancelapprove'=>$day_update, 'tel'=>$tel_update, 'email'=>$email_update, 'time'=>$time_update]);
        return $this->indexpageCategory();
    }
}
