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
        // $config_key = $req->get('config_key');
        // $coonfig_value = $req->get('coonfig_value');
            DB::table('config')
            ->where('config_key', "day_cancelapprove")
            ->update(['coonfig_value' => $day_update]);

        // return $this->indexpageCategory();
        // , '{{$detail_setting[1]->coonfig_value}}'=>$tel_update,
        //     '{{$detail_setting[2]->coonfig_value}}'=>$email_update, '{{$detail_setting[3]->coonfig_value}}'=>$time_update
    }
}
