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
    // public function updateSetting(Request $req)
    // {
    //     $indexpageCategory = $this->indexpageCategory();
    //     $config_key = $req->get('config_key');
    //     $coonfig_value = $req->get('coonfig_value');

    //     for ($i=0; $i<count($Setting); $i++)
    //     {
    //         DB::table('config')
    //         ->update(['{{$detail_setting[1]->coonfig_value}}'=>$day_update, 'tel'=>$tel_update, 'email'=>$email_update, 'time'=>$time_update]);
    //     }

    //     // return $this->indexpageCategory();
    // }
}
