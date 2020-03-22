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



// category  Route
Route::prefix('category')->group(function () {
    Route::get('', 'CategoryController@indexpageCategory');
    Route::post('', 'CategoryController@insertCategory');
    Route::put('', 'CategoryController@updateCategory');
    Route::delete('', 'CategoryController@deleteCategory');
});


// listEquipment  Route
Route::prefix('listEquipment')->group(function () {
    Route::get('', 'ListEquipmentController@indexpageListEquipment');
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
Route::get('userManagement', function () {
    return view('userManagement');
});
Route::get('layoutAdmin', function () {
    return view('layoutAdmin');
});
Route::get('receiveEquipment', function () {
    return view('receiveEquipment');
});
Route::get('approveRequest', function () {
    return view('approveRequest');
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
