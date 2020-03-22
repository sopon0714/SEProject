<?php // ReadCommentsController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReadCommentsController extends Controller
{
    public function index()
    {
        $Comment = DB::select("SELECT requestform.reqID ,user.Title,user.FName,user.LName,requestform.Time,requestform.Detail
                                FROM user INNER JOIN requestform ON user.UID = requestform.UID");
        $countComment = DB::select("SELECT COUNT(requestform.reqID) as summ FROM requestform");
        return view("readComments", [$Comment, $countComment]);
    }
}
