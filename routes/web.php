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

// userProfile Route
Route::prefix('userProfile')->group(function () {
    Route::get('', 'UserProfileController@getUser');
    // Route::post('', 'UserProfileController@insertCategory');
    // Route::put('', 'UserProfileController@updateCategory');
    // Route::delete('', 'UserProfileController@deleteCategory');
});

// category Route
Route::prefix('category')->group(function () {
    Route::get('', 'CategoryController@indexpageCategory');
    Route::post('', 'CategoryController@insertCategory');
    Route::put('', 'CategoryController@updateCategory');
    Route::delete('', 'CategoryController@deleteCategory');
});

// readComments Route
Route::prefix('readComments')->group(function () {
    Route::get('', 'ReadCommentsController@index');
    Route::delete('', 'ReadCommentsController@deleteComment');
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

// listEquipment  Route
Route::prefix('listEquipment')->group(function () {
    Route::get('', 'ListEquipmentController@indexpageListEquipment');
    Route::post('', 'ListEquipmentController@insertListEquipment');
    Route::post('byID', 'ListEquipmentController@selectByIdListEquipment');
    Route::delete('', 'ListEquipmentController@deleteListEquipment');
});


Route::get('/requestManagement', function () {
    return view('requestManagement');
});

Route::get('/detailEquipment', function () {
    return view('detailEquipment');
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
