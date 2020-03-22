<?php // CommentController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function indexpageComment()
    {
        $Comment = DB::select("SELECT * FROM `requestform`
        LEFT JOIN `user` ON `requestform`.`UID` = `user`.`UID`");
        return view("comment", ["TableComment"=>$Comment]);
    }
    public function insertComment(Request $req)
    {
        $detailComment = $req->get('detailComment');
        DB::table('requestform')->insert(
            ['Detail' => $detailComment,'UID'=>1]
        );
        // return $this->indexpageComment();
    }
}
