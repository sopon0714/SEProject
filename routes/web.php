<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('test');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/userProfile', function () {
    return view('userProfile');
});


// category Route
Route::prefix('category')->group(function () {
    Route::get('', 'CategoryController@indexpageCategory');
    Route::post('', 'CategoryController@insertCategory');
    Route::put('', 'CategoryController@updateCategory');
    Route::delete('', 'CategoryController@deleteCategory');
});
// comment Route
Route::prefix('comment')->group(function () {
    Route::get('', 'CommentController@indexpageComment');
    Route::post('', 'CommentController@insertComment');
    // Route::put('', 'CategoryController@updateCategory');
    // Route::delete('', 'CategoryController@deleteCategory');
});
// approveRequest Route
Route::prefix('approveRequest')->group(function () {
    Route::get('', 'ApproveRequestController@indexpageApproveRequest');
    //Route::post('', 'ApproveRequestController@insertApproveRequest');
    // Route::put('', 'ApproveRequestController@updateApproveRequest');
    Route::delete('', 'ApproveRequestController@deleteApproveRequest');
});

Route::get('/requestManagement', function () {
    return view('requestManagement');
});
Route::get('/readComments', function () {
    return view('readComments');
});
Route::get('/detailEquipment', function () {
    return view('detailEquipment');
});
Route::get('listEquipment', function () {
    return view('listEquipment');
});
Route::get('userManagement', function () {
    return view('userManagement');
});
Route::get('layoutAdmin', function () {
    return view('layoutAdmin');
});
Route::get('receiveEquipment', function () {
    return view('receiveEquipment');
});
Route::get('comment', function () {
    return view('comment');
});
Route::get('returnEquipment', function () {
    return view('returnEquipment');
});
Route::get('setting', function () {
    return view('setting');
});
Route::get('layoutNisit', function () {
    return view('layoutNisit');
});
Route::get('layoutTeacher', function () {
    return view('layoutTeacher');
});
