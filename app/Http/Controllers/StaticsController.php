<?php // StaticsController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StaticsController extends Controller
{
    public function indexpageStatics()
    {
        $Statics = DB::select("SELECT * FROM requirementdetail");
        // ยังไม่ได้คิวรี่   ฉันใส่ชื่อตารางที่มีในDBไปก่อน ไม่งั้นมันรันไม่ได้ ><

        return view("statics", ["TableStatics" => $Statics]);
    }

}
