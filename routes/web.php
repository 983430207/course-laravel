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
    Route::get('logout','Admin\LoginController@logout')->name('admin.logout');

    //需要保护的后台路由列表
    Route::middleware(['adminLoginCheck'])->group(function(){
        #后台中心的首页
        Route::get('index','Admin\IndexController@index')->name('admin.index');
    });

});