<?php // CategoryController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function indexpageCategory()
    {
        $Categorys = DB::select("SELECT `category`.`CID`,`category`.`CName`,COUNT(*) AS amount FROM `category`
        INNER JOIN `equipmentlist` ON `category`.`CID`=`equipmentlist`.`CID`
        WHERE `category`.`isDelete`=0 AND `equipmentlist`.`isDelete`=0
        GROUP BY `category`.`CID`,`category`.`CName`");
        $countCategory = DB::select("SELECT COUNT(*) AS amount FROM `category` WHERE `category`.`isDelete`=0");
        return view("category", ["TableCategorys" => $Categorys, "amount" => $countCategory]);
    }
}
