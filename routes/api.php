<?php

use App\Exceptions\ApiException;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->name('api.v1.')->namespace("Api")->group(function(){
    Route::get('test', function() {
        apiErr('课程不存在');
        // abort(403, 'test');
    })->name('test');    

    Route::post('login', '\App\Http\Controllers\Admin\LoginController@check')->name('login');
    //课程集合
    Route::get('courses', '\App\Http\Controllers\Api\CourseController@index')->name('courses');
    //课程
    Route::get('courses/{course}', 'CourseController@course')->name('course');
    //资源
    Route::get('courses/{course}/resource/{resource}', 'CourseController@resource')->name('resource');

});