<?php

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

Route::get('/', function () {
    return view('welcome');
});

//后台路由分组
Route::prefix('admin')->group(function(){
    
    //管理员登陆
    Route::get('login','Admin\LoginController@index')->name('admin.login');
    Route::post('login','Admin\LoginController@check')->name('admin.login');
});