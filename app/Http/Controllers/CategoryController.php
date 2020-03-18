<?php // CategoryController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexpageCategory()
    {
        $Categorys = DB::select("SELECT `category`.`CID`,`category`.`CName`,COUNT(`equipmentlist`.`CID`) AS amount FROM `category`
        LEFT JOIN `equipmentlist` ON `category`.`CID`=`equipmentlist`.`CID`
        WHERE `category`.`isDelete`=0 AND ( `equipmentlist`.`isDelete`=0 OR `equipmentlist`.`isDelete`IS NULL )
        GROUP BY `category`.`CID`,`category`.`CName`");
        $countCategory = DB::select("SELECT COUNT(*) AS amount FROM `category` WHERE `category`.`isDelete`=0");
        return view("category", ["TableCategorys" => $Categorys, "amount" => $countCategory]);
    }
    public function insertCategory(Request $req)
    {
        $nameCategory = $req->get('nameCategory');
        DB::table('category')->insert(
            ['CName' => $nameCategory, 'isDelete' => 0]
        );
        CategoryController::indexpageCategory();
    }
}
