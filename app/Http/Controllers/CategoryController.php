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
        return $this->indexpageCategory();
    }
    public function updateCategory(Request $req)
    {
        $nameCategory = $req->get('nameCategory');
        $CID = $req->get('idCategory');
        DB::table('category')
            ->where('CID', $CID)
            ->update(['CName' => $nameCategory]);
        return $this->indexpageCategory();
    }
    public function deleteCategory(Request $req)
    {
        $CID = $req->get('CID');
        DB::table('category')
            ->where('CID', $CID)
            ->update(['isDelete' => 1]);
        return $this->indexpageCategory();
    }
}
