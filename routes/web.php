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

Route::get('/', 'MemberController@index');
Route::post('/signinVerify', 'MemberController@login');

Route::get('/logout', 'MemberController@logout');


// statics  Route
Route::prefix('statics')->group(function () {
    Route::get('', 'StaticsController@indexpageStatics');
});

Route::post('/DetailByEID', 'DetailEquipmentController@DetailEquipmentByEID');

Route::post('/DetailByOID', 'UserProfileController@DetailByOID');

Route::post('/DetailByRID', 'RequestManagementController@DetailByRID');

Route::post('/DetailByReceive', 'ReceiveEquipmentController@DetailByReceive');
// userProfile Route
Route::prefix('userProfile/{id}')->group(function () {
    Route::get('', 'UserProfileController@getUser');
    // Route::post('', 'UserProfileController@insertCategory');
    // Route::put('', 'UserProfileController@updateCategory');
    // Route::delete('', 'UserProfileController@deleteCategory');
});

// detailEquipment Route
Route::prefix('detailEquipment/{id}')->group(function () {
    Route::get('', 'DetailEquipmentController@indexpageDetailEquipment');
    Route::post('', 'DetailEquipmentController@insertDetailEquipment');
    Route::put('', 'DetailEquipmentController@updateDetailEquipment');
    Route::delete('', 'DetailEquipmentController@deleteDetailEquipment');
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
    Route::post('', 'ApproveRequestController@AcceptApproveRequest');
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

// userManagement  Route
Route::prefix('userManagement')->group(function () {
    Route::get('', 'UserManagementController@indexpageUserManagement');
    // Route::post('', 'UserManagementController@insertUserManagement');
    // Route::post('byID', 'UserManagementController@selectByIdUserManagement');
    // Route::delete('', 'UserManagementController@deleteUserManagement');
});

// requestManagement  Route
Route::prefix('requestManagement')->group(function () {
    Route::get('', 'RequestManagementController@indexpageRequestManagement');
    Route::post('', 'RequestManagementController@insertRequestManagement');
    Route::delete('', 'RequestManagementController@deleteRequestManagement');
    // Route::post('', 'RequestManagementController@insertRequestManagement');
    // Route::post('byID', 'RequestManagementController@selectByIdRequestManagement');
    // Route::delete('', 'RequestManagementController@deleteRequestManagement');
});

// setting  Route
Route::prefix('setting')->group(function () {
    Route::get('', 'SettingController@indexpageSetting');
    // Route::post('', 'SettingController@insertSetting');
    //Route::put('', 'SettingController@updateSetting');
    // Route::delete('', 'SettingController@deleteSetting');
});

// detailEquipment  Route
Route::prefix('detailEquipment/{id}')->group(function () {
    Route::get('', 'DetailEquipmentController@indexpageDetailEquipment');
    Route::post('', 'DetailEquipmentController@insertDetailEquipment');
    Route::put('', 'DetailEquipmentController@updateDetailEquipment');
    Route::delete('', 'DetailEquipmentController@deleteDetailEquipment');
});

// receiveEquipment  Route
Route::prefix('receiveEquipment')->group(function () {
    Route::get('', 'ReceiveEquipmentController@indexpagereceiveEquipment');
    Route::post('', 'ReceiveEquipmentController@insertreceiveEquipment');
    // Route::put('', 'DetailEquipmentController@updateDetailEquipment');
    // Route::delete('', 'DetailEquipmentController@deleteDetailEquipment');
});

Route::get('returnEquipment', function () {
    return view('returnEquipment');
});
