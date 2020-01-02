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
Route::prefix('admin')->group(function () {

    //管理员登陆
    Route::get('login', 'Admin\LoginController@index')->name('admin.login');
    Route::post('login', 'Admin\LoginController@check')->name('admin.login');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    //需要保护的后台路由列表
    Route::middleware(['adminLoginCheck'])->group(function () {
        
        #后台中心的首页
        Route::get('index', 'Admin\IndexController@index')->name('admin.index');

        //管理员管理模块
        Route::prefix('adminuser')->group(function () {

            //列表
            Route::get('/', 'Admin\AdminUserController@index')->name('admin.adminuser');

            //添加、编辑共用
            Route::get('add/{adminuser?}', 'Admin\AdminUserController@add')->name('admin.adminuser.add');
            Route::post('add/{adminuser?}', 'Admin\AdminUserController@save')->name('admin.adminuser.add');

            //软删除
            Route::get('remove/{adminuser}', 'Admin\AdminUserController@remove')->name('admin.adminuser.remove');
            //切换状态
            Route::get('state/{adminuser}', 'Admin\AdminUserController@state')->name('admin.adminuser.state');
        });

        //系统设置模块
        Route::prefix('setting')->group(function(){
            Route::get('/','Admin\SettingController@index')->name('admin.setting');
            Route::post('/','Admin\SettingController@save')->name('admin.setting');
        });

        //资源管理模块
        Route::prefix('resource')->group(function(){

            //资源列表页
            Route::get('/','Admin\ResourceController@index')->name('admin.resource');

            //资源添加页
            Route::get('/add/{resource?}','Admin\ResourceController@add')->name('admin.resource.add');
            Route::post('/add/{resource?}','Admin\ResourceController@save')->name('admin.resource.add');

            //资源移除页（资源一旦被使用，不能随意删除）
            Route::get('/remove/{resource}','Admin\ResourceController@remove')->name('admin.resource.remove');

            //编辑器上传图片
            Route::post('/up','Admin\ResourceController@up')->name('admin.resource.up');
        });

    });
});
