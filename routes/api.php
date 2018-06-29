<?php

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

// 系统设置路由
// Route::apiResource('/preferences', 'PreferencesController')->only(['update', 'index'])->middleware('check_system_is_initialed');
Route::middleware('check_system_is_initialed')->group(function () {
    Route::get('/preferences', 'PreferencesController@index');

    Route::match(['patch', 'put'], '/preferences', 'PreferencesController@update');
});

// 用户表路由
Route::apiResource('/book', 'BookController');

// 图书表路由
Route::apiResource('/user', 'UserController');

// 管理员路由
Route::apiResource('/admin', 'AdminController');

// 借阅管理
Route::apiResource('/borrow', 'BorrowController')->middleware('check_system_is_initialed');