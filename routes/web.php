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
Route::get('userProfile', function () {
    return view('userProfile');
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
Route::get('approveRequest', function () {
    return view('approveRequest');
});
Route::get('returnEquipment', function () {
    return view('returnEquipment');
});

